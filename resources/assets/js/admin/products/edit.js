(function ($) {
    $('body.admin.products.edit .nav-tabs a[href="' + window.location.hash + '"]').tab('show');
    $('body.admin.products.edit .nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    });
})(jQuery);
