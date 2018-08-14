$(document).ready(function(){

	var btns = document.querySelectorAll('.mdc-ripple:not([data-no-js])');
	for (var i = 0, btn; btn = btns[i]; i++) {
		mdc.ripple.MDCRipple.attachTo(btn);
	}

	var how_to_modal = document.querySelector('#mdc-dialog-how-to');
	if(how_to_modal !== null){
		var how_to_dialog = new mdc.dialog.MDCDialog(how_to_modal);
		$('#how-to').click(function(){
            how_to_dialog.show();
		});
	}

	var lang_modal = document.querySelector('#mdc-dialog-lang');
	if(lang_modal !== null){
		var lang_dialog = new mdc.dialog.MDCDialog(lang_modal);
		$('#lang-sw').click(function(){
            lang_dialog.show();
		});
	}

	var tfs = document.querySelectorAll('.mdc-text-field:not([data-demo-no-auto-js])');
	for (var i = 0, tf; tf = tfs[i]; i++) {
		mdc.textField.MDCTextField.attachTo(tf);
	}

	$('#toggle-dark').change(function(){
		if(this.checked){
			$('body').addClass('mdc-theme--dark');
			setCookie('dark_theme', 'true', {
				expires : 3600 * 24 * 365
			});
		}else{
			$('body').removeClass('mdc-theme--dark');
			setCookie('dark_theme', 'true', {
				expires : -1
			});
		}
	});

	$('.tooltipped').tooltip({
		position : 'left',
		exitDelay : 200
	});
	$('.wheels select').formSelect();
	$('.tabs').tabs();
	$('.collapsible').collapsible();

	$('.show-skin').collapsible({
		onOpenStart : function(){
			var ul = $(this)[0].$el;
			$.ajax({
				cache: false,
				dataType : 'json',
				type : 'POST',
				data : {
					'_token' : ul.data('token'),
					'target' : ul.data('game'),
					'chassis' : ul.data('trailer'),
					'lang' : getCookie('lang')
				},
				beforeSend : function(){
					ul.find('.collapsible-header').append(getPreloaderHtml('tiny'));
				},
				success : function(response){
					if(response.status === 'OK'){
						var html ='<ul class="ac-list browser-default">';
						$.each(response.result, function(key, value){
							if(key !== 0) html += '<li>'+value.name+'</li>';
						});
						html += '</ul>';
						ul.find('.collapsible-body').append(html);
					}
				},
				complete : function(){
					$('.preloader-wrapper').remove();
				}
			});
		},
		onCloseEnd : function(){
			var ul = $(this)[0].$el;
			ul.find('.ac-list').remove();
		}
	});

	$('.lang-btn').click(function(){
		setCookie('lang', $(this).data('lang'), {
			expires : 3600 * 24 * 365
		})
	});

    $('#color-select-chassis').uidropdown({
        fullTextSearch : true,
        duration : 300,
        placeholder : false,
        forceSelection : false
    });

    $('#advanced_color').change(function () {
        if(this.checked){
            $('.color-advanced').show();
        }else{

            $('.color-advanced').hide();
        }
    });

	$('#select-chassis').uidropdown({
		fullTextSearch : true,
		duration : 300,
		placeholder : false,
		forceSelection : false,
		onChange : function(value, text, $choice){
			$('#accessory').hide().find('.ui.search').remove();
			$('#paint').hide().find('.ui.search').remove();
			$('.colors').hide();
			$('#all_accessories, #all_paints').prop('checked', false);
            $('[id^=dlc_]').prop('checked', false).prop('disabled', false);
			$('#generate-btn').attr('disabled', true);
			if(value !== ''){
				$('#generate-btn').attr('disabled', false);
				if(value !== 'schw_overweight' && value.indexOf('goldhofer') === -1){
					$('.wheels.input-field').show();
				}else{
					$('.wheels.input-field').hide();
					$('.wheels.input-field select').val('');
				}
				$.ajax({
					cache: false,
					dataType : 'json',
					type : 'POST',
					data : {
						'_token' : $('input[name=_token]').val(),
						'target' : $('input[name=target]').val(),
						'chassis' : value,
						'lang' : getCookie('lang')
					},
					beforeSend : function(){
						$('#chassis').after(getPreloaderHtml('small'));
					},
					success : function(response){
						if(response.status === 'OK'){
							$.each(response.result, function(target, data){
								var select = $('<select class="browser-default ui search dropdown '+target+'" name="'+target+'"></select>');
								$.each(data.echo, function(index, item){
									var option = '<option value="'+item.value+'"';
									if(item.selected) option += ' selected';
									option += '>'+item.name+'</option>';
									select.append(option);
								});
								$('#'+target).show().find('label.for-select').after(select);
								select.uidropdown({
									fullTextSearch : true,
									duration : 300,
									placeholder : false,
									forceSelection : false,
									onChange : function(value, text, $choice){
										getDLCList(value);
										value = value.split('/');
										if(value[value.length - 1] === 'default.sii' || value[value.length - 1] === 'default'){
											$('.colors').show();
										}else{
											$('.colors').hide();
										}
									}
								});
                                $.each(response.dlc, function(index, dlc){
									$('#dlc_'+dlc).prop('checked', true).prop('disabled', true);
                                });
							});
						}
					},
					complete : function(){
						$('.preloader-wrapper').remove();
					}
				});
			}
		}
	});

	$('form').submit(function(){
		if($('input[name=title]').val() === ''){
			$('input[name=title]').val($('select[name=chassis] option:selected').text().replace(/(\s\s.+)/, '').trim());
		}
	});

	$('#all_accessories, #all_paints').change(function(){
        getDLCList('');
		$('.colors').hide();
		var target = $(this).data('target');
		$.ajax({
			cache: false,
			dataType : 'json',
			type : 'POST',
			data : {
                '_token' : $('input[name=_token]').val(),
				'target' : $('input[name=target]').val(),
				'all' : $(this)[0].checked,
				'select' : target,
				'chassis' : $('select[name=chassis]').val(),
				'lang' : getCookie('lang')
			},
			beforeSend : function(){
				$('#'+$(this).data('target')+' h5').append(getPreloaderHtml('tiny'));
			},
			success : function(response){
				if(response.status === 'OK'){
					$.each(response.result, function(key, data){
						if(key === target){
							$('#'+key).find('.ui.search').remove();
							var select = $('<select class="browser-default ui search dropdown '+target+'" name="'+target+'"></select>');
							$.each(data.echo, function(index, item){
								var option = '<option value="'+item.value+'"';
								if(item.selected) option += ' selected';
								option += '>'+item.name+'</option>';
								select.append(option);
							});
							$('#'+key).show().find('label.for-select').after(select);
							select.uidropdown({
								fullTextSearch : true,
								duration : 300,
								placeholder : false,
								forceSelection : false,
								onChange : function(value, text, $choice){
                                    getDLCList(value);
									showColors(value);
								}
							});
						}
					});
					showColors($('#paint').find('select').val());
				}
			},
			complete : function(){
				$('.preloader-wrapper').remove();
			}
		});
	});

	$('.colors input[type=color]').change(function(){
		var rgb = hexToRgb($(this).val());
		var scs = rgbToScs(rgb.r, rgb.g, rgb.b);
		setColors($(this).val(), rgb, scs);
	});

	$('#color_hex').keyup(function(){
		var val = $(this).val();
		if(val !== ''){
			var regexp = new RegExp('^#?[A-Fa-f0-9]{6}$');
			if(regexp.test(val)){
				var hex = val.replace('#', '');
				var rgb = hexToRgb(hex);
				var scs = rgbToScs(rgb.r, rgb.g, rgb.b);
				setColors('#'+hex, rgb, scs);
			}
		}
	});

	$('#color_rgb_b, #color_rgb_g, #color_rgb_r').keyup(function(){
		var val = $(this).val().replace(/\D/g, '');
		$(this).val(val);
		val = parseInt(val);
		if(!isNaN(val)){
			if(val > 255){
				$(this).val(255);
				$(this).trigger('keyup');
			}else{
				var rgb = {
					r : parseInt($('#color_rgb_r').val()),
					g : parseInt($('#color_rgb_g').val()),
					b : parseInt($('#color_rgb_b').val())
				};
				var hex = rgbToHex(rgb.r, rgb.g, rgb.b);
				var scs = rgbToScs(rgb.r, rgb.g, rgb.b);
				setColors(hex, rgb, scs);
			}
		}
	});

	$('#color_scs_b, #color_scs_g, #color_scs_r').keyup(function(){
		var val = $(this).val().replace(/,/g, '.').replace(/\.+/g, '.').replace(/[^\d|\.]/g, '');
		$(this).val(val);
		val = parseFloat(val);
		if(!isNaN(val)){
			if(val > 1){
				$(this).val(1);
				$(this).trigger('keyup');
			}else{
				var scs = {
					r: parseFloat($('#color_scs_r').val()),
					g: parseFloat($('#color_scs_g').val()),
					b: parseFloat($('#color_scs_b').val())
				};
				var rgb = {
					r: Math.round(Math.sqrt(scs.r) * 255),
					g: Math.round(Math.sqrt(scs.g) * 255),
					b: Math.round(Math.sqrt(scs.b) * 255)
				};
				var hex = rgbToHex(rgb.r, rgb.g, rgb.b);
				$('#color_palette').val(hex);
				$('#color_hex').val(hex);
				$('#color_rgb_r').val(rgb.r);
				$('#color_rgb_g').val(rgb.g);
				$('#color_rgb_b').val(rgb.b);
			}
		}
	});

	$('#weight').keyup(function(){
		var val = $(this).val();
		var newVal = $(this).val();
		var regexpDigits = new RegExp('^\d*$');
		if(!regexpDigits.test(val)){
			newVal = val.replace(/\D/, '');
			$(this).val(newVal);
		}
		if(newVal.length > 10){
			$(this).val(newVal.substr(0, 10));
		}
	});

	$('#image').change(function(){
		var _URL = window.URL || window.webkitURL;
		if(this.files[0].size > 5500000){
			alert($(this).data('size'));
			$(this).val('');
			return false;
		}
		var file, img, dimensions = $(this).data('dimensions');
		if ((file = this.files[0])) {
			img = new Image();
			img.src = _URL.createObjectURL(file);
			img.onload = function () {
				if(this.width > 3000 || this.height > 3000){
					alert(dimensions);
					$('#image').val('');
					$('#image-path').val('');
					return false;
				}
			};
		}
	});

});

