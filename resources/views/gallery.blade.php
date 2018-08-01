@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="tabs">
                <li class="tab col s6"><a class="active waves-effect" href="#ets2">Euro Truck Simulator 2</a></li>
                <li class="tab col s6"><a href="#ats" class="waves-effect">American Truck Simulator</a></li>
            </ul>
            @foreach($chassis_list as $game => $collection)
                <div id="{{$game}}" class="game">
                    <h4 class="light">{{I18n::t($game.'_trailer_guide')}}</h4>
                    @php $i = 0; @endphp
                    @foreach($collection->groupBy('alias_short') as $alias => $aliases_collection)
                        <div class="col m6 s12">
                            <div class="card trailer {{$alias}} ?>">
                                <div class="card-image">
                                    <img src="/assets/img/trailers/{{$alias}}/{{$alias}}.jpg">
                                    <h5 class="card-title trailer-name text-shadow" title="{{I18n::t($alias)}}" style="width: 100%;">
                                        {{I18n::t($alias)}}
                                        @if($aliases_collection[0]->isDLCContent())
                                            <br>{{I18n::t($aliases_collection[0]->dlc->name)}}
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
                                                    <span style="flex: 1;">{{I18n::t('see_paints')}}</span>
                                                @elseif($aliases_collection[0]->with_accessory)
                                                    <span style="flex: 1;">{{I18n::t('see_cargo')}}</span>
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