/**
 * Application default scripts
 */

$(document).ready(function(){

    /**
     * Verify is the current action needs submit the next form
     */
    $('.action_destroy').on('click', function(e){
        e.preventDefault();
        $(this).parent().find('form').submit();
    });


    $('.action_remove_file').on('click', function(e){
        e.preventDefault();
        console.log('Deve excluir a imagem!');
        console.log($(this).data('id'));
        console.log($(this).data('file'));
    });

    $('.button_logout').on('click', function(e){
        e.preventDefault();
        $('.frm_logout').submit();
    });

    $('.action_reorder').on('blur', function(e){
        e.preventDefault();

        var _current = $(this);
        var _ac = $(this).data('action');
        var _id = $(this).data('id');
        var _or = $(this).val();

        $.ajax({
            data: { id:_id, ordem:_or },
            type: 'get',
            url:  _ac,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                _current.before('<img src="'+_img+'/loading.gif'+'" style="width: 40px;" />');
                _current.hide();
            },
            success: function(data_returned) {
                _current.parent().find('img').remove();
                _current.show();
            },
            error: function() {
                console.log('Erro');
            },
        });
    })

    $('table:not(.custom)').DataTable({
        responsive: true,
        aaSorting: [],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        }
    });

});