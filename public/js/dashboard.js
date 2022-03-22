

var select   = $(`<select name="dish_id" id="" class="dish_id enum-fillable col-4 mx-2 d-inline"></select>`),
    option   = $('<option value=""></option>'),
    span     = $('<span></span>'),
    input    = $('<input type="text">'),
    removeDishIcon = $('<i class="fa-solid fa-circle-xmark remove-dish col-1"></i>');

    removeDishIcon.on('click', function() {
        $(this).parent().parent().remove();
    });


function getDishInstance() {

    let dishInstance = select.clone(true);
    
    dishes.forEach( dish => {
        dishInstance.append(
            option.clone().attr('value', dish['id']).text(dish['name'])
        );
    });

    dishInstance = $(
        '<div class="dish_info border rounded p-3 row justify-content-around align-items-center"></div>').append(
        '<input type="text" name="dish_count" class="dish_count fillable col-3" placeholder="Count" required></input>',
        dishInstance,
        span.clone().addClass('dish_total_price col-3').text('$0'),
        removeDishIcon.clone(true, true));

    return $('<div class="dish col-5 mb-3"></div>').append(dishInstance);
}

function copyAttributesFromTo(from, to)
{
    return to.attr({
        class: from.attr('class'),
        name: from.attr('name'),
        placeholder: from.attr('placeholder'),
    });
}

function copyAttributesFromTagToInput(tag, input) {
    return copyAttributesFromTo(tag, input).attr('value', tag.text());
}
function copyAttributesFromInputToTag(input, tag) {
    return copyAttributesFromTo(input, tag).text(input.val());
}

function copyAttributesFromTagToSelect(tag, select, selectedOptionValue) {

    copyAttributesFromTo(tag, select)
            .children(`option[value="${selectedOptionValue}"]`)
            .attr('selected', 'selected');
    return select;
    
}



function convertManyTo(many, to) {
    many.each(function () {
        $(this).replaceWith( copyAttributesFromTo($(this), to.clone()) );
    });
}


function convertTagsToInputs(tags, input) {
    tags.each(function () {
        $(this).replaceWith( copyAttributesFromTagToInput($(this), input.clone()) );
    });
}

function convertInputsToTag(inputs, tag) {
    inputs.each(function () {
        $(this).replaceWith( copyAttributesFromInputToTag($(this), tag.clone()) );
    });
}



$('.other-info-arrow').click(function () {
    $(this).children('i').toggleClass('other-info-arrow-down');
    $(this).parent().next('.other-info').slideToggle();
});


$('.update-btn').click(function (e)
{
    var orderListTag    = $(this).parents('li'), 
        fillables       = orderListTag.find('.fillable'),
        enumFillables   = orderListTag.find('.enum-fillable'),
        dataToSend      = {},
        dishDeleteBtns  = orderListTag.find('.dish .remove-dish');
        
        dataToSend['dishes'] = {};
        dataToSend['_token'] = $('meta[name="csrf_token"]').attr('content');

        orderListTag.find('.add_dish_btn_container').removeClass('d-none'),
        convertTagsToInputs(fillables, input);
        
    let = dishIdSelectTag = select.clone();

    dishes.forEach(dish => dishIdSelectTag.append(
        option.clone().attr('value', dish['id']).text(dish['name'])
    ));

    enumFillables.each(function () {
        $(this).replaceWith(
            copyAttributesFromTagToSelect($(this), dishIdSelectTag.clone(), $(this).attr('value'))
        );
    });

    dishDeleteBtns.removeClass('d-none');
    
    $('.dish .remove-dish').click(function () {
        $(this).parent().parent().remove();
    });


    $('.save-btn').one('click', function () {

        dataToSend['order_id'] = orderListTag.attr('id');
        dataToSend['table_id'] = orderListTag.find('input[name="table_id"]').val();
        dataToSend['customer_count'] = orderListTag.find('> .other-info div.row input[name="customer_count"]').val();
        
        orderListTag.find('div.dishes div.dish').each( function ()
        {
            dataToSend['dishes'][ $(this).find('select').val() ] = { // setting the dish_id as a key
                dish_count: $(this).find('input[name="dish_count"]').val() // setting the dish count as in array: [dish_count: number]
            };
        });
        
        dataToSend['_method'] = 'PUT';

        console.log(dataToSend);

        $.ajax({
            url: 'http://localhost/restaurant/public/orders/' + dataToSend['order_id'],
            method: 'post',
            data: dataToSend,
            
            success: (res) => console.log(res),
            error: (res) => console.log(res),
        });
    });

    $('.save-btn,.cancel-btn').one('click', function (e)
    {
        dishDeleteBtns.addClass('d-none');
        orderListTag.find('.add_dish_btn_container').addClass('d-none');

        convertInputsToTag(orderListTag.find('.fillable'), span);
        orderListTag.find('.enum-fillable').each(function ()
        {
            let newSpan = span.clone(),
                selectDishName = $(this).find(' :selected').text();

            newSpan.attr({ selected: 'selected', value: $(this).val() }).text(selectDishName);
            $(this).replaceWith(copyAttributesFromTo($(this), newSpan));
            // copyAttributesFromTagToSelect($(this), dishIdSelectTag.clone(), $(this).attr('value'))
        });

    });
    
});









$('.order_actions button').click(function (e) {
    e.preventDefault();
    $(this).parent().parent().children().toggleClass('d-none');
});



$('.new-order-btn').click(function () {
    let orderForm = $('.order-form-instance').clone(true);
        orderForm.removeClass('order-form-instance');

    $(this).parent().after(orderForm);
    orderForm.removeClass('d-none');
});



$('.add_dish').click(function (e)
{
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

    dishes.each(function (index, element) {
        dataToSend['dishes'][index] = {
            dish_id: $(this).find('select[name="dish_id"]').val(),
            dish_count: $(this).find('input[name="dish_count"]').val()
        };
    });

    dataToSend['_token'] = $('meta[name="csrf_token"]').attr('content');

    $.ajax({

        url: 'http://localhost/restaurant/public/orders',
        method: 'post',
        data: dataToSend,

        success: (res) => {

            console.log(res);
            form.find('.add_dish_btn_container').addClass('d-none');

            let fillables       = $(this).children().find('.fillable'),
                enumFillables   = $(this).children().find('.enum-fillable');
    
            convertInputsToTag(fillables, span);
            enumFillables.each(function () {

                let newSpan = span.clone(),
                    selectDishName = $(this).find(' :selected').text();        
        
                $(this).replaceWith(copyAttributesFromInputToTag($(this), newSpan));
                newSpan.text(selectDishName);

                
            });

            let createBtnform = form.find('.create_btn_container');
                createBtnform.toggleClass('d-none');
                createBtnform.nextAll().toggleClass('d-none');

            $(this).parents('li').attr('id', res['order_id']);
        },

        error: (err) => {
            console.log(err);
            if (form.children('.error-message').length == 0) {
                form.prepend('<p class="error-message">Your Inputs Are Not Valid ! </p>');
            }
        }
    });
});

// deleting

$('.delete-btn').click(function () {
    let orderList = $(this).parents('li');
    $.ajax({
        url: 'http://localhost/restaurant/public/orders/' + orderList.attr('id'),
        method: 'post',
        data: {
            _token: $('meta[name="csrf_token"]').attr('content'),
            _method: 'DELETE'
        },
        
        success: (res) => {
            $(this).parents('li').remove();
            console.log(res);
        },
        error: (res) => console.log(res)
    });
});