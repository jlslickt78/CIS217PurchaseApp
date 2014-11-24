/**
 * Created by Jeff Tartt on 11/9/14.
 */
var cart = [];
$(document).ready(function () {

    //display cart
    function displayCart() {
        var cartDisplay = $(".cartDisplay");
        cartDisplay.html("");

        var grandTotal = 0;
        for (var item in cart) {
            var qty = cart[item].qty;
            var price = cart[item].price;
            var subtotal = qty * price;
            grandTotal += subtotal;
            cartDisplay.append('<p>' + qty + ':' + cart[item].name
                + ' $' + price.toFixed(2)
                + ' = $' + subtotal.toFixed(2) + '</p>');

        }
        cartDisplay.append('<p>Total: $' + grandTotal.toFixed(2) + '</p>')
    }

    //End display cart

    //products
    //add to cart
    var addToCart = $(".addToCart");
    $(addToCart).on("click", function () {
        var product_id = $(this).parent().data("product");
        var product_name = $(this).parent().data("name");
        var product_price = $(this).parent().data("price");
        var itemAdded = $(".itemAdded");
        itemAdded.html("");
        var added = itemAdded.html("item has been added").fadeIn("fast").fadeOut("fast");

        if (cart[product_id]) {
            cart[product_id].qty += 1;
            added;
        } else {
            cart[product_id] = new Object();
            cart[product_id].qty = 1;
            cart[product_id].product_id = product_id;
            cart[product_id].name = product_name;
            cart[product_id].price = product_price;
        }

        displayCart();
        //update panels
        $("#ToppingsPanel").trigger("update");
        $("#CrustPanel").trigger("update");
        $("#DrinksPanel").trigger("update");
        $("#CurrOrderPanel").trigger("update");
    });
    //End products

    $(".order-purchased").hide();
    var request;
    $("#orderForm").submit(function (event) {
        // abort any pending request
        if (request) {
            request.abort();
        }

        var cartProcess = "";
        for (var item in cart) {
            var id = item;
            var qty = cart[item].qty;
            var product_name = cart[item].name;
            var price = cart[item].price;

            //cartProcess += "&qty=" + cart[item].qty + "&name=" + cart[item].name + "&price=" + cart[item].price;
            cartProcess += "&id[]=" + id + "&qty[]=" + qty + "&product_name[]=" + product_name + "&price[]=" + price;
            console.log(cartProcess);

        }
        var form = $(this);
        // let's select and cache all the fields
        var inputs = form.find("input");
        var serializeData = form.serialize();

        request = $.ajax({
            type: 'post',
            url: 'purchase.php',
            data: serializeData + cartProcess
            //dataType: 'json'
        });

        // callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            // log a message to the console
            console.log("Hooray, it worked!");
            $(".order-purchased").show();
            $("#confirmOrderBtn").hide();
            setTimeout(function () {
                window.location = "index.php";
            }, 4000);

        });

        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // log the error to the console
            console.error(
                "The following error occured: " +
                    textStatus, errorThrown
            );
        });

        event.preventDefault();

    });

    //save order
    $('#saveOrder').on("click", function (event) {
        var itemSaved = $(".itemSaved");
        itemSaved.html("");
        var saved = itemSaved.html("item has been added").fadeIn("slow").fadeOut("slow");

        var cartStr = "[";
        for (var item in cart) {
            cartStr += JSON.stringify(cart[item]) + ",";
        }
        cartStr = cartStr.slice(0, -1);
        cartStr += "]";
        localStorage['cart'] = cartStr;
        saved;
    });

    //load order
    $("#FavOrderPanel").on("click", function () {
        cart = [];
        var obj = JSON.parse(localStorage['cart']);
        for (var item in obj) {
            product_id = obj[item].product_id;
            cart[product_id] = obj[item];
        }
        displayCart();
    });
    //End purchase products

    /*gives long and lat coordinates back*/
    navigator.geolocation.getCurrentPosition(function (position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;

        var location = '<a class="ui-btn ui-btn-corner-all" href="http://maps.google.com/maps?daddr=1603+N+Altamont+St,+Spokane,+WA+99207&saddr=' + lat + "," + lng + '">Get directions</a>';
        var map = '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ' +
            'src="https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=' + lat + ',' + lng + '&amp;daddr=1603+N+Altamont+St,+Spokane,+WA&amp;hl=en&amp;geocode=FS9s1wIdmDYB-SF2zBtwW8b6yylnwP9oSh-eVDF2zBtwW8b6yw%3BFStu1wIdXP0A-SmNuVTLyRieVDGn24GBbenhqQ&amp;aq=0&amp;oq=1603&amp;sll=37.424915,-122.072205&amp;sspn=0.088066,0.209255&amp;t=h&amp;mra=ls&amp;ie=UTF8&amp;ll=47.675912,-117.369287&amp;spn=0.006078,0.01196&amp;output=embed"></iframe>' +
            '<br /><small><a href="https://maps.google.com/maps?f=d&amp;source=embed&amp;saddr=' + lat + ',' + lng + '&amp;daddr=1603+N+Altamont+St,+Spokane,+WA&amp;hl=en&amp;geocode=FS9s1wIdmDYB-SF2zBtwW8b6yylnwP9oSh-eVDF2zBtwW8b6yw%3BFStu1wIdXP0A-SmNuVTLyRieVDGn24GBbenhqQ&amp;aq=0&amp;oq=1603&amp;sll=37.424915,-122.072205&amp;sspn=0.088066,0.209255&amp;t=h&amp;mra=ls&amp;ie=UTF8&amp;ll=47.675912,-117.369287&amp;spn=0.006078,0.01196" style="color:#0000FF;text-align:left">View Larger Map</a></small>';
        // <iframe src="https://www.google.com/maps/embed?pb=!1m29!1m12!1m3!1d5372.92715988595!2d-117.37308150939835!3d47.67541633159824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m14!1i0!3e6!4m5!1s0x549e1f4a68ffc067%3A0xcbfac65b701bcc76!2sSpokane+Community+College%2C+1810+N+Greene+St%2C+Spokane%2C+WA+99217!3m2!1d47.672367!2d-117.36099999999999!4m5!1s0x549e18c9cb54b98d%3A0xa9e1e96d8181dba7!2s1603+N+Altamont+St%2C+Spokane%2C+WA+99207!3m2!1d47.672875!2d-117.37565199999999!5e0!3m2!1sen!2sus!4v1416257092618" width="400" height="300" frameborder="0" style="border:0"></iframe>

        /*my location*/
        // 1603+N+Altamont+St,+Spokane,+WA+99207
        /*https://www.google.com/maps/dir//1603+N+Altamont+St,+Spokane,+WA+99207/@47.6728821,-117.3802654,16z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x549e18c9cb54b98d:0xa9e1e96d8181dba7!2m2!1d-117.375652!2d47.672875*/
        //$("#currentLocation").html(location);
        $("#map").html(map);
    });

});




