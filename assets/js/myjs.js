//Navbar - Small/Medium
const modal = document.querySelector("#mainNavSmallMedium");
const menuBtn = document.querySelector('#mainNavToggleBtn');
const body = document.querySelector("body");

let menuOpen = false;
menuBtn.addEventListener('click', () => {
    if(!menuOpen) {
        menuBtn.classList.add('openNavSmallMedium');
        menuOpen = true;
    } else {
        menuBtn.classList.remove('openNavSmallMedium');
        menuOpen = false;
    }
});

$(menuBtn).click(function (){
    document.getElementById("mainNavSmallMedium").style.width = "100%";
    modal.classList.toggle("hidden");

    if (!modal.classList.contains("hidden")) {
        // Disable scroll
        body.style.overflow = "hidden";
        menuBtn.setAttribute('onclick','closeNav()');
    } else {

    }
});

function closeNav() {
    document.getElementById("mainNavSmallMedium").style.width = "0%";
    body.style.overflow = "auto";
    menuBtn.removeAttribute('onclick');
}
//Navbar - Small/Medium
////////////////////// form tabs /////////////////////////
$("#registerProfileForm").click(function (){
    $("#addCourseForm").css("color","grey");
    $("#registerProfileForm").css("color","black");
    $("#landing_page_divider").css("display","none");
});

$("#addCourseForm").click(function (){
    $("#registerProfileForm").css("color","grey");
    $("#addCourseForm").css("color","black");
    $("#landing_page_divider").css("display","none");
});
////////////////////// form tabs /////////////////////////
//////////////// provider title toggle //////////////////
$("#provider_type").change(function () {
    var selected = $("#provider_type option:selected").val();

    $('#instructor_title_container').hide();
    $("#instructor_title").removeAttr("required");

    if (selected == 'ind'){
        $('#instructor_title_container').show();
        $("#instructor_title").attr("required", true);
    }
});

$(document).ready(function (e) {
    $('#instructor_title_container').hide();
});
//////////////// provider title toggle //////////////////
/////////////// provider status toggle /////////////////
$("#provider_status").change(function () {
    var selected = $("#provider_status option:selected").val();

    $('#add_new_city').hide();
    $('#new_cities_input_container').hide();

    if (selected == 'off' || selected == 'both'){
        $('#add_new_city').show();
        $('#new_cities_input_container').show();
    }
});

$(document).ready(function (e) {
    $('#add_new_city').hide();
});
/////////////// provider status toggle /////////////////
///////////////// provider city tabs ///////////////////
$(function() {
    $( "#new_cities_input_container" ).tabs();
});
///////////////// provider city tabs ///////////////////
// start -- get addresses of the provider
var course_online_status = false;

function getProviderId(provider_id){
    var selectedProviderId = provider_id;
    $('#course_location_container').remove();
    $("#course_status_row").hide();
    $.ajax({
        url:'get-address.php',
        method:'POST',
        data:{selectedProviderId:selectedProviderId},
        success:function(response){
            if ($.trim(response)){
                course_online_status = true;
                $("#course_no_location_container").hide();
                $("#address_tab").append(response);
                $("#course_status_row").show();
            }else{
                course_online_status = false;
                $("#course_no_location_container").show();
                $("#course_status_row").hide();
            }
        }
    });
}

