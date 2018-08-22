<aside id="mdc-dialog-lang" class="mdc-dialog" aria-labelledby="my-mdc-dialog-label" aria-describedby="my-mdc-dialog-description" style="padding-left: 350px;">
    <div class="mdc-dialog__surface" style="max-width: 430px; min-width: 430px">
        <header class="mdc-dialog__header">
            <h2 id="my-mdc-dialog-label" class="mdc-dialog__header__title center">@lang('general.choose_language')</h2>
        </header>
        <section id="my-mdc-dialog-description" class="mdc-dialog__body row">
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
        </section>
        <div class="row">
            <h6 class="center" style="font-size: 14px">@lang('general.help_translate')<br>
                <a href="http://mods-generator.oneskyapp.com"
                   target="_blank"
                   class="grey-text text-darken-1" style="text-decoration: underline;">http://mods-generator.oneskyapp.com</a>
            </h6>
        </div>
        <footer class="mdc-dialog__footer">
            <button type="button" class="mdc-button mdc-ripple mdc-button--raised mdc-dialog__footer__button--accept">
                @lang('general.close')
            </button>
        </footer>
    </div>
    <div class="mdc-dialog__backdrop"></div>
</aside>