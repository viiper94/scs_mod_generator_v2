@extends('layout.app')

@section('navbar-content')
    <div class="nav-content hide-on-med-and-down">
        <ul class="tabs">
            <li class="tab"><a class="active" href="#ets2">Euro Truck Simulator 2</a></li>
            <li class="tab"><a href="#ats">American Truck Simulator</a></li>
        </ul>
    </div>

    @include('admin.search')
@endsection

@section('content')

    <div class="row hide-on-large-only no-margin" style="width: 100%;">
        <ul class="tabs">
            <li class="tab"><a class="active" href="#ets2">Euro Truck Simulator 2</a></li>
            <li class="tab"><a href="#ats">American Truck Simulator</a></li>
        </ul>
    </div>

    <div class="row">
        @if(count($chassis_list) > 0)
            @foreach($chassis_list as $game => $collection)
                <div id="{{$game}}" class="game">
                    <div class="row">
                        <h1 class="light col m12">@lang('general.'.$game) @lang('general.trailers_gallery')</h1>
                    </div>
                    @php $i = 0; @endphp
                    <div class="row">
                        @foreach($collection->groupBy('alias_short') as $alias => $aliases_collection)
                            <div class="col m6 s12">
                                <div class="card trailer {{$alias}}">
                                    <div class="card-image">
                                        <img src="/assets/img/trailers/{{$alias}}/{{$alias}}.jpg">
                                        <h5 class="card-title trailer-name text-shadow" title="@lang($game.'_trailers.'.$alias)" style="width: 100%;">
                                            {{ $aliases_collection[0]->translate() }}
                                            @if($aliases_collection[0]->isDLCContent())
                                                <br>@lang('dlc_list.'.$aliases_collection[0]->dlc->name)
                                            @endif
                                        </h5>
                                    </div>
                                    @if($aliases_collection[0]->with_paint_job || $aliases_collection[0]->with_accessory)
                                        <div class="card-content">
                                            <ul class="collapsible show-skin z-depth-0" data-trailer="{{$alias}}" data-game="ets2" data-token="{{csrf_token()}}">
                                            @if($aliases_collection[0]->with_paint_job)
                                                <li class="paints">
                                                    <div class="collapsible-header">
                                                        <i class="material-icons notranslate">arrow_downward</i>
                                                        <span style="flex: 1;">@lang('general.see_paints')</span>
                                                    </div>
                                                    <div class="collapsible-body"></div>
                                                </li>
                                            @endif
                                            @if($aliases_collection[0]->with_accessory)
                                                <li class="accessories">
                                                    <div class="collapsible-header">
                                                        <i class="material-icons notranslate">arrow_downward</i>
                                                        <span style="flex: 1;">@lang('general.see_cargo')</span>
                                                    </div>
                                                    <div class="collapsible-body"></div>
                                                </li>
                                            @endif
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if($i++ % 2 != 0)
                                <div class="clearfix"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <h5 class="center">@lang('general.no_results')</h5>
        @endif

    </div>

@endsection
