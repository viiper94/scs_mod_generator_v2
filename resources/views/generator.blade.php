@extends('layout.app')

@section('content')

    <div class="container">
        @if(isset($_GET['d']))
            <section class="row">
                <div class="download-row">
                    <a href="/download{{$_GET['d']}}.scs" class="mdc-button mdc-button--raised mdc-ripple large-btn left">
                        <i class="material-icons notranslate mdc-button__icon">file_download</i>
                        {{I18n::t('download_mod')}}
                    </a>
                    <h6>{{$_GET['d']}}.scs</h6>
                </div>
            </section>
        @endif
        @if($errors)
            <section class="row">
                <div class="card-panel">
                    <h5 class="card-title light"><i class="material-icons left notranslate">warning</i>{{I18n::t('error')}})</h5>
                </div>
            </section>
        @endif
	    <!--[if gt IE 6]>
            <section class="card-panel yellow lighten-3">
                <h5 class="card-title"><i class="material-icons left notranslate">warning</i>{{I18n::t('ie_notification')}}</h5>
            </section>
        <![endif]-->
        <section class="card">
            <form action="/generator" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <div class="mdc-text-field">
                                <input type="text" id="title" class="browser-default mdc-text-field__input" name="title">
                                <label for="title" class="mdc-text-field__label">{{I18n::t('mod_title')}}</label>
                                <div class="mdc-text-field__bottom-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chassis">
                        <div class="col s12">
                            <label for="select-chassis">{{I18n::t('pick_chassis')}}</label>
                            <select class="browser-default ui search dropdown chassis" id="select-chassis" name="chassis" required>
                                <option selected value="">{{I18n::t('choose_chassis')}}</option>
                                <option value="paintable">{{I18n::t('paintable_chassis')}}</option>
                                @foreach($chassis_list as $chassis)
                                    <option value="{{$chassis->alias}}">{{I18n::t($chassis->alias)}}
                                        @if($chassis->isDLCContent())
                                            - {{I18n::t($chassis->dlc->name)}}
                                        @endif
                                    </option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" id="accessory" style="display: none">
                        <div class="col s12">
                            <label class="for-select">{{I18n::t('pick_accessory')}}</label>
                        </div>
                        <div class="col s12">
                            <div class="mdc-switch">
                                <input type="checkbox" id="all_accessories" data-target="accessory" class="mdc-switch__native-control" />
                                <div class="mdc-switch__background">
                                    <div class="mdc-switch__knob"></div>
                                </div>
                            </div>
                            <label for="all_accessories" class="mdc-switch-label">{{I18n::t('show_all_accessories')}}</label>
                        </div>
                    </div>
                    <div class="row" id="paint" style="display: none">
                        <div class="col s12">
                            <label class="for-select">{{I18n::t('pick_paint')}}</label>
                        </div>
                        <div class="colors" style="display: none;">
                            <div class="col s12 palette">
                                <div class="input-field inline" style="height: 26px; min-width: 170px;">
                                    <input type="color" name="color" value="#ffffff" style="cursor: pointer; width: 170px;" id="color_palette">
                                </div>
                                <span class="offset-m3">{{I18n::t('pick_color')}}</span>
                            </div>
                            <div class="col s12 hex">
                                <div class="mdc-text-field">
                                    <input type="text" id="color_hex" class="browser-default mdc-text-field__input" name="color[hex]" value="#ffffff" maxlength="7" style="text-transform: uppercase;">
                                    <label for="color_hex" class="mdc-text-field__label">HEX</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <span>{{I18n::t('type_color_hex')}}</span>
                            </div>
                            <div class="col s12 rgb">
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_rgb_r" class="browser-default mdc-text-field__input" name="color[rgb][r]" min="0" max="255" value="255" maxlength="3">
                                    <label for="color_rgb_r" class="mdc-text-field__label">R</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_rgb_g" class="browser-default mdc-text-field__input" name="color[rgb][g]" min="0" max="255" value="255" maxlength="3">
                                    <label for="color_rgb_g" class="mdc-text-field__label">G</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_rgb_b" class="browser-default mdc-text-field__input" name="color[rgb][b]" min="0" max="255" value="255" maxlength="3">
                                    <label for="color_rgb_b" class="mdc-text-field__label">B</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <span class="offset-m3">{{I18n::t('type_color_rgb')}}</span>
                            </div>
                            <div class="col s12 scs">
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_scs_r" class="browser-default mdc-text-field__input" name="color[scs][r]" value="1">
                                    <label for="color_scs_r" class="mdc-text-field__label">R</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_scs_g" class="browser-default mdc-text-field__input" name="color[scs][g]" value="1">
                                    <label for="color_scs_g" class="mdc-text-field__label">G</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_scs_b" class="browser-default mdc-text-field__input" name="color[scs][b]" value="1">
                                    <label for="color_scs_b" class="mdc-text-field__label">B</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <span class="offset-m3">{{I18n::t('type_color_scs')}}</span>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="mdc-switch">
                                <input type="checkbox" id="all_paints" data-target="paint" class="mdc-switch__native-control" />
                                <div class="mdc-switch__background">
                                    <div class="mdc-switch__knob"></div>
                                </div>
                            </div>
                            <label for="all_paints" class="mdc-switch-label">{{I18n::t('show_all_paints')}}</label>
                        </div>
                    </div>
                    <section class="advanced row" style="margin-bottom: 0;">
                        <ul class="collapsible z-depth-0 col s12">
                            <li>
                                <div class="collapsible-header grey-text"><i class="material-icons notranslate">arrow_drop_down</i>{{I18n::t('advanced')}}</div>
                                <div class="collapsible-body">
                                    <label>{{I18n::t('image_upload')}}</label>
                                    <div class="file-field input-field mdc-button mdc-button--raised">
                                        <div class="input-wrapper">
                                            <i class="material-icons mdc-button__icon notranslate" style="font-size: 2em; padding-top: 2px;">file_upload</i>
                                            <input type="file" name="img" id="image" accept="image/jpeg, image/png"
                                                   data-size="{{I18n::t('max_file_size_5')}}"
                                                   data-dimensions="{{I18n::t('max_dimensions_3000')}}">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path right" type="text" id="image-path" placeholder="{{I18n::t('upload_image')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="mdc-text-field weight">
                                        <input type="text" id="weight" class="browser-default mdc-text-field__input" name="weight">
                                        <label for="weight" class="mdc-text-field__label">{{I18n::t('trailer_weight')}}</label>
                                        <div class="mdc-text-field__bottom-line"></div>
                                    </div>
                                    <div class="wheels input-field" style="display: none;">
                                        <select class="icons" name="wheels">
                                            <option value="" selected>{{I18n::t('w_default')}}</option>
                                            @foreach($wheels as $wheel)
                                                <option value="{{$wheel->def}}" data-icon="assets/img/wheels/{{$game}}/{{$wheel->alias}}.jpg">{{I18n::t($wheel->alias)}}</option>
                                            @endforeach
                                        </select>
                                        <label>{{I18n::t('select_wheels')}}</label>
                                    </div>
                                    <div class="dlc">
                                        <label>{{I18n::t('include_dlc')}}:</label>
                                        @foreach($dlc_list as $dlc)
                                            <div class="{{$dlc->name}}">
                                                <div class="mdc-switch">
                                                    <input type="checkbox" id="dlc_{{$dlc->name}}" data-target="paint"
                                                           class="mdc-switch__native-control" name="dlc[{{$dlc->name}}]">
                                                    <div class="mdc-switch__background">
                                                        <div class="mdc-switch__knob"></div>
                                                    </div>
                                                </div>
                                                <label for="dlc_{{$dlc->name}}" class="mdc-switch-label">{{I18n::t($dlc->name)}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
                <div class="card-action row center-on-small-only">
                    <input type="hidden" name="target" value="{{$game}}">
                    <button class="mdc-button mdc-button--raised mdc-ripple left-med-and-up" id="generate-btn" type="submit"
                            onclick="return confirm('{{I18n::t('are_you_sure')}}')" disabled>
                        <i class="material-icons mdc-button__icon notranslate">send</i>{{I18n::t('proceed')}}
                    </button>
                    <a href="/gallery{{($game == 'ats') ? '#ats' : ''}}"
                       class="gallery-btn right-med-and-up mdc-button mdc-ripple">
                        <i class="material-icons mdc-button__icon notranslate">photo_library</i>{{I18n::t('trailers_gallery')}}
                    </a>
                </div>
            </form>
        </section>
        @if(!key_exists(I18n::getUserAcceptLanguage(true), $langs))
            <section class="card-panel grey-text">
                <span class="card-title">
                    <i class="material-icons left notranslate">info</i>
                    {{I18n::t('help_translate')}}
                    <a href="http://mods-generator.oneskyapp.com"
                       target="_blank"
                       class="grey-text text-darken-1" style="text-decoration: underline; white-space: nowrap;">http://mods-generator.oneskyapp.com</a>
                </span>
            </section>
        @endif
    </div>
    <div class="fixed-action-btn tooltipped" data-tooltip="{{I18n::t('how_to')}}">
        <a class="mdc-fab mdc-ripple orange darken-3 modal-trigger" href="#how" id="how-to">
            <span class="mdc-fab__icon">?</span>
        </a>
    </div>

    <aside id="mdc-dialog-how-to" class="mdc-dialog" role="alertdialog" aria-labelledby="my-mdc-dialog-label" aria-describedby="my-mdc-dialog-description">
        <div class="mdc-dialog__surface">
            <header class="mdc-dialog__header">
                <h2 id="my-mdc-dialog-label" class="mdc-dialog__header__title">{{I18n::t('how_to_modal')}}</h2>
            </header>
            <section id="my-mdc-dialog-description" class="mdc-dialog__body">
                <ol>
                    <li>{{I18n::t('instruction_modal_1')}}</li>
                    <li>{{I18n::t('instruction_modal_2')}}</li>
                    <li>{{I18n::t('instruction_modal_3')}}</li>
                    <li>{{I18n::t('instruction_modal_4')}}</li>
                    <li>{{I18n::t('instruction_modal_5')}}</li>
                    <li>{{I18n::t('instruction_modal_6')}}</li>
                </ol>
            </section>
            <header class="mdc-dialog__header">
                <h2 id="my-mdc-dialog-label" class="mdc-dialog__header__title">{{I18n::t('how_to_install_mod')}}</h2>
            </header>
            <section id="my-mdc-dialog-description" class="mdc-dialog__body">
                <ol>
                    <li>{{I18n::t('instruction_modal_7')}}</li>
                    <li>{{I18n::t('instruction_modal_8')}}</li>
                    <li>{{I18n::t('instruction_modal_9')}}</li>
                    <li>{{I18n::t('instruction_modal_10')}}</li>
                    <li>{{I18n::t('instruction_modal_11')}}</li>
                </ol>
            </section>
            <footer class="mdc-dialog__footer">
                <button type="button" class="mdc-button mdc-ripple mdc-dialog__footer__button mdc-dialog__footer__button--accept">{{I18n::t('close_modal')}}</button>
            </footer>
        </div>
        <div class="mdc-dialog__backdrop"></div>
    </aside>


@endsection