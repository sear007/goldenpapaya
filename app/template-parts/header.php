<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <?php wp_head(); ?>
</head>
<body>
<div class="container-xxl bg-white p-0">
    <!-- Header Start -->
    <?php get_template_part('app/sections/home', 'header');?>
    <!-- Header End -->
    <!-- Spinner Start -->
    <?php get_template_part('app/sections/global', 'loading');?>
    <!-- Spinner End -->