$(document).on('click','.course_location', function (){
    $("#course_location_hidden").attr('value','empty');
    $("#course_location_hidden-error").remove();
})
// end -- get addresses of the provider
////////////// provider add more cities ////////////////
jQuery(document).ready(($) => {
    $("#course_form").on('click', '#remove_category_path', function (e){
        $(this).parents().eq(1).remove();
    });

    var cityNumber = 1;

    $("#provider_form").on('click','#add_city', function(e) {
        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val( val+1 ).change();

        cityNumber++;

        var tabs = $("#new_cities_input_container").tabs();
        var ul = tabs.find("#new_cities_input_tabs");

        addNewCityTab = '<li id="city_inputs_tab_'+ cityNumber +'" class="city_inputs_tab"><a href="#new_city_inputs_'+ cityNumber +'">Qyteti '+ cityNumber +'</a></li>';

        $.ajax({
            url: "add-new-city.php",
            type: "POST",
            data: {
                cityNumber:cityNumber
            },
            cache: false,
            success: function(result) {
                $(result).appendTo(tabs);
                tabs.tabs( "refresh" );
            }
        });

        $(addNewCityTab).appendTo(ul);
        // $(addNewCity).appendTo(tabs);

        tabs.tabs( "refresh" );
    });

    $("#provider_form").on('click','#delete_city', function(e) {
        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 1) {
            $input.val( val-1 ).change();
        }
        if (cityNumber > 1){
            $("#city_inputs_tab_" + cityNumber).remove();
            $("#new_city_inputs_" + cityNumber).remove();
            cityNumber--;
        }else {
            alert('Minumi i qytetve duhet të jetë 1');
        }
    });
    ////////////// provider add more cities ////////////////
    // start -- course form minus and plus button on number input
    $('#course_form').on('click', '.plus', function(e) {
        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val( val+1 ).change();
    });
    $('#course_form').on('click', '.minus', function(e) {
        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 1) {
            $input.val( val-1 ).change();
        }
    });
    // end -- course form minus and plus button on number input
    // start -- add more towns
    $("#provider_form").on('click','#add_town', function(e) {
        var plusBtn = $(this).parents().eq(3).attr('id');

        var parentCity = $(this).parents().eq(4).attr('id');
        const parentCityNumber = parentCity.charAt(parentCity.length - 1);

        var childrenLength = $('#' + plusBtn).children().length;

        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val( val+1 ).change();

        addNewTown =
            '<div id="new_town_inputs_'+ parentCityNumber +'" class="new_town_inputs">'+
                '<div class="row">' +
                    '<div id="provider_address_container" class="col-sm-6">' +
                        '<label class="form-label" for="provider_address">Adresa e pikës ' + childrenLength + ' <span id="required_star">*</span></label>' +
                        '<input type="text" class="form-control" id="provider_address" name="provider_address_' + parentCityNumber +'[]" placeholder="Shëno adresen">' +
                    '</div>' +
                    '<div id="provider_google_maps_location_container" class="col-sm-6">'+
                        '<label class="form-label" for="provider_google_maps_location" id="provider_google_maps_location_label">Lokacioni në Google Maps</label>'+
                        '<input type="text" class="form-control" id="provider_google_maps_location" name="provider_google_maps_location_'+ parentCityNumber +'[]" placeholder="Linku i Google Maps">'+
                    '</div>'+
                '</div>' +
                '<div class="row">' +
                    '<label id="phone_label" class="form-label">Numri i telefonit në këtë pikë</label>' +
                    '<div id="provider_phone_container" class="col-sm-4">' +
                        '<input type="text" class="form-control" id="provider_phone_number_1" name="provider_phone_number_' + parentCityNumber +'_' + childrenLength + '[]" placeholder="Shëno numrin">' +
                    '</div>' +
                    '<div id="provider_phone_container" class="col-sm-4">' +
                        '<input type="text" class="form-control" id="provider_phone_number_2" name="provider_phone_number_' + parentCityNumber +'_' + childrenLength + '[]" placeholder="Shëno numrin">' +
                    '</div>' +
                    '<div id="provider_phone_container" class="col-sm-4">' +
                        '<input type="text" class="form-control" id="provider_phone_number_3" name="provider_phone_number_' + parentCityNumber +'_' + childrenLength + '[]" placeholder="Shëno numrin">' +
                    '</div>' +
                '</div>' +
            '</div>';

        $("#" + plusBtn).append(addNewTown);
    });

    $("#provider_form").on('click', '#delete_town', function(e) {
        var minusBtn = $(this).parents().eq(3).attr('id');

        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 1) {
            $("#"+minusBtn).children().last().remove();
            $input.val( val-1 ).change();
        } else {
            alert('Minumi i pikave duhet të jetë 1');

        }
    });
    // end -- add more towns
    // start -- add more price options
    let priceNumber = 1;
    let priceNameNumber = 0;

    $("#course_form").on('click','#add_price', function(e) {
        priceNumber++;
        priceNameNumber ++;

        if (course_online_status == false){
            addNewPrice =
                '<div id="course_new_price_inputs_'+ priceNumber +'" class="course_new_price_inputs">'+
                '<div class="row">'+
                '<div id="course_price_container" class="col-sm-4">'+
                '<label class="form-label" for="course_price">Çmimi</label>'+
                '<input type="number" class="form-control" id="course_price" name="course_price[]" placeholder="Shëno çmimin">'+
                '</div>'+
                '<div id="course_price_type_container" class="col-sm-6">'+
                '<div id="course_price_type">'+
                '<input type="radio" id="course_price_hour_'+priceNameNumber+'" name="course_price_type_'+priceNameNumber+'" value="h">'+
                '<label class="form-label" for="course_price_hour_'+priceNameNumber+'">Ora</label>'+
                '<input type="radio" id="course_price_day_'+priceNameNumber+'" name="course_price_type_'+priceNameNumber+'" value="d">'+
                '<label class="form-label" for="course_price_day_'+priceNameNumber+'">Dita</label>'+
                '<input type="radio" id="course_price_month_'+priceNameNumber+'" name="course_price_type_'+priceNameNumber+'" value="m">'+
                '<label class="form-label" for="course_price_month_'+priceNameNumber+'">Muaji</label>'+
                '<input type="radio" id="course_price_offer_'+priceNameNumber+'" name="course_price_type_'+priceNameNumber+'" value="a">'+
                '<label class="form-label" for="course_price_offer_'+priceNameNumber+'">Oferta</label>'+
                '</div>'+
                '<div id="course_price_type_error_container">'+
                '<input type="text" id="course_price_type_error" name="course_price_type_error_0">'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="row">'+
                '<div id="course_duration_container" class="col-sm-4">'+
                '<label class="form-label" for="course_duration">Sa zgjatë kursi</label>'+
                '<input type="number" class="form-control" id="course_duration" name="course_duration[]" placeholder="Shëno këtu">'+
                '</div>'+
                '<div id="course_duration_type_container" class="col-sm-6">'+
                '<input type="radio" id="course_duration_hour_'+priceNameNumber+'" name="course_duration_type_'+priceNameNumber+'" value="h">'+
                '<label class="form-label" for="course_duration_hour_'+priceNameNumber+'">Orë</label>'+
                '<input type="radio" id="course_duration_day_'+priceNameNumber+'" name="course_duration_type_'+priceNameNumber+'" value="d">'+
                '<label class="form-label" for="course_duration_day_'+priceNameNumber+'">Ditë</label>'+
                '<input type="radio" id="course_duration_week_'+priceNameNumber+'" name="course_duration_type_'+priceNameNumber+'" value="w">'+
                '<label class="form-label" for="course_duration_week_'+priceNameNumber+'">Javë</label>'+
                '<input type="radio" id="course_duration_month_'+priceNameNumber+'" name="course_duration_type_'+priceNameNumber+'" value="m">'+
                '<label class="form-label" for="course_duration_month_'+priceNameNumber+'">Muaj</label>'+
                '</div>'+
                '</div>'+
                '<div class="row">'+
                '<div id="course_intensity_container" class="col-sm-6">'+
                '<label class="form-label" for="course_intensity">Sa orë në javë</label>'+
                '<input type="number" class="form-control" id="course_intensity" name="course_intensity[]" placeholder="Shëno këtu">'+
                '</div>'+
                '</div>'+
                '<div class="row">' +
                '<div id="course_group_container" class="col-sm-6">'+
                '<label class="form-label">Numri i individëve në grup</label>'+
                '<div id="course_groups">'+
                '<input type="number" class="form-control" id="course_pg_lowest" name="course_group_min[]" placeholder="Minimal">'+
                '<span id="course_group_split_line">-</span>'+
                '<input type="number" class="form-control" id="course_pg_highest" name="course_group_max[]" placeholder="Maksimal">'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>';
        }
        if (course_online_status == true){
            addNewPrice =
                '<div id="course_new_price_inputs_'+ priceNumber +'" class="course_new_price_inputs">'+
                '<div class="row">'+
                '<div id="course_price_container" class="col-sm-4">'+
                '<label class="form-label" for="course_price">Çmimi</label>'+
                '<input type="number" class="form-control" id="course_price" name="course_price[]" placeholder="Shëno çmimin">'+
                '</div>'+
                '<div id="course_price_type_container" class="col-sm-6">'+
                '<div id="course_price_type">'+
                '<input type="radio" id="course_price_ora" name="course_price_type_'+priceNameNumber+'" value="h">'+
                '<label class="form-label" for="course_price_ora">Ora</label>'+
                '<input type="radio" id="course_price_dita" name="course_price_type_'+priceNameNumber+'" value="d">'+
                '<label class="form-label" for="course_price_dita">Dita</label>'+
                '<input type="radio" id="course_price_month" name="course_price_type_'+priceNameNumber+'" value="m">'+
                '<label class="form-label" for="course_price_month">Muaji</label>'+
                '<input type="radio" id="course_price_offer" name="course_price_type_'+priceNameNumber+'" value="a">'+
                '<label class="form-label" for="course_price_offer">Oferta</label>'+
                '</div>'+
                '<div id="course_price_type_error_container">'+
                '<input type="text" id="course_price_type_error" name="course_price_type_error_0">'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="row">'+
                '<div id="course_duration_container" class="col-sm-4">'+
                '<label class="form-label" for="course_duration">Sa zgjatë kursi</label>'+
                '<input type="number" class="form-control" id="course_duration" name="course_duration[]" placeholder="Shëno këtu">'+
                '</div>'+
                '<div id="course_duration_type_container" class="col-sm-6">'+
                '<input type="radio" id="course_duration_hour" name="course_duration_type_'+priceNameNumber+'" value="h">'+
                '<label class="form-label" for="course_duration_hour">Orë</label>'+
                '<input type="radio" id="course_duration_day" name="course_duration_type_'+priceNameNumber+'" value="d">'+
                '<label class="form-label" for="course_duration_day">Ditë</label>'+
                '<input type="radio" id="course_duration_week" name="course_duration_type_'+priceNameNumber+'" value="w">'+
                '<label class="form-label" for="course_duration_week">Javë</label>'+
                '<input type="radio" id="course_duration_month" name="course_duration_type_'+priceNameNumber+'" value="m">'+
                '<label class="form-label" for="course_duration_month">Muaj</label>'+
                '</div>'+
                '</div>'+
                '<div class="row">'+
                '<div id="course_intensity_container" class="col-sm-6">'+
                '<label class="form-label" for="course_intensity">Sa orë në javë</label>'+
                '<input type="number" class="form-control" id="course_intensity" name="course_intensity[]" placeholder="Shëno këtu">'+
                '</div>'+
                '</div>'+
                '<div class="row">' +
                '<div id="course_group_container" class="col-sm-6">'+
                '<label class="form-label">Numri i individëve në grup</label>'+
                '<div id="course_groups">'+
                '<input type="number" class="form-control" id="course_pg_lowest" name="course_group_min[]" placeholder="Minimal">'+
                '<span id="course_group_split_line">-</span>'+
                '<input type="number" class="form-control" id="course_pg_highest" name="course_group_max[]" placeholder="Maksimal">'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="row">'+
                '<div id="course_status_container" class="col-sm-6">'+
                '<label class="form-label" for="course_status">Vijueshmëria për këtë ofertë</label>'+
                '<select class="form-select" id="course_status" name="course_status[]">'+
                '<option value="">Zgjedh Vijueshmërin</option>'+
                '<option value="off">Vetëm Fizikisht</option>'+
                '<option value="on">Vetëm Online</option>'+
                '<option value="both">Fizikisht & Online</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '</div>';
        }

        $("#course_new_price_inputs_container").append(addNewPrice);
    });

    $("#course_form").on('click', '#delete_price', function(e) {
        if (priceNumber > 1){
            $("#course_new_price_inputs_" + priceNumber).remove();

            priceNumber--;
        }else {
            alert('Minumi i ofertave duhet të jetë 1');
        }
    });
    // end -- add more price options

    $(document).on('click','.price_type', function (){
        if ($('input[class=price_type]:checked').length > 0){
            $('#course_price_type_error').attr('value','true');
        }
    })
});
// start -- multi step provider
$(document).ready(function(){
    var val	=	{
        // Specify validation rules
        rules: {
            provider_name: "required",
            provider_type: "required",
            instructor_title: "required",
            provider_logo_path: "required",
            provider_status: "required",
            'provider_city[]': "required",
            select_provider_id:"required",
            course_name: "required",
            category2: "required",
            'course_price[]': "required",
            // course_price_type_0: "required",
            // course_price_type_1: "required",
            // course_price_type_2: "required",
            course_price_type_error_0: "required",
            'course_status[]': "required",
            'course_location_hidden': "required",
            'provider_address_1[]': "required",
            'provider_address_2[]': "required",
            'provider_address_3[]': "required",
            'provider_address_4[]': "required",
        },
        // Specify validation error messages
        messages: {
            provider_name: "Provider name is required",
            provider_type: "provider type is required",
            instructor_title: "instructor type is required",
            provider_logo_path: "Provider logo is required",
            provider_status: "Provider status is required",
            'provider_city[]': "Provider city is required",
            select_provider_id: "Selection of provider is required",
            course_name: "Course name is required",
            category2: "Category is required",
            'course_price[]': "Course price is required",
            // course_price_type_0: "Course price type is required",
            // course_price_type_1: "Course price type is required",
            // course_price_type_2: "Course price type is required",
            course_price_type_error_0: "Course price type is required",
            'course_status[]': "Course status is required",
            'course_location_hidden': "Course location is required",
            'provider_address_1[]': "Course address is required",
            'provider_address_2[]': "Course address is required",
            'provider_address_3[]': "Course address is required",
            'provider_address_4[]': "Course address is required",
        }
    }
    $("#provider_form").multiStepForm({
        // defaultStep:0,
        beforeSubmit : function(form, submit){
            console.log("called before submiting the form");
            console.log(form);
            console.log(submit);
            },
        validations:val,
        }).navigateTo(0);
    $("#course_form").multiStepForm({
        // defaultStep:0,
        beforeSubmit : function(form, submit){
            console.log("called before submiting the form");
            console.log(form);
            console.log(submit);
            },
        validations:val,
        }).navigateTo(0);
});
// start -- after submit
var after_submit = document.getElementById("after_submit");

