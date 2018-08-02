<aside id="mdc-dialog-lang" class="mdc-dialog" aria-labelledby="my-mdc-dialog-label" aria-describedby="my-mdc-dialog-description">
    <div class="mdc-dialog__surface">
        <header class="mdc-dialog__header">
            <h2 id="my-mdc-dialog-label" class="mdc-dialog__header__title center">{{I18n::t('choose_language')}}</h2>
        </header>
        <section id="my-mdc-dialog-description" class="mdc-dialog__body row">
            @php $languages = I18n::getLanguages(); @endphp
            @foreach (array_chunk($languages, ceil(count($languages)/2), true) as $array)
                <div class="col m6 s12 lang-col">
                    @foreach($array as $locale => $lang)
                        <a href="{{!$_SERVER['QUERY_STRING'] ? '' : '?'.$_SERVER['QUERY_STRING']}}"
                           class="valign-wrapper lang-btn @if(I18n::getUserLanguage() === $locale)active @endif"
                           data-lang="{{$locale}}">
                            <img src="./assets/img/langs/{{$locale}}.png" alt="{{$lang['title']}}>">
                            {{$lang['title']}}
                        </a>
                    @endforeach
                </div>
            @endforeach
            <div class="clearfix"></div>
            <h6 class="center" style="font-size: 14px">{{I18n::t('help_translate')}}<br>
                <a href="http://mods-generator.oneskyapp.com"
                   target="_blank"
                   class="grey-text text-darken-1" style="text-decoration: underline;">http://mods-generator.oneskyapp.com</a>
            </h6>
        </section>
        <footer class="mdc-dialog__footer">
            <button type="button" class="mdc-button mdc-ripple mdc-dialog__footer__button mdc-dialog__footer__button--accept">
                {{I18n::t('close')}}
            </button>
        </footer>
    </div>
    <div class="mdc-dialog__backdrop"></div>
</aside>