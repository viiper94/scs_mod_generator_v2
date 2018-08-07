@extends('layout.app')

@section('content')
    <div class="navbar-fixed">
        <nav class="nav-extended" style="width: calc(100vw - 350px);">
            <div class="nav-content">
                <ul class="tabs">
                    <li class="tab"><a class="active" href="#ets2">Euro Truck Simulator 2</a></li>
                    <li class="tab"><a href="#ats">American Truck Simulator</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            @foreach($chassis_list as $game => $collection)
                <div id="{{$game}}" class="game">
                    <h4 class="light">@lang('general.'.$game.'_trailer_guide')</h4>
                    @php $i = 0; @endphp
                    @foreach($collection->groupBy('alias_short') as $alias => $aliases_collection)
                        <div class="col m6 s12">
                            <div class="card trailer {{$alias}} ?>">
                                <div class="card-image">
                                    <img src="/assets/img/trailers/{{$alias}}/{{$alias}}.jpg">
                                    <h5 class="card-title trailer-name text-shadow" title="@lang($game.'_trailers.'.$alias)" style="width: 100%;">
                                        @lang($game.'_trailers.'.$alias)
                                        @if($aliases_collection[0]->isDLCContent())
                                            <br>@lang('dlc_list.'.$aliases_collection[0]->dlc->name)
                                        @endif
                                    </h5>
                                </div>
                                @if($aliases_collection[0]->with_paint_job || $aliases_collection[0]->with_accessory)
                                <div class="card-content">
                                    <ul class="collapsible show-skin z-depth-0" data-trailer="{{$alias}}" data-game="ets2" data-token="{{csrf_token()}}">
                                        <li>
                                            <div class="collapsible-header">
                                                <i class="material-icons notranslate">arrow_downward</i>
                                                @if($aliases_collection[0]->with_paint_job)
                                                    <span style="flex: 1;">@lang('general.see_paints')</span>
                                                @elseif($aliases_collection[0]->with_accessory)
                                                    <span style="flex: 1;">@lang('general.see_cargo')</span>
                                                @endif
                                            </div>
                                            <div class="collapsible-body"></div>
                                        </li>
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
            @endforeach
        </div>
    </div>
@endsection