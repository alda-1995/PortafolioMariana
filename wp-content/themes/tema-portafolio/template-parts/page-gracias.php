<?php
/*
  Template Name: Portafolio Mariana - Gracias
  Template Post Type: page
*/
?>
<?php get_header(); ?>
<!-- bloque banner gracias -->
<?php
smk_get_template_part(
  'template-parts/components/bloque-bannerTwo.php',
  array(
    'img' => get_field('imagen'),
    'titulo' => get_field('titulo'),
    'texto' => get_field('texto')
  )
);
?>
<?php get_footer(); ?>