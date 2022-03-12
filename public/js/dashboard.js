

var select   = $(`<select name="dish_id" id="" class="dish_id enum-fillable col-4 mx-2 p-1 d-inline"></select>`),
    option   = $('<option value=""></option>'),
    span     = $('<span></span>'),
    input    = $('<input type="text">'),
    removeDishIcon = $('<i class="fa-solid fa-circle-xmark remove-dish"></i>');
    removeDishIcon.on('click', function () {
        $(this).parent().parent().remove();
    });


function getDishInstance() {

    let dishInstance = select.clone(true);
    
    for(let i = 0; i < dishes.length; i++) {
        dishInstance.append(
            option.clone().attr('value', dishes[i]['id']).text(dishes[i]['name'])
        );
    }

    dishInstance = $('<div class="dish_info d-inline"></div>').append(
        '<input type="text" name="dish_count" class="dish_count fillable col-4" placeholder="Count" required></input>',
        dishInstance, removeDishIcon.clone(true, true));

    return $('<div class="dish border rounded p-3 col-4 m-2"></div>').append(dishInstance);
}

function copyAttributesFromTo(from, to)
{
    to.attr({
        class: from.attr('class'),
        name: from.attr('name'),
        value: from.text(),
        placeholder: from.attr('placeholder')
    });
    to.text(from.val());
    return to;
}

function convertManyTo(many, to) {
    many.each(function () {
        $(this).replaceWith( copyAttributesFromTo($(this), to.clone()) );
    });
}













$('.other-info-arrow').click(function () {
    $(this).children('i').toggleClass('other-info-arrow-down');
    $(this).parent().next('.other-info').slideToggle();
});












$('.update-btn').click(function (e)
{
    e.preventDefault();

    let orderListTag    = $(this).parentsUntil('li'), 
        fillables       = orderListTag.find('.fillable'),
        enumFillables   = orderListTag.find('.enum-fillable');
    
    orderListTag.find('.add_dish_btn_container').removeClass('d-none'),
    convertManyTo(fillables, input);

    dishIdSelectTag = copyAttributesFromTo(enumFillables, select.clone());
    
    for(i= 0; i< dishes.length; i++) {

        dishIdSelectTag.append(
            option.clone().attr('value', dishes[i]['id']).text(dishes[i]['name'])
        );

    }
    enumFillables = enumFillables.replaceWith(dishIdSelectTag);
});









$('.order_actions button').click(function () {
    // $(this).parent().parent().
    $(this).parent().parent().children().toggleClass('d-none');
});











$('.save-btn,.cancel-btn').click(function (e)
{
    e.preventDefault();

    let orderListTag    = $(this).parentsUntil('li'), 
        fillables       = orderListTag.find('.fillable'),
        enumFillables   = orderListTag.find('.enum-fillable');

    orderListTag.find('.add_dish_btn_container').addClass('d-none');

    convertManyTo(fillables, span);
    enumFillables.each(function ()
    {
        let newSpan = span.clone(),
            selectDishName = $(this).find(' :selected').text();        

        $(this).replaceWith(copyAttributesFromTo($(this), newSpan));
        newSpan.text(selectDishName);
    });

});

// $('.save-btn').click(function () {

// });











$('.new-order-btn').click(function () {
    let orderForm = $('.order-form-instance').clone(true);
        orderForm.removeClass('order-form-instance');

    $(this).parent().after(orderForm);
    orderForm.removeClass('d-none');
});












$('.add_dish').click(function (e)
{
    e.preventDefault();
    let dishesInfo = $(this).parent().parent().next('.dishes-info'),
        dishes = dishesInfo.find('.dishes');
        dishes.append(getDishInstance());
});









$('form').submit(function (e) {
    
    e.preventDefault();
    
    var form = $(this),
        dataToSend = {},
        dishes = $(this).find('.dishes').children('.dish');

    dataToSend['customer_count'] = $(this).find('input[name="customer_count"]').val(),
    dataToSend['table_id'] = $(this).find('input[name="table_id"]').val(),
    dataToSend['dishes'] = {};

    if (dishes.length == 0) {
        if (form.children('.error-message').length == 0) {
            form.prepend('<p class="error-message">Your Inputs Are Not Valid ! </p>');
        }
        return false;
    }
    form.find('.add_dish_btn_container').addClass('d-none');


    dishes.each(function (index, element) {
        dataToSend['dishes'][
            $(this).find('select[name="dish_id"]').val()]
            = $(this).find('input[name="dish_count"]').val();
    });

    dataToSend['_token'] = $('meta[name="csrf_token"]').attr('content');

    $.ajax({

        url: 'http://localhost/restaurant/public/orders',
        method: 'post',
        data: dataToSend,

        success: (res) => {

            let fillables       = $(this).children().find('.fillable'),
                enumFillables   = $(this).children().find('.enum-fillable');
    
            convertManyTo(fillables, span);
            enumFillables.each(function () {

                let newSpan = span.clone(),
                    selectDishName = $(this).find(' :selected').text();        
        
                $(this).replaceWith(copyAttributesFromTo($(this), newSpan));
                newSpan.text(selectDishName);
            });

            let createBtnform = form.find('.create_btn_container');
                createBtnform.toggleClass('d-none');
                createBtnform.nextAll().toggleClass('d-none');

            console.log(dataToSend, res);
        },

        // error: (err) => console.log(err)
    });
});

// deleting

$('.dish .remove-dish').click(function () {
    $(this).parent().parent().remove();
});

$('.delete-btn').click(function () {
    $(this).parents('li').remove();
});