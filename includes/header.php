<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>
        <?php
        if (empty($title)){
            echo "nkurs";
        }
        else{
            echo "nkurs | $title";
        }
        $activePage = basename($_SERVER['PHP_SELF'], ".php");
        ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <link rel="shortcut icon" type="image/x=icon" href="assets/images/logo/nkurs-mouth-white-bg.png">

    <!-- jvectormap -->
    <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

    <!-- plugin css -->
    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/landing-page.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />


</head>
<body data-sidebar="dark">