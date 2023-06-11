<div class="bloque-proyectos" id="portafolioBlock">
    <div class="container">
        <h2 class="title-g mb-4 animacionTextOpacity target-text-animation">Portafolio</h2>
        <?php
        $terms = get_terms(
            array(
                'taxonomy' => 'category',
                'hide_empty' => false,
            )
        );
        if (!empty($terms)) {
        ?>
        <div class="animacionTextOpacity target-text-animation">
            <div class="category-container">
                <div class="flex-category">
                    <a href="#" data-slug="all" class="link-category font-button active">Todos</a>
                    <?php
                    foreach ($terms as $term) {
                        if ($term->parent == 0 && $term->name !== "Sin categoría") {
                    ?>
                            <a href="#" data-slug="<?php echo $term->slug; ?>" class="link-category font-button"><?php echo $term->name; ?></a>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <?php
        $articulos = new WP_Query(
            array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                "orderby" => "date",
                "order" => "DESC"
            )
        );
        ?>
        <?php
        if ($articulos->have_posts()) :
        ?>
            <div class="parent-content">
                <div class="row" id="proyectosContainer">
                    <?php
                    $delay = 1;
                    while ($articulos->have_posts()) : $articulos->the_post();
                    ?>
                        <div class="col-6 col-md-4 col-lg-3 d-flex-me align-items-stretch">
                            <a href="<?php echo get_the_permalink(); ?>" class="card-proyecto target-text-animation animacionTextOpacity <?php echo "delay" . $delay; ?>">
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
                    if ($delay < 4) {
                        $delay++;
                    } else {
                        $delay = 1;
                    }
                    endwhile; ?>
                </div>
                <div class="loader-content">
                    <div class="loader"></div>
                </div>
                <div class="container-notResults">
                    <h3 class="mb-0 title">No hay resultados disponibles.</h3>
                </div>
            </div>
            <div class="paginationProyectos pagination-js">
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>