function getDLCList(value) {
	$.ajax({
        cache: false,
        dataType : 'json',
        type : 'POST',
        data : {
            '_token' : $('input[name=_token]').val(),
            'target' : $('input[name=target]').val(),
			'accessory' : value,
            'chassis' : $('select[name=chassis]').val(),
        },
		success : function(response){
            $('[id^=dlc_]').prop('checked', false).prop('disabled', false);
            $.each(response.dlc, function(index, dlc){
                $('#dlc_'+dlc).prop('checked', true).prop('disabled', true);
            });
        }
	});
}

function showColors(value){
	if(value.length > 0) value = value.split('/');
	if(value[value.length - 1] === 'default.sii'){
		$('.colors').show();
	}else{
		$('.colors').hide();
	}
}

function setColors(hex, rgb, scs){
	$('#color_palette').val(hex);
	$('#color_hex').val(hex);
	$('#color_rgb_r').val(rgb.r);
	$('#color_rgb_g').val(rgb.g);
	$('#color_rgb_b').val(rgb.b);
	$('#color_scs_r').val(parseFloat(scs.r.toFixed(4)));
	$('#color_scs_g').val(parseFloat(scs.g.toFixed(4)));
	$('#color_scs_b').val(parseFloat(scs.b.toFixed(4)));
}

