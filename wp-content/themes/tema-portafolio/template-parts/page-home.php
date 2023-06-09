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
<!-- bloque proyectos -->
<?php
smk_get_template_part(
  'template-parts/components/bloque-proyectos.php',
  array(
  )
);
?>
<!-- bloque sobre mi -->
<?php
$bloqueAcerca = get_field('bloque_acerca_de_mi');
smk_get_template_part(
  'template-parts/components/bloque-sobremi.php',
  array(
    'img' => $bloqueAcerca['imagen'],
    'titulo' => $bloqueAcerca['titulo'],
    'texto' => $bloqueAcerca['texto'],
    'texto2' => $bloqueAcerca['texto_2'],
    'txtBtn' => $bloqueAcerca['texto_boton']
  )
);
?>
<?php get_footer(); ?>