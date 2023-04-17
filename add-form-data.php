<?php
    session_start();

    include 'includes/config/config.php';

    if (isset($_POST['submit_provider_form'])){
        $provider_name = $_POST['provider_name'];
        $provider_type = $_POST['provider_type'];
        $instructor_title = $_POST['instructor_title'];

        $website_url = $_POST['website_url'];
        $facebook_url = $_POST['facebook_url'];
        $instagram_url = $_POST['instagram_url'];
        $linkedin_url = $_POST['linkedin_url'];
        $provider_description = $_POST['provider_description'];

        $targetDirLogo = "uploads/logo/";
        $provider_logo_path = basename($_FILES["provider_logo_path"]["name"]);
        $targetFilePath = $targetDirLogo . $provider_logo_path;

        $target_image_dir = "uploads/picture/";
        $provider_image_names = array_filter($_FILES['provider_image_path']['name']);

        $provider_city = $_POST['provider_city'];

        if (move_uploaded_file($_FILES["provider_logo_path"]["tmp_name"], $targetFilePath)) {
            mysqli_query($conn, "INSERT INTO provider(provider_name,logo_path,type,title,description,website_url,facebook_url,instagram_url,linkedin_url) VALUES('$provider_name','$provider_logo_path','$provider_type','$instructor_title','$provider_description','$website_url','$facebook_url','$instagram_url','$linkedin_url')");
            $id = mysqli_insert_id($conn);

        } else {
            mysqli_query($conn, "INSERT INTO provider(provider_name,type,title,description,website_url,facebook_url,instagram_url,linkedin_url) VALUES('$provider_name','$provider_type','$instructor_title','$provider_description','$website_url','$facebook_url','$instagram_url','$linkedin_url')");
            $id = mysqli_insert_id($conn);
        }

        if (!empty($provider_image_names)){
            foreach ($_FILES['provider_image_path']['name'] as $value => $image){
                $file_name = basename($_FILES['provider_image_path']['name'][$value]);
                $target_file_path_image = $target_image_dir . $file_name;
                if(move_uploaded_file($_FILES["provider_image_path"]["tmp_name"][$value], $target_file_path_image)){
                    mysqli_query($conn, "INSERT INTO picture(provider_id,picture_path) VALUES('$id','$file_name')");
                }
            }
        }

        if (!empty($provider_city)){
            foreach ($provider_city as $index => $city){
                $provider_email = $_POST['provider_email'];
                $email = $provider_email[$index];

                mysqli_query($conn, "INSERT INTO email(provider_id,email) VALUES('$id','$email')");
                $email_id = mysqli_insert_id($conn);

                $address_count = $index;

                $n_address_count = $address_count + 1;

                $provider_address = $_POST['provider_address_'. $n_address_count];
                $provider_gm_location = $_POST['provider_google_maps_location_'. $n_address_count];

                foreach ($provider_address as $index2 => $address){
                    $gm_location = $provider_gm_location[$index2];
                    mysqli_query($conn, "INSERT INTO address(provider_id,city_id,address,gm_location) VALUES('$id','$city','$address','$gm_location')");
                    $address_id = mysqli_insert_id($conn);

                    mysqli_query($conn,"INSERT INTO contact(city_id,email_id) VALUES('$city','$email_id')");

                    $n_phone_number_count = $index2 + 1;
                    $provider_phone_number = $_POST['provider_phone_number_'. $n_address_count .'_'.$n_phone_number_count];

                    foreach ($provider_phone_number as $index3 => $phone_number){
                        mysqli_query($conn, " INSERT INTO phone(provider_id,phone_number) VALUES('$id','$phone_number')");
                        $phone_id = mysqli_insert_id($conn);

                        mysqli_query($conn, "INSERT INTO calls(address_id,phone_id) VALUES('$address_id','$phone_id')");
                    }
                }
            }
        }

        $_SESSION['success'] = "Provider was added";
        header("Location:index.php#after-submit");
    }else{
        $_SESSION['error'] = "Provider was not added";
        header("Location:index.php");
    }
?>