<?php
function filterPeople()
{
    if ($_POST['filtro']) {
        $regionFilter = sanitize_text_field($_POST['filtro']);

        if ($regionFilter == "all") {
            $peoples = new WP_Query(
                array(
                    "post_type" => "people",
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'meta_key' => 'last_name',
                    'orderby' => 'meta_value',
                    "order" => "ASC"
                )
            );
        } else {
            $tax_query[] =  array(
                'taxonomy' => 'region',
                'field' => 'slug',
                'terms' => $regionFilter
            );
            $peoples = new WP_Query(
                array(
                    "post_type" => "people",
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => $tax_query,
                    'meta_key' => 'last_name',
                    'orderby' => 'meta_value',
                    "order" => "ASC"
                )
            );
        }
?>
        <?php if ($peoples->have_posts()) : ?>
            <?php while ($peoples->have_posts()) : $peoples->the_post(); ?>
                <div class="cell small-12 medium-6 large-6 cell-grow">
                    <?php
                    $foto = get_field('photo');
                    $ocupacion = get_field('occupation');
                    $correo = get_field('email');
                    ?>
                    <div class="card-people">
                        <?php
                        if (!empty($foto)) {
                            $urlImagen = $foto['url'];
                        ?>
                            <div class="container-foto" style="background-image: url('<?php echo $urlImagen; ?>');">
                            </div>
                        <?php } else { ?>
                            <div class="img-empty-person" style="background-image:url('<?php theme_url(); ?>/assets/images/img-person-empty.jpg')"></div>
                        <?php } ?>
                        <div class="container-text-people">
                            <h4 class="title-people"><?php echo get_the_title() . ' ' . get_field('last_name'); ?><span class="text-credentials p"><?php echo ' ' . get_field('professional_credentials'); ?></span></h4>
                            <?php
                            if ($ocupacion) {
                            ?>
                                <p class="text-ocupation"><?php echo $ocupacion; ?></p>
                            <?php } ?>
                            <?php
                            $descripcion = get_the_content();
                            if ($descripcion) {
                            ?>
                                <p class="text-descripcion"><?php echo $descripcion; ?></p>
                            <?php } ?>
                            <?php
                            if ($correo) {
                            ?>
                                <a href="<?php echo "mailto:" . $correo; ?>" class="btn-black gray2 font-button">
                                    <span><span><?php echo $correo; ?></span></span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        <?php else : ?>
            <?php http_response_code(404); ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
<?php
    }
    die();
}
?>