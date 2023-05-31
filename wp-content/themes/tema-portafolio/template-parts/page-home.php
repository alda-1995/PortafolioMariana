<?php
/*
  Template Name: Portafolio Mariana - Home
  Template Post Type: page
*/
?>
<?php get_header(); ?>
<!-- bloque banner -->
<?php
$bloqueBanner = get_field('bloque_principal');
smk_get_template_part(
  'template-parts/components/bloque-banner.php',
  array(
    'img' => $bloqueBanner['imagen'],
    'titulo' => $bloqueBanner['titulo'],
    'texto' => $bloqueBanner['texto']
  )
);
?>
<?php get_footer(); ?>