function rgbToHex(r, g, b) {
	return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}

function componentToHex(c) {
	var hex = c.toString(16);
	return hex.length == 1 ? "0" + hex : hex;
}

function hexToRgb(hex) {
	var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	return result ? {
		r: parseInt(result[1], 16),
		g: parseInt(result[2], 16),
		b: parseInt(result[3], 16)
	} : null;
}

function rgbToScs(r, g, b){
	return {
		r : Math.pow((r / 255), 2),
		g : Math.pow((g / 255), 2),
		b : Math.pow((b / 255), 2)
	};
}

function getCookie(name) {
	var matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options) {
	options = options || {};

	var expires = options.expires;

	if (typeof expires == "number" && expires) {
		var d = new Date();
		d.setTime(d.getTime() + expires * 1000);
		expires = options.expires = d;
	}
	if (expires && expires.toUTCString) {
		options.expires = expires.toUTCString();
	}

	value = encodeURIComponent(value);

	var updatedCookie = name + "=" + value;

	for (var propName in options) {
		updatedCookie += "; " + propName;
		var propValue = options[propName];
		if (propValue !== true) {
			updatedCookie += "=" + propValue;
		}
	}

	document.cookie = updatedCookie;
}

function getPreloaderHtml(preloaderClass, color){
	if(preloaderClass === undefined) preloaderClass = '';
	if(color === undefined) color = 'spinner-red-only';
	return '<div class="preloader-wrapper active '+preloaderClass+'">'+
		'<div class="spinner-layer '+color+'">'+
		'<div class="circle-clipper left">'+
		'<div class="circle"></div>'+
		'</div>' +
		'<div class="gap-patch">'+
		'<div class="circle"></div>'+
		'</div>' +
		'<div class="circle-clipper right">'+
		'<div class="circle"></div>'+
		'</div>'+
		'</div>'+
		'</div>';
}