<section class="row">
    <div class="download-row">
        <a href="/download/{{ Request::input('d') }}.scs" class="mdc-button mdc-button--raised mdc-ripple large-btn left">
            <i class="material-icons notranslate mdc-button__icon">file_download</i>
            @lang('general.download_mod')
        </a>
        <h6>{{ Request::input('d') }}.scs</h6>
    </div>
</section>