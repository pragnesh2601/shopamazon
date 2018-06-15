$(document).ready(function() {
    getCart();
})
setInterval(function(){
    getCart();
},20000);

/*$('body').on('click', function (e) {
    if (!$('li.dropdown div.dropdown-menu').is(e.target) 
        && $('li.dropdown div.dropdown-menu').has(e.target).length === 0 
        && $('.open').has(e.target).length === 0
    ) {
        $('li.dropdown.mega-dropdown').removeClass('open');
    }
});*/

$('li.dropdown.dropdown-menu').on('click', function (event) {
    $(this).parent().toggleClass('open');
});


function addToCart(id,qty,byAsin) {
    console.log(id,qty,byAsin);
    $.ajax({
        url: BASE_URL + '/cart/addtocart',
        type: 'POST',
        data: { id: id, qty : qty, byAsin : byAsin} ,
        timeout: 5000,
        cache: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        /*beforeSend: function() { $('#wait').show(); },
        complete: function() { $('#wait').hide(); }*/
        success: function (response) {
            if(response.code == 200){
                $('#cartPartial').html(response.html);
                $('#cartpagePartial').html(response.html);
                $('#cartCount').html(response.cartCount);
                $(".dropdown-toggle").dropdown('toggle');
            setTimeout(function(){
                $(".dropdown-toggle").dropdown('toggle');
            }, 10000);
            }else{
                $location.reload();
            }
        },
        error: function () {
           $location.reload();
        }
    });
}

function getCart() {
    
    var url = BASE_URL + '/cart/getcart/'
    $('#cartPartial').load(url);
    $('#cartpagePartial').load(url);
}

function ItemDelete(id, qty) {
    console.log(id,qty);
    $.ajax({
        url: BASE_URL + '/cart/deleteitem',
        type: 'POST',
        data: {id:id, qty:qty},
        timeout: 5000,
        cache: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if(response.code == 200){
                $('#cartPartial').html(response.html);
                $('#cartpagePartial').html(response.html);
                $('#cartCount').html(response.cartCount);
                
            }else{
                $location.reload();
            }

        },
        error: function () {
            $location.reload();
        }
    });
}

$('li.nav-item.dropdown div.dropdown-menu').on('click', function (event) {
    $('li.nav-item.dropdown').toggleClass('show');
    $(this).parent().toggleClass('show');
});

$('body').on('click', function (e) {
    if (!$('li.nav-item.dropdown').is(e.target) 
        && $('li.nav-item.dropdown').has(e.target).length === 0 
        && $('.show').has(e.target).length === 0
    ) {
        $('li.nav-item.dropdown div.dropdown-menu').removeClass('show');
    }
});