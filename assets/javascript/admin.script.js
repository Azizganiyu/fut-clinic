//NAVIGATION

//open and close sidenav
function openSideNav()
{
    if($('.sidebar').css('left') == '-250px')
    {
        $('.sidebar').animate({
            'left' : '0px'
        }, 500);

        if($(window).width() > "576")
        {
            $('body').animate({
                'margin-left' : '250px'
            }, 500);
        }
    }
    else
    {
        $('.sidebar').animate({
            'left' : '-250px'
        }, 500);

        if($(window).width() > "576")
        {
            $('body').animate({
                'margin-left' : '0px'
            }, 500);
        }
    }
    
}

//Routing links
$('li.navlink').on('click', function(){
    link = $(this).attr('route');
    window.location.assign(link);
})

//CATEGORY

//function to read selected image for upload
function readURL(input){
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.temp_image').attr('src', e.target.result); //set temp src for image while uploading
            $('.temp_image').attr('alt', input.files[0].name); //set temp alt for image while uploading
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//prepend new Dom's image container to show upload progress and upload new media via ajax when a media is selected
$('#userfile').change(function(){
    //read selected image to show temp image from browser
    readURL(this);
    //start uploading via ajax
    $('#upload_form').ajaxSubmit(
        { 
            target:   '#targetLayer', //where to show upload info from uploading php script

            //set initial progress bar width to 0
            beforeSubmit: function()
            {
              $(".main.progress-bar").width('0%');
            },

            //show uploading progress by increasing progressbar width by percentComplete
            uploadProgress: function (event, position, total, percentComplete)
            {	
                $('.main.progress').show();
                $(".main.progress-bar").width(percentComplete + '%');
                $(".main.progress-bar").html(percentComplete +'%');
            },

            //after successful upload refresh image_container to display new uploaded file
            success:function ()
            {
                $('#targetLayer').hide();
                var imagePath = $('#targetLayer').text();
                $('#image-name').val(imagePath);
        
            },
            resetForm: true 
        }
    );

});

//submit php
$('#category_form, #product_form, #treatment_form, #appointment_form' ).on('submit',function(e){
    e.preventDefault();
    $(this).ajaxSubmit(
        { 
            target:   '#add_info', //where to show upload info from uploading php script
    
            //set initial progress bar width to 0
            beforeSubmit: function()
            {
                $("#add_info").html('<div class="lds-dual-ring"></div>');
            },
    
            //show uploading progress by increasing progressbar width by percentComplete
    
            //after successful upload refresh image_container to display new uploaded file
            success:function ()
            {
                var info = $("#add_info").text()
                if( info == 'success')
                {
                    window.location.assign(window.location.href);
                }
            },
            resetForm: true 
        }
    );
})

//Delete category
$('.delCategory').on('click', function(){
    var catId = $(this).attr('id');
    var catName = $(this).attr('name');
    if(confirm('Are you sure you want to remove this category?'))
    {
        $.post("/futclinic/index.php/doctors/destroy",
        {
            id: catId,
            name: catName,
            
        });
        $(this).parents('.categories').fadeOut(700);
    }
    
});

//add category
$('.add').on('click', function(){
    //reinitialize box if user has tried updating before
    $("#add_info").html('')
    $('#categoryModal .title').text('Add Category');
    $('#categoryModal .submit').text('Add');
    $('#categoryModal #category_form').attr('action', '/futclinic/index.php/doctors/create');
    $('#categoryModal img').attr('src', "");
    $('#categoryModal #name').val('');
    $('#categoryModal #image-name').val('');
    $('#categoryModal #speciality').val('');
})

//Edit category
$('.edit').on('click', function(){
    //get category data
    var id = $(this).attr('id');
    var category = $(this).parents('.box');
    var name = category.children('.name').text();
    var speciality = category.children('.speciality').text(); 
    var image = category.children('img').attr('src');   

    //place in edit box
    $("#add_info").html('')
    $('#categoryModal .title').text('Edit Category');
    $('#categoryModal .submit').text('Update');
    $('#categoryModal #category_form').attr('action', '/futclinic/index.php/doctors/edit/'+id);
    $('#categoryModal img').attr('src', "");
    $('#categoryModal img').attr('src', image);
    $('#categoryModal #name').val(name);
    $('#categoryModal #image-name').val(image);
    $('#categoryModal #speciality').val(speciality);
})

//Product

//function to read image for galery
function readGalleryURL(input){
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            name = input.files[0].name;
            src = e.target.result;
            image = '<div class=" gallery-wrapper col-12 col-sm-6 mb-1 col-md-6"><img class="img-thumbnail" src="'+src+'" alt="'+name+'"><i style="cursor:pointer" class="fa remove-gallery text-danger fa-trash"></i></div>';
            $('.gallerycontainer').append(image);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//add to product gallery
//prepend new Dom's image container to show upload progress and upload new media via ajax when a media is selected
$('#usergallery').change(function(){

        readGalleryURL(this);

    //start uploading via ajax
   $('#upload_gallery_form').ajaxSubmit(
        { 
            target:   '#gallery_info', //where to show upload info from uploading php script

            //set initial progress bar width to 0
            beforeSubmit: function()
            {
              $(".gal.progress-bar").width('0%');
            },

            //show uploading progress by increasing progressbar width by percentComplete
            uploadProgress: function (event, position, total, percentComplete)
            {	
                $('.gal.progress').show();
                $(".gal.progress-bar").width(percentComplete + '%');
                $(".gal.progress-bar").html(percentComplete +'%');
            },

            //after successful upload refresh image_container to display new uploaded file
            success:function ()
            {
                $('#gallery_info').hide();
                var imagePath = $('#gallery_info').text();
                current_photos = $('#gallery-photos').val();
                $('#gallery-photos').val(current_photos+imagePath+',');
                $('.remove-gallery').last().attr('src',imagePath.trim());
                $('.gal.progress').hide();
        
            },
            resetForm: true 
        }
    ); 

});

//Delete product
$('.delStudent').on('click', function(){
    var id = $(this).attr('id');
    if(confirm('Are you sure you want to remove this student?'))
    {
        $.post("/futclinic/index.php/student/destroy",
        {
            id: id,
            
        });
        $(this).parents('.product-row').fadeOut(700);
    }
    
});

//Edit product
//remove image from gallery
$(document).on('click', '.remove-gallery', function(){
    var src = $(this).attr('src');
    src += ',';
    url = $('#gallery-photos').val();
    new_url = url.replace(src,'');
    $('#gallery-photos').val(new_url);
    $(this).parents('.gallery-wrapper').fadeOut(700);
})

$('.change-password').on('click', function(){
    $(this).hide();
    $('.edit-password').fadeIn(700);
})

//height = $(document).height()
//$('nav .sidebar').css('height', height);


//delete treatment entry
$('.deltreatment').on('click', function(){
    var treatId = $(this).attr('id');
    if(confirm('Are you sure you want to remove this treatment'))
    {
        $.post("/futclinic/index.php/profile/destroy_treat",
        {
            id: treatId
            
        });
        $(this).parents('.box').fadeOut(700);
    }
    
});

/*scheduler.init('scheduler_here', new Date(),"month");

var events = [
    {id:1, text:"Meeting",   start_date:"10/23/2019 14:00",end_date:"10/23/2019 17:00"},
    {id:2, text:"Conference",start_date:"10/25/2019 12:00",end_date:"10/25/2019 19:00"},
    {id:3, text:"Interview", start_date:"10/27/2019 09:00",end_date:"10/27/2019 10:00"}
 ];

 scheduler.parse(events, "json");*/