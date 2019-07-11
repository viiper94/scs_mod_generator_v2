import {MDCTextField} from '@material/textfield';
import {MDCTextFieldIcon} from '@material/textfield/icon';
import {MDCLineRipple} from '@material/line-ripple';
import {MDCSwitch} from '@material/switch';
import {MDCDialog} from '@material/dialog';
import {MDCList} from '@material/list';

$(document).ready(function(){

    var textFields = [];
    var textFieldIcons = [];
    var lineRipples = [];
    var switches = [];
    $.each($('.mdc-text-field'), function(i, item){
        textFields[i] = new MDCTextField(item);
    });
    $.each($('.mdc-text-field__icon'), function(i, item){
        textFieldIcons[i] = new MDCTextFieldIcon(item);
    });
    $.each($('.mdc-line-ripple'), function(i, item){
        lineRipples[i] = new MDCLineRipple(item);
    });
    $.each($('.mdc-switch'), function(i, item){
        switches[i] = new MDCSwitch(item);
    });

    if(document.querySelector('#mdc-dialog-edit-chassis') !== null){
        const editChassis = new MDCDialog(document.querySelector('#mdc-dialog-edit-chassis'));
        $('.edit-chassis').click(function(){
            editChassis.open();
        });
    }
    if(document.querySelector('#mdc-dialog-lang') !== null){
        const langDialog = new MDCDialog(document.querySelector('#mdc-dialog-lang'));
        $('#lang-sw').click(function(){
            langDialog.open();
        });
    }
    if(document.querySelector('#mdc-dialog-how-to') !== null){
        const howToDialog = new MDCDialog(document.querySelector('#mdc-dialog-how-to'));
        $('#how-to').click(function(){
            howToDialog.open();
        });
    }
    if(document.querySelector('.mdc-list') !== null) {
        const list = new MDCList(document.querySelector('.mdc-list'));
    }

	$('.tooltipped').tooltip({position: 'left', exitDelay: 0});
    $('.user-view').dropdown({alignment: 'right', constrainWidth: false, coverTrigger: false, closeOnClick: false, inDuration: 30, outDuration: 0});
    $('.tabs').tabs();
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.wheels select, #select-lang').formSelect();
    $('.materialboxed').materialbox();
    $('select#lang').formSelect();
    $('.fixed-action-btn').floatingActionButton();

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
					'chassis' : ul.data('trailer')
				},
				beforeSend : function(){
					ul.find('.collapsible-header').first().append(getPreloaderHtml('tiny'));
				},
				success : function(response){
					if(response.status === 'OK'){
						$.each(response.result, function(target, data){
                            var html ='<ul class="ac-list browser-default">';
						    $.each(data, function(key, value){
                                if(value.value !== 'all' && value.value !== '') html += '<li>'+value.name+'</li>';
                            });
                            html += '</ul>';
                            ul.find('li.'+target+' .collapsible-body').append(html);
						});
					}
                    $('.dlc-tooltipped').tooltip();
				},
				complete : function(){
					$('.preloader-wrapper').remove();
				}
			});
		},
		onCloseEnd : function(){
            var ul = $(this)[0].$el;
            $(ul).find('.dlc-tooltipped').tooltip('destroy');
            ul.find('.ac-list').remove();
        }
	});

	$('.lang-btn').click(function(){
		setCookie('lang', $(this).data('lang'), {
			expires : 3600 * 24 * 365
		})
	});

    $('#advanced_color').change(function () {
        if(this.checked){
            $('.color-advanced').show();
        }else{

            $('.color-advanced').hide();
        }
    });

    $('#select-wheels').uidropdown({
        duration : 300,
        placeholder : false,
        forceSelection : false
    });

	$('#select-chassis').uidropdown({
		fullTextSearch : true,
		duration : 300,
		placeholder : false,
        allowReselection : true,
		forceSelection : false,
		onChange : function(value, text, $choice){
			$('#accessory').hide().find('.ui.search').remove();
			$('#paint').hide().find('.ui.search').remove();
			$('.colors').hide();
			$('#all_accessories, #all_paints').prop('checked', false);
            $('[id^=dlc_]').prop('checked', false).prop('disabled', false);
            $('[id^=dlc_] + input[type=hidden]').remove();
			$('#generate-btn').attr('disabled', true);
			if(value !== ''){
				$('#generate-btn').attr('disabled', false);
                $('.wheels').hide();
                $('.wheels select').val('');
				$.ajax({
					cache: false,
					dataType : 'json',
					type : 'POST',
					data : {
						'_token' : $('input[name=_token]').val(),
						'target' : $('input[name=target]').val(),
						'chassis' : value
					},
					beforeSend : function(){
                        $('#select-chassis').addClass('loading');
					},
					success : function(response){
						if(response.status === 'OK'){
							$.each(response.result, function(target, data){
								var select = $('<div class="ui search dropdown '+target+'">'+
                                        '<input type="hidden" name="'+target+'">' +
                                        '<div class="text"></div>' +
                                        '<i class="dropdown icon right"></i>'+
                                    '</div>');
								select.uidropdown({
                                    values: data.echo,
									fullTextSearch : true,
									duration : 300,
									placeholder : false,
									forceSelection : true,
									onChange : function(value, text, $choice){
										getDLCList(value);
										if($choice.children('span').data('with-color') === 1){
											$('.colors').show();
										}else{
											$('.colors').hide();
										}
									}
								});
                                $('#'+target).show().find('label.for-select').after(select);
                                $('.dropdown .dlc-tooltipped').tooltip({position : 'left'});
							});
                            $.each(response.dlc, function(index, dlc){
                                $('#dlc_'+dlc).prop('checked', true).prop('disabled', true)
                                    .after('<input type="hidden" name="'+$('#dlc_'+dlc).attr('name')+'" value="true">');
                            });
                            if(response.wheels){
                                $('.wheels.input-field').show();
                            }else{
                                $('.wheels.input-field').hide();
                                $('.wheels.input-field select').val('');
                            }
						}
					},
					complete : function(){
                        $('#select-chassis').removeClass('loading');
					}
				});
			}
		}
	});

	$('form').submit(function(){
		if($('input[name=title]').val() === ''){
			$('input[name=title]').val($('.dropdown.chassis .text .name').text().replace(/(\s\s.+)/, '').trim());
		}
	});

	$('#all_accessories, #all_paints').change(function(){
        // getDLCList('');
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
				'chassis' : $('[name=chassis]').val()
			},
			beforeSend : function(){
				$('#'+$(this).data('target')+' h5').append(getPreloaderHtml('tiny'));
			},
			success : function(response){
				if(response.status === 'OK'){
					$.each(response.result, function(key, data){
						if(key === target){
							$('#'+key).find('.ui.search').remove();
                            var select = $('<div class="ui search dropdown '+target+'">'+
                                '<input type="hidden" name="'+target+'">' +
                                '<div class="text"></div>' +
                                '<i class="dropdown icon right"></i>'+
                                '</div>');
							select.uidropdown({
                                values: data.echo,
								fullTextSearch : true,
								duration : 300,
								placeholder : false,
								forceSelection : false,
								onChange : function(value, text, $choice){
                                    getDLCList(value);
									showColors(value);
								}
							});
                            $('#'+key).show().find('label.for-select').after(select);
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
		if(newVal.length > 3){
			$(this).val(newVal.substr(0, 3));
		}else if(parseInt(newVal) > 300){
			$(this).val(newVal.substr(0, 2));
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

	$('.user-mods').collapsible({
        onOpenStart: function(mod){
            $.ajax({
                cache: false,
                dataType : 'json',
                type : 'POST',
                data : {
                    '_token' : $('input[name=_token]').val(),
                    'id' : $(mod).data('id'),
                },
                success : function(response){
                    if(response.result){
                        $(mod).find('.regenerate button[type=submit]').show()
                    }else{
                        $(mod).find('.regenerate button[type=submit]').show().attr('disabled', true)
                    }
                },
                beforeSend : function(){
                    $(mod).find('.regenerate').append(getPreloaderHtml('tiny'));
                },
                complete : function(){
                    $('.preloader-wrapper').remove();
                }
            });
        }
    });

	$('#check_all').click(function(){
		if($(this).data('check') === 0){
            $('.dlc').find('input[id^=dlc_]').prop('checked', true);
            $(this).data('check', 1);
		}else{
            $('.dlc').find('input[id^=dlc_]').prop('checked', false);
            $(this).data('check', 0);
		}

    });

	$('.nav-search input[type=search]').on('focus', function(){
        $('.nav-search').addClass('focused');
    });
	$('.nav-search input[type=search]').on('blur', function(){
        $('.nav-search').removeClass('focused');
    });

    $('#toggle-dark').click(function(){
        if(!$('body').hasClass('mdc-theme--dark')){
            $('body').addClass('mdc-theme--dark');
            setCookie('dark_theme', 'true', {
                expires : 3600 * 24 * 365,
                path : '/'
            });
            $(this).text('brightness_high');
        }else{
            $('body').removeClass('mdc-theme--dark');
            setCookie('dark_theme', 'false', {
                expires : -1
            });
            $(this).text('brightness_low');
        }
    });

    $(document).on('click', '.acc-add', function(){
        let index = parseInt($(this).data('current-index')) + 1;
        let trailerIndex = $(this).parents('.card').data('id');
        let template = $('#acc_template').html().replace(/%a_id%/g, index).replace(/%t_id%/g, trailerIndex);
        console.log(index);
        console.log(trailerIndex);
        $('#trailer-'+trailerIndex+' .accessories').append(template);
        $(this).data('current-index', index);
        $.each($('.mdc-text-field'), function(i, item){
            textFields[i] = new MDCTextField(item);
        });
    });

    $(document).on('click', '.acc-remove', function(){
        if(confirm('Видалити?')) $(this).parents('[id^=accessory-]').remove();
    });

    $(document).on('click', '.trailer-remove', function(){
        if(confirm('Видалити?')) $(this).parents('[id^=trailer-]').remove();
    });

    $(document).on('click', '#trailer-add', function(){
        let index = parseInt($(this).data('current-index')) + 1;
        let template = $('#trailer_template').html().replace(/%t_id%/g, index);
        $('.trailers').append(template);
        $(this).data('current-index', index);
        $.each($('.mdc-text-field'), function(i, item){
            textFields[i] = new MDCTextField(item);
        });
    });

    $(document).on('keyup', '.accessory-row input[id*=_def]', function(){
        let arr = $(this).val().split('/');
        if(arr[1] !== 'def' && arr[2] !== 'vehicle') return false;
        let targetRow = $(this).parents('.accessory-row');
        if(targetRow.find('input[id*=_name]').val() === '' && arr[arr.length - 2] !== undefined){
            targetRow.find('input[id*=_name]').val(arr[arr.length - 2]);
            targetRow.find('input[id*=_name] + div').addClass('mdc-notched-outline--notched')
                .find('label').addClass('mdc-floating-label--float-above');
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
            'chassis' : $('[name=chassis]').val(),
        },
		success : function(response){
            $('[id^=dlc_]').prop('checked', false).prop('disabled', false);
            $.each(response.dlc, function(index, dlc){
                $('#dlc_'+dlc).prop('checked', true).prop('disabled', true)
                    .after('<input type="hidden" name="'+$('#dlc_'+dlc).attr('name')+'" value="true">');
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