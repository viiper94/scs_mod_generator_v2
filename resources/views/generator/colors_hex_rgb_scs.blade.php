{{--HEX section--}}
<div class="col s12 hex">
    <div class="mdc-text-field">
        <input type="text" id="color_hex" class="browser-default mdc-text-field__input" name="color[hex]" value="#ffffff" maxlength="7" style="text-transform: uppercase;">
        <label for="color_hex" class="mdc-text-field__label">HEX</label>
        <div class="mdc-text-field__bottom-line"></div>
    </div>
    <span>@lang('general.type_color_hex')</span>
</div>

{{--RGB section--}}
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
    <span class="offset-m3">@lang('general.type_color_rgb')</span>
</div>

{{--SCS section--}}
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
    <span class="offset-m3">@lang('general.type_color_scs')</span>
</div>