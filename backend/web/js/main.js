$("#document").ready(function () {
    App.init();
    $("[data-main-id='" + main_list_id + "']").addClass('show');
    $("[data-href-id='" + main_list_id + "']").attr("data-active", true);
    $("[data-sub-id='" + sub_list_id + "']").addClass('active');
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

$("body").on('click', '.delete-icon', function () {
    let li = $(this).closest('li');
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
        li.remove();
    });
});

$('.img-preview').on('click', function () {
    let imgSrc = $(this).attr('src');
    swal({
        imageUrl: imgSrc,
        animation: false,
        padding: '20',
        height: 500,
        width: 1500,
        confirmButtonText: 'موافق',
        confirmButtonClass: 'font-weight-bold btn-info',
    })
});