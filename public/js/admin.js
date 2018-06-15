function makeSerializable(elem) {
    return $(elem).prop('elements', $('*', elem).andSelf().get());
}
function AddCategory(){

	var form_name = '#AddCategory';

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    $.ajax({
        url: BASE_URL+'/admin/addcategory',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
        	console.log(response);
            if (response.code == 200){
            	 $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }else{
            	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
        	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });

}

function EditCategory(){
	var form_name = '#EditCategory';

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    $.ajax({
        url: BASE_URL+'/admin/addcategory',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
        	console.log(response);
            if (response.code == 200){
            	 $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
                setTimeout(function() {window.location.href = BASE_URL+'/admin/viewcategory';}, 5000);
            }else{
            	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
        	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });

}

function AddSubCategory(){

	var form_name = '#AddSubCategory';

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    $.ajax({
        url: BASE_URL+'/admin/addsubcategory',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
        	console.log(response);
            if (response.code == 200){
            	 $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }else{
            	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
        	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });

}

function EditSubCategory(){
	var form_name = '#EditSubCategory';

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    $.ajax({
        url: BASE_URL+'/admin/addsubcategory',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
        	console.log(response);
            if (response.code == 200){
            	 $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
                setTimeout(function() {window.location.href = BASE_URL+'/admin/viewsubcategory';}, 5000);
            }else{
            	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
        	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });

}

function AddProduct(){

	var form_name = '#AddProduct';

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    $.ajax({
        url: BASE_URL+'/admin/addproduct',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
        	console.log(response);
            if (response.code == 200){
                $('#mainPanel').hide();
            	$('#renderCode').html('');
                $('#renderCode').html(response.html);
                setTimeout(function() {window.location.href = BASE_URL+'/admin/viewproducts';}, 5000);
            }else{
            	$('#renderCode').html('');
				$('#renderCode').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+ response.message +'</strong></div>');
            }
        },
        error: function(){
        	$('#renderCode').html('');
			$('#renderCode').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });

}

function EditProduct(){
	var form_name = '#EditProduct';

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    $.ajax({
        url: BASE_URL+'/admin/saveproduct',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
		success: function(response){
        	console.log(response);
            if (response.code == 200){
                $('#mainPanel').show();
            	$('#renderCode').remove();
                $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
                setTimeout(function() {window.location.href = BASE_URL+'/admin/viewproducts';}, 5000);
            }else{
            	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
        	$('.message').html('');
			$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });

}

function SaveProduct(){

	var form_name = '#SaveProduct';

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    $.ajax({
        url: BASE_URL+'/admin/saveproduct',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
        	console.log(response);
            if (response.code == 200){
                $('#mainPanel').show();
            	$('#renderCode').remove();
                $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }else{
            	$('.message').html('');
				$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
        	$('.message').html('');
			$('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });

}

function uploadProfilePhoto(){
    var div_name = '.profile-image';
    var form_name = '#form-upload-profile-photo';
    $(form_name+' input').click();
    $(form_name+' input').change(function (){
        $(div_name+ ' .loading-image').show();
        $(div_name+ ' .change-image').hide();
        var data = new FormData();
        data.append('photo', JSON.stringify(makeSerializable(form_name).serializeJSON()));
        var file_inputs = document.querySelectorAll('.profile_photo_input');
        $(file_inputs).each(function(index, input) {
            data.append('image', input.files[0]);
        });
        $.ajax({
            url: BASE_URL+'/admin/upload/profile-photo',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function(response){
                if (response.code == 200){
                    $(div_name+ ' .image-profile').attr('src', response.image_thumb);
                    $(div_name+ ' .image-profile').parent().attr('href', response.image_big);
                    $(div_name+ ' .loading-image').hide();
                }else{
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html(response.message);
                    $(div_name+ ' .loading-image').hide();
                }
            },
            error: function(){
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
                $(div_name+ ' .loading-image').hide();
            }
        });
    });
}

function uploadLogo(){
    var div_name = '.logo-image';
    var form_name = '#form-upload-logo';
    $(form_name+' input').click();
    $(form_name+' input').change(function (){
        $(div_name+ ' .loading-logo').show();
        $(div_name+ ' .change-logo').hide();
        var data = new FormData();
        data.append('photo', JSON.stringify(makeSerializable(form_name).serializeJSON()));
        var file_inputs = document.querySelectorAll('.logo_input');
        $(file_inputs).each(function(index, input) {
            data.append('image', input.files[0]);
        });
        $.ajax({
            url: BASE_URL+'/admin/upload/logo',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function(response){
                if (response.code == 200){
                    $(div_name+ ' .image-logo').attr('src', response.image_thumb);
                    $(div_name+ ' .image-logo').parent().attr('href', response.image_big);
                    $(div_name+ ' .loading-logo').hide();
                }else{
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html(response.message);
                    $(div_name+ ' .loading-logo').hide();
                }
            },
            error: function(){
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
                $(div_name+ ' .loading-logo').hide();
            }
        });
    });
}

function uploadFooterLogo(){
    var div_name = '.footer-logo-image';
    var form_name = '#form-upload-footer-logo';
    $(form_name+' input').click();
    $(form_name+' input').change(function (){
        $(div_name+ ' .loading-logo').show();
        $(div_name+ ' .change-footer-logo').hide();
        var data = new FormData();
        data.append('photo', JSON.stringify(makeSerializable(form_name).serializeJSON()));
        var file_inputs = document.querySelectorAll('.footer_logo_input');
        $(file_inputs).each(function(index, input) {
            data.append('image', input.files[0]);
        });
        $.ajax({
            url: BASE_URL+'/admin/upload/footerlogo',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function(response){
                if (response.code == 200){
                    $(div_name+ ' .image-footer-logo').attr('src', response.image_thumb);
                    $(div_name+ ' .image-footer-logo').parent().attr('href', response.image_big);
                    $(div_name+ ' .loading-logo').hide();
                }else{
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html(response.message);
                    $(div_name+ ' .loading-logo').hide();
                }
            },
            error: function(){
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
                $(div_name+ ' .loading-logo').hide();
            }
        });
    });
}

function uploadFavicon(){
    var div_name = '.form-upload-favicon';
    var form_name = '#form-upload-favicon';
    $(form_name+' input').click();
    $(form_name+' input').change(function (){
        $(div_name+ ' .loading-logo').show();
        $(div_name+ ' .change-favicon').hide();
        var data = new FormData();
        data.append('photo', JSON.stringify(makeSerializable(form_name).serializeJSON()));
        var file_inputs = document.querySelectorAll('.favicon_input');
        $(file_inputs).each(function(index, input) {
            data.append('image', input.files[0]);
        });
        $.ajax({
            url: BASE_URL+'/admin/upload/favicon',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function(response){
                if (response.code == 200){
                    $(div_name+ ' .image-favicon').attr('src', response.image_thumb);
                    $(div_name+ ' .image-favicon').parent().attr('href', response.image_big);
                    $(div_name+ ' .loading-logo').hide();
                }else{
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html(response.message);
                    $(div_name+ ' .loading-logo').hide();
                }
            },
            error: function(){
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
                $(div_name+ ' .loading-logo').hide();
            }
        });
    });
}

function UpdateProfile(){
    //$('.loading-page').show();
    var form_name = '#UpdateProfile';
    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    $.ajax({
        url: BASE_URL+'/admin/profile/update',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            console.log(response);
            if (response.code == 200){
                $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }else{
                $('.message').html('');
                $('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
                $('.message').html('');
                $('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });
}

function UpdatePassword(){
    //$('.loading-page').show();
    var form_name = '#UpdatePassword';
    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    $.ajax({
        url: BASE_URL + '/admin/password/update',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            console.log(response);
            if (response.code == 200){
                 $('.message1').html('');
                $('.message1').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }else{
                $('.message1').html('');
                $('.message1').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
            $('.message1').html('');
                $('.message1').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });
}

function updateSiteSettings(){
    //$('.loading-page').show();
    var form_name = '#UpdateSettings';
    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    $.ajax({
        url: BASE_URL+'/admin/settings',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            console.log(response);
            if (response.code == 200){
                $('.message').html('');
                $('.message').html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }else{
                $('.message').html('');
                $('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>'+response.message+'</strong></div>');
            }
        },
        error: function(){
                $('.message').html('');
                $('.message').html('<div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>Something Went Wrong!</strong></div>');
        }
    });
}