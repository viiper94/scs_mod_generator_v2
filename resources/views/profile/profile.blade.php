@extends('layout.app')

@section('title')
    @lang('user.profile') -
@endsection

@section('content')

<div class="flex-center profile-container">
    <div class="card">
        <div class="card-image">
            <img
                @if($user->image && file_exists(public_path('images/users/'.$user->image)))
                    src="{{ asset('images/users/'.$user->image) }}"
                @else
                    src="{{ asset('images/users/default.jpg') }}"
                @endif
            >
        </div>
        <div class="card-content">
            <h4 class="card-title">{{ $user->name }}</h4>
            <p>@lang('user.generated_mods'): <b>{{ $mods_count }}</b></p>
            <p>@lang('user.registered'): <b>{{ $user->created_at->format('j-m-Y H:i') }}</b></p>
        </div>
        @if(Auth::id() == $user->id)
            <div class="card-action">
                <div class="row no-margin">
                    <a href="{{ route('profile_edit') }}" class="mdc-button mdc-button--unelevated col s12 btn">
                        <i class="material-icons notranslate mdc-button__icon">edit</i>
                        <b>@lang('user.profile_edit')</b>
                    </a>
                </div>

            </div>
        @endif
    </div>
    @if($mods_count > 0)
        <div class="last_mods card">
            <div class="card-content">
                <h4 class="card-title no-mods">@lang('mods.last_mods')</h4>
                <ul class="mdc-list mdc-list--two-line mdc-list--avatar-list user-mods" style="max-width: 650px">
                    @foreach($mods as $mod)
                        <li role="separator" class="mdc-list-divider"></li>
                        <li data-id="{{ $mod->id }}" class="mdc-list-item" tabindex="0">
                            @if(file_exists(public_path().'/download/'.$mod->file_name.'.scs'))
                                <span class="mdc-list-item__graphic material-icons">
                                    <a href="{{ url('/download/'.$mod->file_name.'.scs') }}"
                                       class="mdc-icon-button material-icons notranslate white-text"
                                       title="@lang('general.download_mod')">file_download</a>
                                </span>
                            @endif
                            <span class="mdc-list-item__text">
                                <span class="mdc-list-item__primary-text"><b>{{ $mod->title }}</b></span>
                                <span class="mdc-list-item__secondary-text">
                                    @lang('general.'.$mod->game); @lang('mods.'.$mod->type); {{ $mod->created_at->format('j-m-Y H:i') }}
                                </span>
                            </span>
                            <span class="mdc-list-item__meta" aria-hidden="true">
                                @if($mod->broken)
                                    <a href="{{ route('mod_broken') }}/{{ $mod->id }}"
                                       class="mdc-icon-button material-icons notranslate red-text"
                                       title="@lang('mods.working')"
                                       onclick="return confirm('@lang('mods.mark_as_working')')">report
                                    </a>
                                @else
                                    <a href="{{ route('mod_broken') }}/{{ $mod->id }}"
                                       class="mdc-icon-button material-icons notranslate"
                                       title="@lang('mods.broken')"
                                       onclick="return confirm('@lang('mods.mark_as_broken')')">report
                                    </a>
                                @endif
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if($mods_count > 10)
                <div class="card-action">
                    <a href="{{ route('profile_mods') }}" class="mdc-button mdc-button--unelevated btn no-margin" style="margin-top: 10px;">
                        <i class="material-icons notranslate mdc-button__icon">list</i>@lang('mods.see_all')
                    </a>
                </div>
            @endif
        </div>
    @else
        <h4 class="no-mods">@lang('mods.no_mods')</h4>
    @endif
</div>

@endsection