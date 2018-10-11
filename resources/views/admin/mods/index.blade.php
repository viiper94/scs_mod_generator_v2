@extends('admin.layout.admin')

@section('content')

    @include('admin.search')

    {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="row no-margin">
        <div class="col s12 m10 offset-m1">
            @if(count($mods) > 0)
                <div class="col m6 s12">
                    <h5 class="light">Показано {{ count($mods) }} модифікацій</h5>
                </div>
                <div class="col m6 s12 right-align">
                    <h5>
                        @if(Request::input('marked'))
                            <a href="{{ route('mods') }}" class="mdc-button mdc-button--raised mdc-ripple">
                                Показати спершу останні
                            </a>
                        @else
                            <a href="{{ route('mods', ['marked' => 'desc']) }}" class="mdc-button mdc-button--raised mdc-ripple">
                                Показати спершу проблемні
                            </a>
                        @endif
                    </h5>
                </div>
            @else
                <h5 class="light">Немає жодної модифікації</h5>
            @endif
        </div>
    </div>

    <div class="row no-margin">
        <div class="col s12 m10 offset-m1">
            <ul class="collapsible ">
                @foreach($mods as $mod)
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons notranslate">arrow_downward</i>
                            <p class="mod-info">
                                @if($mod->broken)
                                    <i class="material-icons notranslate left" title="@lang('mods.broken')">broken_image</i>
                                @endif
                                <b>{{ $mod->title }}</b> (@lang('general.'.$mod->game); @lang('mods.'.$mod->type); {{ date('j F, Y H:i', strtotime($mod->created_at)) }})
                                @if($mod->user_id)
                                    <a href="{{ route('profile') }}/{{ $mod->user_id }}">
                                        <span class="new badge black-text no-float" data-badge-caption="{{ $mod->user->name }}">by</span>
                                    </a>
                                @endif
                            </p>
                            <div>
                                @if(file_exists(public_path().'/download/'.$mod->file_name.'.scs'))
                                    <a href="{{ url('/download/'.$mod->file_name.'.scs') }}"
                                       class="mdc-button mdc-button--raised mdc-ripple large-btn"
                                       title="@lang('general.download_mod')">
                                        <i class="material-icons notranslate mdc-button__icon no-margin">file_download</i>
                                    </a>
                                @endif
                                <a href="{{ route('mods') }}/delete/{{ $mod->id }}"
                                   class="mdc-button mdc-button--raised mdc-ripple large-btn"
                                   title="Видалити мод" onclick="return confirm('Справді видалити?')">
                                    <i class="material-icons notranslate mdc-button__icon no-margin">delete</i>
                                </a>
                                <a href="{{ route('mods') }}/mark/{{ $mod->id }}"
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
                                <p>@lang('general.chassis'): <b>@lang($mod->game.'_trailers.'.$params['form']['chassis'])</b></p>
                                @if(isset($params['view']))
                                    @if(key_exists('accessory', $params['view']))<p>@lang('general.accessory'): <b>@lang($mod->game.'_accessories.'.$params['view']['accessory'])</b></p>@endif
                                    @if(key_exists('paint', $params['view']))<p>@lang('general.paint_job'): <b>@lang($mod->game.'_companies_paints.'.$params['view']['paint'])</b></p>@endif
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
        </div>
    </div>

    {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати нове шассі">
        <a class="mdc-fab mdc-ripple" href="{{ route('trailers') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection