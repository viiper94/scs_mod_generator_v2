<aside class="mdc-dialog mdc-dialog--scrollable" id="mdc-dialog-lang"
     role="alertdialog"
     aria-modal="true"
     aria-labelledby="my-dialog-title"
     aria-describedby="my-dialog-content">
    <div class="mdc-dialog__container">
        <div class="mdc-dialog__surface">
            <div class="row">
                <h2 class="mdc-dialog__title" id="my-dialog-title">@lang('general.choose_language')</h2>
            </div>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <div class="row">
                    @if(isset($languages))
                        @foreach (array_chunk($languages, ceil(count($languages)/2), true) as $array)
                            <div class="col m6 s12 lang-col">
                                @foreach($array as $locale => $lang)
                                    <a href="{{!$_SERVER['QUERY_STRING'] ? '' : '?'.$_SERVER['QUERY_STRING']}}"
                                       class="valign-wrapper lang-btn @if(\Illuminate\Support\Facades\App::isLocale($locale))active @endif"
                                       data-lang="{{$locale}}">
                                        <img src="{{ asset('assets/img/langs/'.$locale.'.png') }}" alt="{{$lang['title']}}>">
                                        {{$lang['title']}}
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <h6 class="center" style="font-size: 14px">@lang('general.help_translate')<br>
                        <a href="https://mods-generator.oneskyapp.com"
                           target="_blank"
                           class="grey-text text-darken-1" style="text-decoration: underline;">https://mods-generator.oneskyapp.com</a>
                    </h6>
                </div>
            </div>
            <footer class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="close">
                    <span class="mdc-button__label">@lang('general.close')</span>
                </button>
            </footer>
        </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
</aside>
