@extends('admin.layout.admin')

@section('navbar-content')

    @include('admin.search')

@endsection

@section('content')

    <div class="container">
        {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

        <div class="row no-margin">
            @if(count($mods) > 0)
                <div class="col m6 s12">
                    <h2>Показано {{ count($mods) }} модифікацій</h2>
                </div>
                <div class="col m6 s12 right-align">
                    <h5>
                        @if(Request::input('marked'))
                            <a href="{{ route('mods') }}" class="mdc-button mdc-button--unelevated">
                                Показати спершу останні
                            </a>
                        @else
                            <a href="{{ route('mods', ['marked' => 'desc']) }}" class="mdc-button mdc-button--unelevated">
                                Показати спершу проблемні
                            </a>
                        @endif
                    </h5>
                </div>
            @else
                <h5 class="light">Немає жодної модифікації</h5>
            @endif
        </div>

        <div class="row no-margin">
            <ul class="collapsible user-mods">
                @foreach($mods as $mod)
                    <li data-id="{{ $mod->id }}">
                        <div class="collapsible-header">
                            <i class="material-icons notranslate">arrow_downward</i>
                            <span class="mdc-list-item__text">
                                <span class="mdc-list-item__primary-text">
                                    <b>{{ $mod->title }}</b>
                                    @if($mod->user_id)
                                        <a href="{{ route('profile') }}/{{ $mod->user_id }}">
                                            <span class="new badge black-text no-float" data-badge-caption="{{ $mod->user->name }}">by</span>
                                        </a>
                                    @endif
                                </span>
                                <span class="mdc-list-item__secondary-text">
                                    @lang('general.'.$mod->game); @lang('mods.'.$mod->type); {{ $mod->created_at->format('j-m-Y H:i') }}
                                </span>
                            </span>
                            <span class="mdc-list-item__meta" aria-hidden="true">
                            @if($mod->broken)
                                    <a href="{{ route('mods') }}/mark/{{ $mod->id }}"
                                       class="mdc-icon-button material-icons notranslate report broken"
                                       title="@lang('mods.working')"
                                       onclick="return confirm('@lang('mods.mark_as_working')')">report
                                    </a>
                                @else
                                    <a href="{{ route('mods') }}/mark/{{ $mod->id }}"
                                       class="mdc-icon-button material-icons notranslate report"
                                       title="@lang('mods.broken')"
                                       onclick="return confirm('@lang('mods.mark_as_broken')')">report
                                    </a>
                                @endif
                                <a href="{{ route('mods') }}/delete/{{ $mod->id }}"
                                   class="mdc-icon-button material-icons notranslate"
                                   title="Видалити мод" onclick="return confirm('Справді видалити?')">delete</a>
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
                                <p>
                                    @lang('general.chassis'):
                                    <b>
                                        @if($params['form']['chassis'] == 'paintable') @lang('general.paintable_chassis')
                                        @else @lang($mod->game.'_trailers.'.$params['form']['chassis'])
                                        @endif
                                    </b>
                                </p>
                                @if(isset($params['view']))
                                    @if(key_exists('accessory', $params['view']))<p>@lang('general.accessory'): <b>@lang($mod->game.'_accessories.'.$params['view']['accessory'])</b></p>@endif
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
                                <button type="submit" class="mdc-button mdc-button--unelevated large-btn"
                                        title="@lang('mods.regenerate_mod')" style="display: none;">
                                    <i class="material-icons notranslate mdc-button__icon">refresh</i>
                                    @lang('mods.regenerate_mod')
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    </div>

@endsection