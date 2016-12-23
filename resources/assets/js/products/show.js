(function ($) {
    $('body.products.show #select-variant').change(function () {
        $("option:selected", this).each(function () {
            $('body.products.show .price > .value').text($(this).attr('data-price'));
        });
    });
})(jQuery);
