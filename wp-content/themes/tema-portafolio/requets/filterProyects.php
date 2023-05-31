<?php
function getDataFilterProyects()
{
    $listProyects = array();
    $location = sanitize_text_field($_POST['location']);
    $year = sanitize_text_field($_POST['year']);
    $tag = sanitize_text_field($_POST['tag']);
    if ($_POST['location'] || $_POST['year'] || $_POST['tag']) {
        $proyectos = new WP_Query(
            array(
                "post_type" => "projects",
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'location',
                        'field'    => 'slug',
                        'terms'    => $location
                    ),
                    array(
                        'taxonomy' => 'year-projects',
                        'field'    => 'slug',
                        'terms'    => $year,
                    ),
                    array(
                        'taxonomy' => 'tags-projects',
                        'field'    => 'slug',
                        'terms'    => $tag
                    ),
                ),
            )
        );
    } else {
        $proyectos = new WP_Query(
            array(
                "post_type" => "projects",
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC'
            )
        );
    }
?>
        <?php if ($proyectos->have_posts()) : ?>
            <?php while ($proyectos->have_posts()) : $proyectos->the_post(); ?>
                <?php
                $proyecto = new ProyectGeneralFilter();
                $imageGallery = get_field('image_gallery');
                $proyecto->nombre = (get_the_title()) ? get_the_title() : "";
                $proyecto->imagen = (!empty($imageGallery)) ? $imageGallery['url'] : "";
                $proyecto->link = (get_the_permalink()) ? get_the_permalink() : "";
                array_push($listProyects, $proyecto);
                ?>
            <?php
            endwhile;
            echo json_encode($listProyects);
            ?>
        <?php else : ?>
            <?php http_response_code(404); ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
<?php
    die();
}
class ProyectGeneralFilter
{
    public $nombre = "";
    public $imagen = "";
    public $link = "";
}
?>