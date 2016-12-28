(function ($) {
    $('body.admin.products.index .form-delete-product').submit(function () {
        return confirm($(this).attr('data-confirm-message'));
    });
})(jQuery);
