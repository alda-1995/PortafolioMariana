<?php get_header(''); ?>
<div class="bloque-interna-proyectos">
    <div class="container parent-container">
        <div class="btn-float mb-4">
            <a href="javascript: history.go(-1)" class="btn-main font-button">Regresar</a>
        </div>
        <div class="content-align">
            <div class="d-flex flex-column align-items-center text-center mb-4">
                <h2 class="title-proyecto mb-2"><?php echo get_the_title(); ?></h2>
                <?php
                $termsArray = get_the_terms(get_the_ID(), "category");
                if (!empty($termsArray)) {
                ?>
                    <div class="list-category-text mb-2">
                        <?php
                        foreach ($termsArray as $term) {
                        ?>
                            <span class="h3 text-category"><?php echo $term->name; ?></span>
                        <?php
                        }
                        ?>
                    </div>
                <?php } ?>
                <?php
                $fecha = get_field('fecha_int_project');
                if ($fecha) {
                ?>
                    <p class="text-fecha mb-0"><?php echo $fecha ?></p>
                <?php } ?>
            </div>
            <div class="content-proyectos">
                <?php echo get_the_content(); ?>
            </div>
        </div>
    </div>
</div>
<!-- bloque proyectos relacionados -->
<?php
smk_get_template_part(
  'template-parts/components/bloque-proyectos-relacionados.php',
  array(
  )
);
?>
<?php get_footer(); ?>