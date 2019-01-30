<section class="advanced row" style="margin-bottom: 0;">
    <ul class="collapsible z-depth-0 col s12">
        <li>
            <div class="collapsible-header grey-text"><i class="material-icons notranslate">arrow_drop_down</i>@lang('general.advanced')</div>
            <div class="collapsible-body">

                {{--Image section--}}
                <label>@lang('general.image_upload')</label>
                <div class="file-field input-field mdc-button mdc-button--raised">
                    <div class="input-wrapper">
                        <i class="material-icons mdc-button__icon notranslate" style="font-size: 2em; padding-top: 2px;">add_photo_alternate</i>
                        <input type="file" name="img" id="image" accept="image/jpeg, image/png"
                               data-size="@lang('validation.custom.img.max')"
                               data-dimensions="@lang('validation.custom.img.dimensions')">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path right" type="text" id="image-path" placeholder="@lang('general.upload_image')" readonly>
                    </div>
                </div>

                {{--Weight section--}}
                <!--div class="mdc-text-field weight">
                    <input type="text" id="weight" class="browser-default mdc-text-field__input" name="weight">
                    <label for="weight" class="mdc-text-field__label">@lang('general.trailer_weight')</label>
                    <div class="mdc-text-field__bottom-line"></div>
                </div>
                <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent yellow-text text-darken-3"
                   aria-hidden="false" id="weight-helper-text">@lang('general.weight_apply')</p>
                <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent red-text"
                   aria-hidden="false" id="weight-helper-text">@lang('general.mp_no_support')</p-->

                {{--Wheels section--}}
                <div class="wheels input-field" style="display: none;">
                    <select class="icons" name="wheels">
                        <option value="" selected>@lang('general.w_default')</option>
                        @foreach($wheels as $wheel)
                            <option data-icon="assets/img/wheels/{{$game}}/{{$wheel->alias}}.jpg"
                                    value="{{$wheel->def}}">{{ $wheel->getWheelName() }}</option>
                        @endforeach
                    </select>
                    <label>@lang('general.select_wheels')</label>
                </div>

                {{--DLC section--}}
                <div class="dlc row">
                    <label>@lang('general.include_dlc')
                        <button id="check_all" data-check="0" type="button">(@lang('general.check_all'))</button>:
                    </label>
                    @php $user_dlc = explode(',', Auth::user()->owned_dlc) @endphp
                    @foreach($dlc_list as $dlc_group)
                        <div class="col s12 m6">
                            @foreach($dlc_group as $dlc)
                                <div class="{{$dlc->name}}">
                                    <div class="mdc-switch">
                                        <input type="checkbox" id="dlc_{{$dlc->name}}" data-target="paint"
                                               class="mdc-switch__native-control" name="dlc[{{$dlc->name}}]"
                                                @if(in_array($dlc->name, $user_dlc)) checked @endif>
                                        <div class="mdc-switch__background">
                                            <div class="mdc-switch__knob"></div>
                                        </div>
                                    </div>
                                    <label for="dlc_{{$dlc->name}}" class="mdc-switch-label">
                                        @lang('dlc_list.'.$dlc->name)
                                        @if(!$dlc->mp_support)
                                            (@lang('general.mp_no_support'))
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>
        </li>
    </ul>
</section>