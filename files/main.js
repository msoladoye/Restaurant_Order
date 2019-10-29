$(document).ready(function () {
    // console.log(document.cookie);
    $("body").show();
    $('#header').height($(window).height() / 1.5);
    isCartAvailable();
    $('#cartBtn').click(function () {
        getCart();
    });
    $('#requestOrderBtn').click(function () {
        getReceipt();
    });

    function getCart() {
        $.ajax({
            url: 'files/cart.php',
            data: {
                type: 3
            },
            success: function (data, status, xhq) {

                $('#cartBody').html(data);
                $('#cartModal').modal();
                $('#cartBody input').change(function () {
                    // console.log($.trim($(this).val()));
                    onChangedQuantity($(this).val(), $.trim($(this).attr('id')), $('#totalRow').text());
                });
                $('#cartBody tr span').click(function () {
                    cancelFromCart($(this).attr('id'), $('#totalRow').text());
                    $($.trim('#' + $(this).attr('id') + '')).show()
                    $($.trim('#' + $(this).attr('id') + 'remove')).hide();

                });
                $('#proceedBtn').click(function () {
                    getReceipt();
                });
            },
            dataType: 'text'
        });
    }
    $('#goToCart').click(function () {
        getCart();
    });
    $('#placeOrderBtn').click(function () {
        console.log("order has been sent!");
    });
    function getReceipt() {
        $.ajax({
            url: 'files/cart.php',
            data: {
                type: 6
            },
            success: function (data, status, xhq) {
                $('#receiptModal').modal();
                $('#receiptRun').html(data);
            },
            dataType: 'text'
        });
    }
    $('#clearModal').click(function () {
        $.ajax({
            url: 'files/cart.php',
            data: {
                type: 5
            },
            success: function (data, status, xhq) {
                isCartAvailable();
                $('.caption .addBtn').show();
                $('.caption .removeBtn').hide();
                $('#cartBody').html(data);
            },
            dataType: 'text'
        });
    });
    function cancelFromCart(ID, currentTotal) {
        // console.log(ID);
        $('#row' + ID).remove();
        $.ajax({
            url: 'files/cart.php',
            data: {
                id: ID,
                type: 4,
                currentTotal: currentTotal
            },
            success: function (data, status, xhq) {
                isCartAvailable();
                $('#totalRow').html(data);
            },
            dataType: 'text'
        });
    }
    function onChangedQuantity(value, ID, currentTotal) {
        $.ajax({
            url: 'files/cart.php',
            data: {
                id: ID,
                type: 2,
                value: value,
                currentTotal: currentTotal
            },
            success: function (data, status, xhq) {
                $('#totalRow').html(data);
            },
            dataType: 'text'
        });
    }
    // var allImages = $('')
    // function slideFunction() {
    //     // for()
    // }
    // setInterval(slideFunction, '2000');

    $('.row button').click(function () {
        if ($.trim($(this).text()) == $.trim("remove from cart")) {
            var ID = $.trim($(this).attr('value'));
            $($.trim('#' + ID + '')).show()
            $(this).hide();
            removeFromCart(ID, 0);
            // isCartAvailable();
        } else {
            var ID = $.trim($(this).attr('id'));
            $($.trim('#' + ID + 'remove')).show();
            $(this).hide();
            addToCart(ID, 1);
            // isCartAvailable();

        }
    });
    function isCartAvailable() {
        var allCookie = decodeURIComponent(document.cookie);
        var cookieCount = allCookie.split(';');
        // console.log(cookieCount);
        var count;
        cookieCount == "" ? count = 0 : count = cookieCount.length;
        var spanVal = $('.row span').text();
        if (count >= 1) {
            $('#cartBtn').css("color", "red");
            $('#cartBtn .badge').text(count).css("background-color", "red");
        } else {
            $('#cartBtn').css("color", "white");
            $('#cartBtn .badge').text("");
        }
    }
    function addToCart(itemID, type) {
        $.ajax({
            url: 'files/cart.php',
            data: {
                id: itemID,
                type: type
            },
            success: function (data, status, xhq) {
                $('#' + itemID + ' span').text(data);
                isCartAvailable();
            },
            dataType: 'text'
        });
    }

    function removeFromCart(itemID, type) {
        $.ajax({
            url: 'files/cart.php',
            data: {
                id: itemID,
                type: type
            },
            success: function (data, status, xhq) {
                $('#' + itemID + ' span').text(data);
                isCartAvailable();
            },
            dataType: 'text'
        });
    }
});