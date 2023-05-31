<?php
function getDataProyectsAll()
{
    $listProyects = array();
    $proyectos = new WP_Query(
        array(
            "post_type" => "projects",
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
      		'order' => 'ASC'
        )
    );
?>
        <?php if ($proyectos->have_posts()) : ?>
            <?php while ($proyectos->have_posts()) : $proyectos->the_post(); ?>
                <?php
                $proyecto = new ProyectGeneral();
                $imageGallery = get_field('image_gallery');
                $proyecto->nombre = (get_the_title()) ? get_the_title() : "";
                $proyecto->imagen = (!empty($imageGallery)) ? $imageGallery['url'] : "";
                $proyecto->link = (get_the_permalink()) ? get_the_permalink() : "";
                array_push($listProyects, $proyecto);
                ?>
            <?php
            endwhile;
            $filterTemplate = get_field('filter_template', 95);
            $proyectData = new dataBack();
            $proyectData->listProyectos = $listProyects;
            $proyectData->filterTemplate = $filterTemplate;
            echo json_encode($proyectData);
            ?>
        <?php else : ?>
            <?php http_response_code(404); ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
<?php
    die();
}
class ProyectGeneral
{
    public $nombre = "";
    public $imagen = "";
    public $link = "";
}

class dataBack
{
    public $listProyectos = array();
    public $filterTemplate = array();
}
?>
