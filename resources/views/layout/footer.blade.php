<div class="row">
    <div class="col m6 s12 center">
        <h4 class="light">1.31.*</h4>
        <p class="">{{I18n::t('supported_ets_version')}}</p>
    </div>
    <div class="col m6 s12 center">
        <h4 class="light">1.31.*</h4>
        <p class="">{{I18n::t('supported_ats_version')}}</p>
    </div>
</div>
<div class="theme center">
    <div class="mdc-switch">
        <input type="checkbox" id="toggle-dark" class="mdc-switch__native-control" @if(isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true') checked @endif>
        <div class="mdc-switch__background">
            <div class="mdc-switch__knob"></div>
        </div>
    </div>
    <label for="toggle-dark" class="mdc-switch-label">{{I18n::t('dark_theme')}}</label>
</div>
<div class="version center">
    <p>{{I18n::t('current_version')}} - 2.0</p>
</div>
<div class="row center">
    <span class="footer-copyright">&copy; <a href="http://steamcommunity.com/id/viiper94/" target="_blank">[Mayday]</a> - {{date('Y')}}</span>
</div>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/mdc/js/material-components-web.min.js"></script>
<script type="text/javascript" src="assets/semanticui/semanticui.min.js"></script>
<script type="text/javascript" src="assets/materialize/js/materialize.min.js?2805"></script>
<script type="text/javascript" src="assets/js/script.js"></script>