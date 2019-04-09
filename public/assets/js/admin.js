$(document).ready(function(){

    $('.edit-chassis').click(function(){
        var id = $(this).data('chassis-id');
        // console.log($('meta[name=csrf-token]').attr('content'));
        $.ajax({
            cache: false,
            dataType : 'json',
            type : 'POST',
            url: '/admin/trailers/edit/'+id,
            data : {
                '_token' : $('meta[name=csrf-token]').attr('content'),
                'id' : id
            },
            beforeSend : function(){
                // $('.edit-chassis').append(getPreloaderHtml('tiny'));
            },
            success : function(response){
                if(response.status === 'OK'){
                    console.log(response.result.chassis.game);
                    $('.mdc-dialog__content h3').text('Редагувати шасі');
                    $('#game_'+response.result.chassis.game).prop('checked', true);
                    $('input#def').val(response.result.chassis.def)
                        .next('.mdc-notched-outline').addClass('mdc-notched-outline--notched')
                        .find('label').addClass('mdc-floating-label--float-above');
                    $('input#alias').val(response.result.chassis.alias)
                        .next('.mdc-notched-outline').addClass('mdc-notched-outline--notched')
                        .find('label').addClass('mdc-floating-label--float-above');
                    $('input#alias_short').val(response.result.chassis.alias_short)
                        .next('.mdc-notched-outline').addClass('mdc-notched-outline--notched')
                        .find('label').addClass('mdc-floating-label--float-above');
                    $('input#alias_short_paint').val(response.result.chassis.alias_short_paint)
                        .next('.mdc-notched-outline').addClass('mdc-notched-outline--notched')
                        .find('label').addClass('mdc-floating-label--float-above');
                    $('input#axles').val(response.result.chassis.axles)
                        .next('.mdc-notched-outline').addClass('mdc-notched-outline--notched')
                        .find('label').addClass('mdc-floating-label--float-above');
                    $('input#default_paint_job').val(response.result.chassis.default_paint_job)
                        .next('.mdc-notched-outline').addClass('mdc-notched-outline--notched')
                        .find('label').addClass('mdc-floating-label--float-above');
                }
            },
            complete : function(){
                // $('.preloader-wrapper').remove();
            }
        });
    });

});