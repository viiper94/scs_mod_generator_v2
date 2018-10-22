@extends('layout.app')

@section('content')

<div class="container">
    <div class="card horizontal">
        <div class="card-image">
            @if($user->image && file_exists(public_path('images/users/'.$user->image)))
                <img src="{{ asset('images/users/'.$user->image ) }}" style="max-height: 200px;">
            @else
                <img src="{{ asset('images/users/default.jpg') }}" style="max-height: 200px;">
            @endif
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <h4 class="card-title">{{ $user->name }}</h4>
                <p>@lang('user.generated_mods'): <b>{{ count($mods) }}</b></p>
            </div>
            @if(Auth::id() == $user->id)
                <div class="card-action">
                    <a href="{{ route('profile_edit') }}" class="mdc-button mdc-button--raised mdc-ripple" style="min-width: 200px; color: #000;">
                        <i class="material-icons notranslate mdc-button__icon no-margin">edit</i>
                        <b>@lang('user.profile_edit')</b>
                    </a>
                </div>
            @endif
        </div>
    </div>
    @if(count($mods) > 0)
        <h4 class="card-title no-mods">@lang('mods.mods_history')</h4>
        <ul class="collapsible">
            @foreach($mods as $mod)
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons notranslate">arrow_downward</i>
                        <p class="mod-info">
                            @if($mod->broken)
                                <i class="material-icons notranslate left" title="@lang('mods.broken')">broken_image</i>
                            @endif
                            <b>{{ $mod->title }}</b> (@lang('general.'.$mod->game); @lang('mods.'.$mod->type); {{ date('j F, Y H:i', strtotime($mod->created_at)) }})
                        </p>
                        <div>
                            @if(file_exists(public_path().'/download/'.$mod->file_name.'.scs'))
                                <a href="{{ url('/download/'.$mod->file_name.'.scs') }}"
                                   class="mdc-button mdc-button--raised mdc-ripple large-btn"
                                   title="@lang('general.download_mod')">
                                    <i class="material-icons notranslate mdc-button__icon no-margin">file_download</i>
                                </a>
                            @endif
                            <a href="{{ route('mod_broken') }}/{{ $mod->id }}"
                               class="mdc-button mdc-button--raised mdc-ripple large-btn"
                               @if($mod->broken)
                                    title="@lang('mods.working')" onclick="return confirm('@lang('mods.mark_as_working')')"
                                @else
                                    title="@lang('mods.broken')" onclick="return confirm('@lang('mods.mark_as_broken')')"
                                @endif >
                                <i class="material-icons notranslate mdc-button__icon no-margin">report{{ $mod->broken ? '_off' : '' }}</i>
                            </a>
                        </div>
                    </div>
                    <div class="collapsible-body">
                        @php $params = unserialize($mod->params); @endphp
                        @if(is_array($params))
                            <p>
                                @lang('general.chassis'):
                                <b>
                                    @if($params['form']['chassis'] == 'paintable') @lang('general.paintable_chassis')
                                    @else @lang($mod->game.'_trailers.'.$params['form']['chassis'])
                                    @endif
                                </b>
                            </p>
                            @if(isset($params['view']))
                                @if(key_exists('accessory', $params['view']))<p>@lang('general.accessory'):
                                    <b>@lang($mod->game.'_accessories.'.$params['view']['accessory'])</b></p>
                                @endif
                                @if(key_exists('paint', $params['view']))<p>@lang('general.paint_job'): <b>
                                        @if($params['view']['paint'] === null) @lang($mod->game.'_companies_paints.default')
                                        @else @lang($mod->game.'_companies_paints.'.$params['view']['paint'])
                                        @endif
                                        </b></p>
                                @endif
                                @if(key_exists('color', $params['view']))<p>@lang('general.color'): <b>{{ $params['view']['color'] }}</b></p>@endif
                                @if(key_exists('weight', $params['form']))<p>@lang('general.trailer_weight'): <b>{{ $params['form']['weight'] }}</b></p>@endif
                                @if(key_exists('wheels', $params['view']))<p>@lang('general.wheels'): <b>@lang($mod->game.'_wheels.'.$params['view']['wheels'])</b></p>@endif
                                @if(key_exists('dlc', $params['form']))
                                    <ul>
                                        @foreach($params['form']['dlc'] as $dlc => $on)
                                            <li><b>@lang('dlc_list.'.$dlc)</b></li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endif

                        @endif
                        @if($mod->canRegenerate())
                            <form action="{{ route($mod->type === 'trailer' ? 'generator' : 'color_generator') }}" method="post">
                                @csrf
                                <input type="hidden" name="target" value="{{ $mod->game }}">
                                <input type="hidden" name="title" value="{{ $mod->title }}">
                                @foreach($params['form'] as $key => $value)
                                    @if($key === 'color')
                                        <input type="hidden" name="color[scs][r]" value="{{ $value['scs']['r'] }}">
                                        <input type="hidden" name="color[scs][g]" value="{{ $value['scs']['g'] }}">
                                        <input type="hidden" name="color[scs][b]" value="{{ $value['scs']['b'] }}">
                                        <input type="hidden" name="color[hex]" value="{{ $value['hex'] }}">
                                    @elseif($key === 'dlc')
                                        @foreach($value as $dlc => $on)
                                            <input type="hidden" name="dlc[{{ $dlc }}]" value="on">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endif
                                @endforeach
                                <button type="submit" class="mdc-button mdc-button--raised mdc-ripple large-btn"
                                   title="@lang('mods.regenerate_mod')">
                                    <i class="material-icons notranslate mdc-button__icon">refresh</i>
                                    @lang('mods.regenerate_mod')
                                </button>
                            </form>

                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <h4 class="no-mods">@lang('mods.no_mods')</h4>
    @endif
</div>

@endsection