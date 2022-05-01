$("#document").ready(function () {
    App.init();
});

$('[data-modal]').on('click', function () {
    let modal = $(this).data('modal');
    let modalLabel = $(this).data('label');
    $(".modal-title").html(`<b>${modalLabel}</b>`);
    $(`#${modal}`).modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
});

$('[data-role="delete"]').on('click', function () {
    let url = $(this).data('url');
    $.ajax({
        'url': url,
        'type': 'POST',
    });
});