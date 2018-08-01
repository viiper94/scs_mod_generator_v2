@php
    $game = $_GET['game'] ?? 'ets2';
    $_SERVER['SCRIPT_NAME'] !== '/gallery' ? : $game = null;
@endphp

<div class="navbar-fixed">
    <nav class="blue-grey darken-3">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo left" style="font-weight: 500; text-transform: uppercase; margin-left: 35px;">{{ I18n::t('head_title') }}</a>
            <ul id="nav-mobile" class="right">
                <li @if($game == 'ets2')class="active"@endif><a href="/"><?= I18n::t('ets2') ?></a></li>
                <li @if($game == 'ats') class="active"@endif><a href="/ats"><?= I18n::t('ats') ?></a></li>
                <li><a href="#lang" id="lang-sw"><i class="material-icons notranslate">language</i></a></li>
            </ul>
        </div>
    </nav>
</div>