$(document).ready(function () {


    //eventos
    WEB.ELEMENTS.body.on('submit', '.crud_ajax', crud_ajax);
    WEB.ELEMENTS.body.on('delete_ajax', delete_ajax);
    WEB.ELEMENTS.body.on('click', '.open-modal', openModal);
    WEB.ELEMENTS.body.on('click', '.delete-modal', showDeleteModal);
    WEB.ELEMENTS.body.on('submit', '.delete-ajax', deleteAjax);


    function deleteAjax(event){
        event.preventDefault();

        let form = $(event.target);

        let options = {
            url: form.attr('action'), type: 'DELETE', dataType: 'json', headers: {'X-CSRF-TOKEN': form.find('input[name=_token]').val()},
            beforeSend: function () {
                //spinner(true);
            },
            success: function (response) {
                //spinner(false);
                if (response.success) {
                    form.find('.modal').modal('hide');

                    showToast(response.toast.type, response.toast.title, response.toast.message);

                    if(response.refresh_table || response.refresh_table == undefined) {
                        WEB.ELEMENTS.body.trigger('datatable.refresh');
                    }

                    if (response.reload_page){
                        location.reload();
                    }
                }
                else{
                    let json = JSON.parse(response.responseText);
                    showToast('error', 'Error!', json.error);
                }
            },
            error: function (response) {
                //spinner(false);
                switch (response.status) {
                    case 422:
                        showErrors(response);
                        break;

                    default:
                        let json = JSON.parse(response.responseText);
                        showToast('error', 'Error!', json.error);
                        break;
                }
            }
        };

        $.ajax(options);
    }


    function crud_ajax(event) {

        event.preventDefault();

        let form = $(event.currentTarget);
        let data = form.serialize();

        let options = {
            url: form.attr('action'), type: form.attr('method'), dataType: 'json',
            success: function (result) {

                if (result.success) {
                    $('button[data-dismiss="modal"]', form).trigger('click');


                    $('#modal-add').on('hidden.bs.modal', function () {
                        if(result.refresh_table) {
                            WEB.ELEMENTS.body.trigger('datatable.refresh');
                        }
                    })

                    if(result.reset_form){
                        form.trigger('reset');
                    }

                    showToast(result.toast.type, result.toast.title, result.toast.message);

                    if (result.reload_page){
                        location.reload();
                    }

                    if (result.redirect_to !== undefined){
                        location.href = result.redirect_to;
                    }

                }

            },
            error: function (result) {

                switch (result.status) {
                    case 422:
                        showErrors(result);
                        break;

                    default:
                        var json = JSON.parse(result.responseText);
                        showToast('error', 'Error!', json.error);
                        break;
                }
            }
        };

        if (form.data('files')) {
            data = new FormData(form[0]);
            options.contentType = false;
            options.processData = false;
            options.headers = {'X-CSRF-TOKEN': form.find('input[name=_token]').val()};
        }

        options.data = data;

        $.ajax(options);
    }

    function showErrors(respuesta) {
        let errores = JSON.parse(respuesta.responseText).errors;
        var _hmtl = '<ul>';
        $.each(errores, function (element, index) {
            $('div[data-feedback="' + element + '"]').addClass('has-error');
            $('p[data-feedback="' + element + '"]').addClass('has-error').text(index);
            _hmtl += '<li>'+index+'</li>';
        });
        _hmtl += '</ul>';
        $('#errors').append(_hmtl);
    }

    function delete_ajax(evento, csrf_token, url, modal) {
        evento.preventDefault();

        let options = {
            url: url,
            type: 'DELETE',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': csrf_token},
            success: function (respuesta) {
                if (respuesta.success) {
                    $('#modal-delete').modal('hide');
                    showToast(respuesta.toast.type, respuesta.toast.title, respuesta.toast.message);
                    WEB.ELEMENTS.body.trigger('datatable.refresh');
                } else {
                    showToast('error', 'Error!', 'Fatal Error');
                }
            },
            error: function (result) {
                switch (result.status) {
                    case 422:
                        showErrors(result);
                        break;

                    default:
                        var json = JSON.parse(result.responseText);
                        showToast('error', 'Error!', json.error);
                        break;
                }
            }
        };

        $.ajax(options);
    }

    /**
     *
     * @param event
     */
    function openModal(event) {
        event.preventDefault();

        let target = $(event.target), container = $('#modal-add');
        let url = target.attr('href') || target.data('url');

        if (url === undefined) target = $(event.currentTarget);

        url = target.attr('href') || target.data('url');

        $.ajax({
            url: url, dataType: 'html',
            beforeSend: function () {
                //spinner(true);
            },
            success: function (response) {
                //spinner(false);
                container.html(response);
                WEB.ELEMENTS.body.trigger('form.init');
                container.find('.modal').modal('show');
            },
            error: function (response) {
                let json = JSON.parse(response.responseText);
                //spinner(false);
                showToast('error', 'Error!', json.error);
            }
        })
    }

    /**
     *
     * @param event
     */
    function showDeleteModal(event) {
        event.preventDefault();

        let target = $(event.currentTarget);

        if (target.data('url') === undefined) target = $(event.currentTarget);

        if (target.data('confirmation-message') !== undefined){
            $('#form-delete').attr('action', target.data('url'));
            $('#confirmation-message').text(target.data('confirmation-message'));
            $('#delete-modal').modal('show');
        }
    }

});


function showToast(type, title, messaje) {
    toastr.options.closeButton = false;
    toastr.options.progressBar = true;
    toastr.options.debug = false;
    toastr.options.positionClass = 'toast-top-center';
    toastr.options.showDuration = 333;
    toastr.options.hideDuration = 333;
    toastr.options.timeOut = 3500;
    toastr.options.extendedTimeOut = 3500;
    toastr.options.showEasing = 'swing';
    toastr.options.hideEasing = 'swing';
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    eval("toastr."+type+"('"+messaje+"', '"+title+"')");
}
