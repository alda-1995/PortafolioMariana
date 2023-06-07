<?php
$ArgProyectos = array(
    'numberposts' => 4,
    'post_type'   => 'post'
);
?>
<div class="bloque-proyectos-relacionados">
    <div class="container">
        <h2 class="title-relacionados mb-4">Ver otros proyectos</h2>
        <div class="row">
            <?php
            $numPostsMostrar = 4;
            global $post;
            $current_post = $post;
            $postSinle = array(
                'post_type' => 'post'
            );
            $the_query = new WP_Query($postSinle);
            $total = $the_query->post_count;
            if ($total >= 4) {
                for ($i = $numPostsMostrar; $i > 0; $i--) {
                    $post = get_previous_post(); // this uses $post->ID
                    setup_postdata($post);
            ?>
                    <?php if (!empty($post)) {
                        $idPost = get_the_ID();
                    ?>
                        <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                            <a href="<?php echo get_the_permalink($idPost); ?>" class="card-proyecto">
                                <?php
                                $imgUrl = get_the_post_thumbnail_url($idPost);
                                if ($imgUrl) {
                                ?>
                                    <div class="img-proyecto" style="background-image: url('<?php echo $imgUrl; ?>');"></div>
                                <?php } ?>
                                <p class="title-proyecto"><?php echo get_the_title($idPost); ?></p>
                            </a>
                        </div>
                        <?php
                    } else {
                        for ($j = 0; $j < $i; $j++) {
                            $twoPosts = get_posts($ArgProyectos);
                            $idPost = $twoPosts[$j]->ID;
                        ?>
                            <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                                <a href="<?php echo get_the_permalink($idPost); ?>" class="card-proyecto">
                                    <?php
                                    $imgUrl = get_the_post_thumbnail_url($idPost);
                                    if ($imgUrl) {
                                    ?>
                                        <div class="img-proyecto" style="background-image: url('<?php echo $imgUrl; ?>');"></div>
                                    <?php } ?>
                                    <p class="title-proyecto"><?php echo get_the_title($idPost); ?></p>
                                </a>
                            </div>
                    <?php
                        }
                        break;
                    }
                    ?>
            <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</div>