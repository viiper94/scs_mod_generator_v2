{{--HEX section--}}
<div class="col s12 hex">
    <div class="mdc-text-field">
        <input type="text" id="color_hex" class="browser-default mdc-text-field__input" name="color[hex]" value="#ffffff" maxlength="7" style="text-transform: uppercase;">
        <div class="mdc-line-ripple"></div>
        <label for="color_hex" class="mdc-floating-label">HEX</label>
    </div>
    <span>@lang('general.type_color_hex')</span>
</div>

{{--RGB section--}}
<div class="col s12 rgb">
    <div class="mdc-text-field inline">
        <input type="text" id="color_rgb_r" class="browser-default mdc-text-field__input" name="color[rgb][r]" min="0" max="255" value="255" maxlength="3">
        <div class="mdc-line-ripple"></div>
        <label for="color_rgb_r" class="mdc-floating-label">R</label>
    </div>

    <div class="mdc-text-field inline">
        <input type="text" id="color_rgb_g" class="browser-default mdc-text-field__input" name="color[rgb][g]" min="0" max="255" value="255" maxlength="3">
        <div class="mdc-line-ripple"></div>
        <label for="color_rgb_g" class="mdc-floating-label">G</label>
    </div>
    <div class="mdc-text-field inline">
        <input type="text" id="color_rgb_b" class="browser-default mdc-text-field__input" name="color[rgb][b]" min="0" max="255" value="255" maxlength="3">
        <div class="mdc-line-ripple"></div>
        <label for="color_rgb_b" class="mdc-floating-label">B</label>
    </div>
    <span class="offset-m3">@lang('general.type_color_rgb')</span>
</div>

{{--SCS section--}}
<div class="col s12 scs">
    <div class="mdc-text-field inline">
        <input type="text" id="color_scs_r" class="browser-default mdc-text-field__input" name="color[scs][r]" value="1">
        <div class="mdc-line-ripple"></div>
        <label for="color_scs_r" class="mdc-floating-label">R</label>
    </div>
    <div class="mdc-text-field inline">
        <input type="text" id="color_scs_g" class="browser-default mdc-text-field__input" name="color[scs][g]" value="1">
        <div class="mdc-line-ripple"></div>
        <label for="color_scs_g" class="mdc-floating-label">G</label>
    </div>
    <div class="mdc-text-field inline">
        <input type="text" id="color_scs_b" class="browser-default mdc-text-field__input" name="color[scs][b]" value="1">
        <div class="mdc-line-ripple"></div>
        <label for="color_scs_b" class="mdc-floating-label">B</label>
    </div>
    <span class="offset-m3">@lang('general.type_color_scs')</span>
</div>