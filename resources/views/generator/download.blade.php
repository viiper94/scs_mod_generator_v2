<section class="trailer-generator row">
    <div class="download-row">
        <a href="/download/{{ Request::input('d') }}.scs" class="mdc-button mdc-button--unelevated  large-btn left">
            <i class="material-icons notranslate mdc-button__icon">file_download</i>
            @lang('general.download_mod')
        </a>
        <h5 class="no-margin">{{ Request::input('d') }}.scs</h5>
    </div>
</section>
