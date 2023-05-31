<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="RSAAW">
    <title><?php the_title(); ?></title>
    <meta name="keywords" content="workshop architecture, sustainable design, architecture design firm, architecture and sustainable design, architecture firms canada, architectural design, sustainable workshop">
    <?php wp_head(); ?>
    <?php date_default_timezone_set("America/Mexico_City"); ?>
    <script>
        var theme_url = '<?php theme_url(); ?>';
        var linkGracias = '<?php echo get_the_permalink(354); ?>';
    </script>

</head>

<body>
    <?php echo get_template_part('modals'); ?>
    <?php
    smk_get_template_part(
        'navbar.php',
        array()
    );
    ?>