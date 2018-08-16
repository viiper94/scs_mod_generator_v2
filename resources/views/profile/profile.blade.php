@extends('layout.app')

@section('content')

<div class="container">
    <div class="card horizontal">
        <div class="card-image">
            <img src="{{ asset('images/users/'. ($user->image ?? 'default.jpg')) }}" style="max-height: 200px;">
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <h4 class="card-title">{{ $user->name }}</h4>
                <p>@lang('user.generated_mods'): <b>{{ count($mods) }}</b></p>
            </div>
            <div class="card-action">
                <a href="{{ route('profile_edit') }}" class="mdc-button mdc-button--raised mdc-ripple" style="min-width: 200px; color: #000;">
                    <i class="material-icons notranslate mdc-button__icon no-margin">edit</i>
                    <b>@lang('user.profile_edit')</b>
                </a>
            </div>
        </div>
    </div>
    @if(count($mods) > 0)
        <h4 class="card-title">@lang('mods.mods_history')</h4>
        <ul class="collapsible">
            @foreach($mods as $mod)
                <li>
                    <div class="collapsible-header" style="border-bottom: 1px solid #ddd;">
                        <i class="material-icons notranslate">arrow_downward</i>
                        <p class="mod-info">
                            <b>{{ $mod->title }}</b> (@lang('general.'.$mod->game); @lang('mods.'.$mod->type); {{ date('j F, Y H:i', strtotime($mod->created_at)) }})
                        </p>
                        @if(file_exists(public_path().'/download/'.$mod->file_name.'.scs'))
                            <div>
                                <a href="{{ url('/download/'.$mod->file_name.'.scs') }}"
                                   class="mdc-button mdc-button--raised mdc-ripple large-btn"
                                   title="@lang('general.download_mod')">
                                    <i class="material-icons notranslate mdc-button__icon no-margin">file_download</i>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="collapsible-body">
                        @php $params = unserialize($mod->params); @endphp
                        @if(is_array($params))
                            <p>@lang('general.chassis'): <b>@lang($mod->game.'_trailers.'.$params['chassis'])</b></p>
                            @if(key_exists('accessory', $params))<p>@lang('general.accessory'): <b>@lang($mod->game.'_accessories.'.$params['accessory'])</b></p>@endif
                            @if(key_exists('paint', $params))<p>@lang('general.paint_job'): <b>@lang($mod->game.'_companies_paints.'.$params['paint'])</b></p>@endif
                            @if(key_exists('color', $params))<p>@lang('general.color'): <b>{{ $params['color']['hex'] }}</b></p>@endif
                            @if(key_exists('weight', $params))<p>@lang('general.trailer_weight'): <b>{{ $params['weight'] }}</b></p>@endif
                            @if(key_exists('wheels', $params))<p>@lang('general.wheels'): <b>@lang($mod->game.'_wheels.'.$params['wheels'])</b></p>@endif
                        @endif
                        @if($mod->canRegenerate())
                            <a href="#" class="mdc-button mdc-button--raised mdc-ripple large-btn"
                               title="@lang('mods.regenerate_mod')">
                                <i class="material-icons notranslate mdc-button__icon">refresh</i>
                                @lang('mods.regenerate_mod')
                            </a>
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