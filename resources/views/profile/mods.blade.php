@extends('layout.app')

@section('title')
    @lang('mods.mods_history') -
@endsection

@section('content')

    <div class="container">
        @if(count($mods) > 0)
            <h2 class="no-mods col s12">@lang('mods.mods_history')</h2>
            <ul class="collapsible user-mods">
                @foreach($mods as $mod)
                    <li data-id="{{ $mod->id }}">
                        <div class="collapsible-header">
                            <i class="material-icons notranslate">arrow_downward</i>
                            <span class="mdc-list-item__text">
                                <span class="mdc-list-item__primary-text"><b>{{ $mod->title }}</b></span>
                                <span class="mdc-list-item__secondary-text">
                                    @lang('general.'.$mod->game); {{ $mod->created_at->format('j-m-Y H:i') }};
                                </span>
                            </span>
                            <span class="mdc-list-item__meta" aria-hidden="true">
                            @if($mod->broken)
                                    <a href="{{ route('mod_broken') }}/{{ $mod->id }}"
                                       class="mdc-icon-button material-icons notranslate report broken"
                                       title="@lang('mods.working')"
                                       onclick="return confirm('@lang('mods.mark_as_working')')">report
                                    </a>
                                @else
                                    <a href="{{ route('mod_broken') }}/{{ $mod->id }}"
                                       class="mdc-icon-button material-icons notranslate report"
                                       title="@lang('mods.broken')"
                                       onclick="return confirm('@lang('mods.mark_as_broken')')">report
                                    </a>
                                @endif
                                @if(file_exists(public_path().'/download/'.$mod->file_name.'.scs'))
                                    <a href="{{ url('/download/'.$mod->file_name.'.scs') }}"
                                       class="mdc-icon-button material-icons notranslate download"
                                       title="@lang('general.download_mod')">file_download</a>
                                @endif
                        </span>
                        </div>
                        <div class="collapsible-body">
                            @php $params = unserialize($mod->params); @endphp
                            @if(is_array($params))
                                @if(isset($params['view']))
                                    <p>
                                        @lang('general.chassis'):
                                        <b>
                                            @if($params['form']['chassis'] == 'paintable') @lang('general.paintable_chassis')
                                            @elseif(key_exists('chassis', $params['view'])) @lang($mod->game.'_trailers.'.$params['view']['chassis'])
                                            @else {{ $params['form']['chassis'] }}
                                            @endif
                                        </b>
                                    </p>
                                    @if(key_exists('accessory', $params['view']))<p>@lang('general.accessory'):
                                        <b>@lang('accessories.'.$params['view']['accessory'])</b></p>
                                    @endif
                                    @if(key_exists('paint', $params['view']))<p>@lang('general.paint_job'): <b>
                                            @if($params['view']['paint'] === null) @lang($mod->game.'_companies_paints.default')
                                            @else @lang($mod->game.'_companies_paints.'.$params['view']['paint'])
                                            @endif
                                        </b></p>
                                    @endif
                                    @if(key_exists('color', $params['view']))<p>@lang('general.color'): <b>{{ $params['view']['color'] }}</b></p>@endif
                                    @if(key_exists('wheels', $params['view']))<p>@lang('general.wheels'): <b>@lang($mod->game.'_wheels.'.$params['view']['wheels'])</b></p>@endif
                                @endif
                                @if(key_exists('weight', $params['form']))<p>@lang('general.trailer_weight'): <b>{{ $params['form']['weight'] }}</b></p>@endif
                                @if(key_exists('dlc', $params['form']))
                                    <ul>
                                        @foreach($params['form']['dlc'] as $dlc => $on)
                                            <li><b>@lang('dlc_list.'.$dlc)</b></li>
                                        @endforeach
                                    </ul>
                                @endif

                            @endif
                            <form action="{{ route('generator') }}" method="post" class="regenerate">
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
                                <button type="submit" class="mdc-button mdc-button--unelevated"
                                        title="@lang('mods.regenerate_mod')" style="display: none;">
                                    <i class="material-icons notranslate mdc-button__icon">refresh</i>
                                    @lang('mods.regenerate_mod')
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

            {{ $mods->links('layout.pagination') }}

        @else
            <h4 class="no-mods center">@lang('mods.no_mods')</h4>
        @endif
    </div>


@endsection
