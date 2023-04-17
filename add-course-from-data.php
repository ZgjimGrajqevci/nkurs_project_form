<?php
    session_start();

    include 'includes/config/config.php';

    if (isset($_POST['submit_course_form'])){
        $course_provider_id = $_POST['select_provider_id'];
        $course_name = $_POST['course_name'];

        $course_category_id = $_POST['selected_category_id'];

        $course_other_category = $_POST['course_other_category'];

        $course_online_status = $_POST['course_online_status'];

        $course_learn = $_POST['course_learn'];
        $learn_arr=explode( "\n", $course_learn);

        $course_requirements = $_POST['course_requirements'];
        $requirement_arr=explode( "\n", $course_requirements);

        $course_info = $_POST['course_info'];

        $course_price = $_POST['course_price'];

        $course_duration = $_POST['course_duration'];

        $course_intensity = $_POST['course_intensity'];

        $course_group_min = $_POST['course_group_min'];

        $course_group_max = $_POST['course_group_max'];

        $course_status = $_POST['course_status'];

        $course_located = $_POST['course_located'];

        $targetDirImage = "uploads/image/";
        $course_image = basename($_FILES["course_image"]["name"]);
        $targetFilePath = $targetDirImage . $course_image;


        if (move_uploaded_file($_FILES["course_image"]["tmp_name"], $targetFilePath)) {
            mysqli_query($conn, "INSERT INTO course(provider_id,course_name,image_path,online_status,info) VALUES('$course_provider_id','$course_name','$course_image','$course_online_status','$course_info')");
            $id = mysqli_insert_id($conn);
        } else {
            mysqli_query($conn, "INSERT INTO course(provider_id,course_name,online_status,info) VALUES('$course_provider_id','$course_name','$course_online_status','$course_info')");
            $id = mysqli_insert_id($conn);
        }


        mysqli_query($conn, "INSERT INTO other_category(course_id,other_category_name) VALUES('$id','$course_other_category')");

        foreach ($requirement_arr as $index => $requirement){
            mysqli_query($conn, "INSERT INTO requirement(course_id,requirement) VALUES('$id','$requirement')");
        }
        foreach ($learn_arr as $index => $learn){
            mysqli_query($conn, "INSERT INTO learn(course_id,learn) VALUES('$id','$learn')");
        }
        foreach ($course_price as $index => $price){
            $price_type = $_POST['course_price_type_'.$index];

            $duration = $course_duration[$index];
            $duration_type = $_POST['course_duration_type_'.$index];

            $intensity = $course_intensity[$index];

            $group_min = $course_group_min[$index];
            $group_max = $course_group_max[$index];

            $format = $course_status[$index];

            mysqli_query($conn, "INSERT INTO price(course_id,price_amount,price_type,intensity,duration,duration_type,group_min,group_max,format) VALUES('$id','$price','$price_type','$intensity','$duration','$duration_type','$group_min','$group_min','$format')");
        }
        foreach ($course_category_id as $index => $category_id){
            mysqli_query($conn, "INSERT INTO teach(category_id,course_id) VALUES('$category_id','$id')");
        }
        foreach ($course_located as $located_index => $located){
            mysqli_query($conn, "INSERT INTO located(course_id,address_id) VALUES('$id','$located')");
        }

        $_SESSION['course_success'] = "Course was added";
        header("Location:index.php");
    }else{
        $_SESSION['course_error'] = "Course was not added";
        header("Location:index.php");
    }
?>





