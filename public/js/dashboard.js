$('.other-info-arrow').click(function () {
    $(this).children('i').toggleClass('other-info-arrow-down');
    $(this).parent().next('.other-info').slideToggle();
});

var select   = $("<select name='' class='py-1'></select>"),
    option   = $('<option value=""></option>'),
    span     = $('<span></span>'),
    input    = $('<input type="text">');

function copyAttributesFromTo(from, to)
{
    to.attr({
        class: from.attr('class'),
        name: from.attr('name'),
        value: from.text(),
        placeholder: from.attr('placeholder')
    });
    to.text(from.text());
    return to;
}

function convertManyTo(many, to) {
    many.each(function () {
        $(this).replaceWith( copyAttributesFromTo($(this), to.clone()) );
    });
}

$('.update-btn').click(function ()
{
    let orderListTag    = $(this).parentsUntil('li'), 

        fillables       = orderListTag.find('.fillable'),
        enumFillables   = orderListTag.find('.enum-fillable'),
        orderBtns       = $(this).parent().children(),
        saveBtn         = $(this).next('.save-btn');

    convertManyTo(fillables, input);

    enumFillables = enumFillables.replaceWith(copyAttributesFromTo(enumFillables, select.clone()));
    orderBtns.toggleClass('d-none');

    $(this).nextAll('.save-btn, .cancel-btn').one('click',function ()
    {
        convertManyTo(orderListTag.find('.fillable'), span);

        enumFillables.replaceWith(copyAttributesFromTo(enumFillables, span.clone()));
        orderBtns.toggleClass('d-none');
    });

    // saveBtn.one('click',function ()
    // {
        // convertManyTo(orderListTag.find('.fillable'), span);
        // enumFillables.replaceWith(copyAttributesFromTo(enumFillables, select));

        // orderBtns.toggleClass('d-none');
    // });

});

$('.delete-btn').click(function () {
    $(this).parents('li').remove();
});

$('.new-order-btn').click(function () {
    let orderFrom = $('.order-form-instance');
    $(this).parent().after(orderFrom);
    orderFrom.removeClass('d-none');
});