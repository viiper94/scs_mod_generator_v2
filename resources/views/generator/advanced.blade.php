<section class="advanced row" style="margin-bottom: 0;">
    <ul class="collapsible z-depth-0 col s12">
        <li>
            <div class="collapsible-header grey-text"><i class="material-icons notranslate">arrow_drop_down</i>@lang('general.advanced')</div>
            <div class="collapsible-body">

                @include('generator.trmp_fix')

                {{--Image section--}}
                <div class="row">
                    <label>@lang('general.image_upload')</label>
                    <div class="file-field input-field mdc-button mdc-button--outlined">
                        <div class="input-wrapper">
                            <i class="material-icons mdc-button__icon notranslate" style="font-size: 2em;">add_photo_alternate</i>
                            <input type="file" name="img" id="image" accept="image/jpeg, image/png"
                                   data-size="@lang('validation.custom.img.max')"
                                   data-dimensions="@lang('validation.custom.img.dimensions')">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path right" type="text" id="image-path" placeholder="@lang('general.upload_image')" readonly>
                        </div>
                    </div>
                </div>

                {{--Wheels section--}}
                <div class="wheels row" style="display: none;">
                    <label>@lang('general.select_wheels')</label>
                    <div class="ui dropdown labeled " id="select-wheels">
                        <input type="hidden" name="wheels">
                        <div class="default text">@lang('general.w_default')</div>
                        <i class="dropdown icon right"></i>
                        <div class="menu">
                            <div class="item" data-value=""><span class="wheel-name">@lang('general.w_default')</span></div>
                            @foreach($wheels as $wheel)
                                <div class="item @if(!$wheel->mp_support)
                                        tooltipped" data-tooltip="@lang('general.mp_no_support')@endif"
                                     data-value="{{$wheel->def}}" data-position="left">
                                    @if(!$wheel->mp_support)
                                        <s class="hint">MP</s>
                                    @endif
                                    <span class="wheel-name">@lang($wheel->game.'_wheels.'.$wheel->alias)</span>
                                        @if($wheel->isDLCContent())
                                            <span class="tooltipped hint"
                                                  data-tooltip="@lang('dlc_list.'.$wheel->dlc->name)"
                                                  data-position="right">
                                                    [{{ $wheel->dlc->short_name }}]
                                                </span>
                                        @endif
                                    <img src="assets/img/wheels/{{$game}}/{{$wheel->alias}}.jpg" class="wheel-ico">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{--DLC section--}}
                <div class="dlc row">
                    <label>@lang('general.include_dlc')
                        <button id="check_all" data-check="0" type="button">(@lang('general.check_all'))</button>:
                    </label>
                    @php $user_dlc = [];
                    if(Auth::check()) $user_dlc = explode(',', Auth::user()->owned_dlc); @endphp
                    @foreach($dlc_list as $dlc_group)
                        <div class="col s12 m6" style="padding: 0;">
                            @foreach($dlc_group as $dlc)
                                <div class="{{$dlc->name}}">
                                    <div class="mdc-form-field">
                                        <div class="mdc-checkbox">
                                            <input type="checkbox" class="mdc-checkbox__native-control"
                                                   id="dlc_{{$dlc->name}}" name="dlc[{{$dlc->name}}]"
                                                   @if(in_array($dlc->name, $user_dlc)) checked @endif>
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                        </div>
                                        <label for="dlc_{{$dlc->name}}">
                                            @lang('dlc_list.'.$dlc->name)
                                            @if(!$dlc->mp_support)
                                                <s class="hint tooltipped" data-tooltip="@lang('general.mp_no_support')" data-position="bottom"><b>MP</b></s>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>
        </li>
    </ul>
</section>