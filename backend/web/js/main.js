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
    swal({
        title: '<span class="font-weight-bold">هل أنـت متأكـد ؟</span>',
        text: "لا يمكن الرجوع بالتغييرات بعد التنفيذ !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'حذف',
        confirmButtonClass: 'font-weight-bold btn-info',
        cancelButtonClass: 'font-weight-bold',
        cancelButtonText: 'إلغاء',
        padding: '20'
    }).then(function () {
        console.log(url);
        $.ajax({
            'url': url,
            'type': 'POST',
            'success': function (response) {
                if (response) {
                    swal({
                        title: '<span class="font-weight-bold mb-5">تمت عملية الحـذف!</span>',
                        type: 'success',
                        padding: '20',
                        confirmButtonText: 'موافق',
                        confirmButtonClass: 'font-weight-bold mt-2',
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    swal({
                        title: '<span class="font-weight-bold mb-5">خطأ ما حدث !</span>',
                        type: 'error',
                        padding: '20',
                        confirmButtonText: 'موافق',
                        confirmButtonClass: 'font-weight-bold mt-2',
                    })
                }
            }
        });
    })
});