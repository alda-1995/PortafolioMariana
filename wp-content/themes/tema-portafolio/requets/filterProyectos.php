<?php
function filtraProyectos()
{
    if ($_POST['filtro']) {
        $filtro = sanitize_text_field($_POST['filtro']);
        if ($filtro == "all") {
            $articulos = new WP_Query(
                array(
                    "post_type" => "post",
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    "orderby" => "date",
                    "order" => "DESC"
                )
            );
        } else {
            $tax_query[] =  array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $filtro
            );
            $articulos = new WP_Query(
                array(
                    "post_type" => "post",
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => $tax_query,
                    "orderby" => "date",
                    "order" => "DESC"
                )
            );
        }
?>
        <?php if ($articulos->have_posts()) : ?>
            <?php while ($articulos->have_posts()) : $articulos->the_post(); ?>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                    <a href="<?php echo get_the_permalink(); ?>" class="card-proyecto">
                        <?php
                        $imgUrl = get_the_post_thumbnail_url();
                        if ($imgUrl) {
                        ?>
                            <div class="img-proyecto" style="background-image: url('<?php echo $imgUrl; ?>');"></div>
                        <?php } ?>
                        <p class="title-proyecto"><?php echo get_the_title(); ?></p>
                    </a>
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