if (after_submit){
    $("#forms_container").hide();
}
$(document).on("click","#add_another_course", function (){
    $("#after_submit").hide();
    $("#forms_container").show();
    $("#addCourseForm").attr('class','active');
    $("#course_form_container").attr('class','tab-pane active');
    $("#landing_page_divider").css("display","none");
})
$(document).on("click","#provider_try_again", function (){
    $("#after_submit").hide();
    $("#forms_container").show();
    $("#registerProfileForm").attr('class','active');
    $("#provider_form_container").attr('class','tab-pane active');
})
// end -- after submit
$(document).on('click','#course_other_category', function (){
    $("#category2").attr('value','empty');
    $("#category2-error").remove();
})

$(document).on('change','#course_online_status', function (){
    var selected = $("#course_online_status option:selected").val();

    $('#show_addresses').hide();

    if (selected == 'off' || selected == 'both'){
        $('#show_addresses').show();
    }
});

$(document).ready(function() {
    var subOriginalState = $("#subcategory_list").clone();
    var sub2OriginalState = $("#second_subcategory_list").clone();

    var is_mobile = false;

    if( $('#device_identifier').css('display')=='none') {
        is_mobile = true;
    }

    if (is_mobile == true) {
        $(document).on('click', '.category', function () {
            let category_id = this.value;

            $("#category2").attr('value','empty');
            $("#category2-error").remove();

            $.ajax({
                url: "filter/get-subcat.php",
                type: "POST",
                data: {
                    category_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#second_subcategory_list").replaceWith(sub2OriginalState.clone());
                    $("#subcategory_list").html(result);
                }
            });
            $.ajax({
                url: "filter/category_path.php",
                type: "POST",
                data: {
                    category_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#category_selected_path").html(result)
                }
            });
        });
        $('#subcategory_list').on('change', '.subcategory', function () {
            let category_id = this.value;
            $.ajax({
                url: "filter/get-subcat.php",
                type: "POST",
                data: {
                    subcategory_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#second_subcategory_list").html(result);
                }
            });
            $.ajax({
                url: "filter/category_path.php",
                type: "POST",
                data: {
                    subcategory_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#category_path_second_subcategory").remove();
                    $("#category_path_arrow_second_subcategory").remove();
                    $("#category_path_subcategory").remove();
                    $("#category_path_arrow_subcategory").remove();
                    $("#category_selected_path_category").append(result)
                }
            });
        });
        $(document).on('change', '.second_subcategory', function () {
            let category_id = this.value;
            $.ajax({
                url: "filter/category_path.php",
                type: "POST",
                data: {
                    second_subcategory_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#category_path_second_subcategory").remove();
                    $("#category_path_arrow_second_subcategory").remove();
                    $("#category_selected_path_category").append(result)
                }
            });
        });
        $("#close_category_modal_box_btn").click(function (){
            $("input[name=category]:checked").prop("checked", false);
            $("#subcategory_list").empty();
            $("#second_subcategory_list").empty();
            $("#category_selected_path").empty();
        });
        $("#add_another_category").click(function (){
            $("input[name=category]:checked").prop("checked", false);
            $("#category_selected_path").empty();
            $("#subcategory_list").empty();
            $("#second_subcategory_list").empty();
            $('#another_category').show();
            $("#category_list").show();
        });
    }
    if (is_mobile == false) {
        $(document).on('click', '.category', function () {
            let category_id = this.value;

            $("#category2").attr('value','empty');
            $("#category2-error").remove();

            $.ajax({
                url: "filter/get-subcat.php",
                type: "POST",
                data: {
                    category_id:category_id
                },
                cache: false,
                success: function(result) {
                    if ($.trim(result)){
                        $("#second_subcategory_list").replaceWith(sub2OriginalState.clone());
                        $("#category_list").hide();
                        $("#subcategory_list").show().html(result);
                    }
                }
            });
            $.ajax({
                url: "filter/category_path.php",
                type: "POST",
                data: {
                    category_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#category_selected_path").html(result)
                }
            });
        });
        $(document).on('click','#subcategory_back_btn', function (){
            $("input[name=category]:checked").prop("checked", false);
            $("#category_selected_path").empty();
            $("#category_path_arrow_subcategory").remove();
            $("#subcategory_list").empty();
            $("#category_list").show();
        });
        $('#subcategory_list').on('change', '.subcategory', function () {
            let category_id = this.value;
            $.ajax({
                url: "filter/get-subcat.php",
                type: "POST",
                data: {
                    subcategory_id:category_id
                },
                cache: false,
                success: function(result) {
                    if ($.trim(result)){
                        $("#subcategory_list").hide();
                        $("#second_subcategory_list").html(result);
                    }
                }
            });
            $.ajax({
                url: "filter/category_path.php",
                type: "POST",
                data: {
                    subcategory_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#category_path_subcategory").remove();
                    $("#category_path_arrow_subcategory").remove();
                    $("#category_selected_path_category").append(result)
                }
            });
        });
        $(document).on('click','#second_subcategory_back_btn', function (){
            $("input[name=subcategory]:checked").prop("checked", false);
            $("#category_path_second_subcategory").remove();
            $("#category_path_arrow_second_subcategory").remove();
            $("#category_path_subcategory").remove();
            $("#category_path_arrow_subcategory").remove();
            $("#second_subcategory_list").empty();
            $("#subcategory_list").show();
        });
        $(document).on('change', '.second_subcategory', function () {
            let category_id = this.value;
            $.ajax({
                url: "filter/category_path.php",
                type: "POST",
                data: {
                    second_subcategory_id:category_id
                },
                cache: false,
                success: function(result) {
                    $("#category_path_second_subcategory").remove();
                    $("#category_path_arrow_second_subcategory").remove();
                    $("#category_selected_path_category").append(result)
                }
            });
        });
        $("#close_category_modal_box_btn").click(function (){
            $("input[name=category]:checked").prop("checked", false);
            $("#subcategory_list").empty();
            $("#second_subcategory_list").empty();
            $("#category_selected_path").empty();
            $("#category_list").show();
        });
        $("#add_another_category").click(function (){
            $("input[name=category]:checked").prop("checked", false);
            $("#category_selected_path").empty();
            $("#subcategory_list").empty();
            $("#second_subcategory_list").empty();
            $('#another_category').show();
            $("#category_list").show();
        });
    }
    // start -- show categories as results


    $(document).on("click","#add_category_path", function (){
        var action = 'data';
        var category = get_filter_text('category');
        var subcategory = get_filter_text('subcategory');
        var second_subcategory = get_filter_text('second_subcategory');

        $.ajax({
            url:'filter/show_categories.php',
            method:'POST',
            data:{action:action,category:category,subcategory:subcategory,second_subcategory:second_subcategory},
            success:function(response){
                $("#results").append(response);
            }
        });

        $(".category").prop("checked", false);
        $("#category_selected_path").empty();
        $("#subcategory_list").empty();
        $("#second_subcategory_list").empty();
        $("#category_list").show();
    });

    function get_filter_text(text_id){
        var filterData = [];
        $('.'+text_id+':checked').each(function (){
            filterData.push($(this).val());
        });
        return filterData;
    }
    // end -- show categories as results
    if ($("#after_submit").length) {
        $('html, body').animate({
            scrollTop: $("#after_submit").offset().top
        }, 100);
    }
});

