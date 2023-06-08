<?php
$bloquePie = get_field('pie_de_pagina', 'option');
$titulo = $bloquePie['titulo_pie'];
$texto = $bloquePie['parrafo_pie'];
$bloqueContacto = get_field('contacto', 'option');
$correo = $bloqueContacto['correo_general'];
$redes = $bloqueContacto['redes_sociales'];
$numeroWhats = $bloqueContacto['numero_de_whatsapp'];
?>
<footer>
    <div class="container">
        <div class="d-flex flex-column list-text-pie">
            <div class="img-footer">
                <img src="<?php theme_url(); ?>/assets/images/food.png" alt="food">
            </div>
            <?php
            if ($titulo) {
            ?>
                <h2 class="title-footer mb-3"><?php echo $titulo; ?></h2>
            <?php } ?>
            <?php
            if ($texto) {
            ?>
                <h3 class="sub-footer mb-3"><?php echo $texto; ?></h3>
            <?php } ?>
            <?php
            if ($correo) {
            ?>
                <a href="<?php echo "mailto:".$correo; ?>" class="correo-footer h4"><?php echo $correo; ?></a>
            <?php } ?>
        </div>
        <?php
        if ($redes) {
            $youtube = $redes['youtube'];
            $facebook = $redes['facebook'];
            $instagram = $redes['instagram'];
            $linkedin = $redes['linkedin'];
        ?>
            <h3 class="mb-3 mt-4 title-socials">Sígueme en mis redes sociales</h3>
            <ul class="list-socials">
                <?php 
                if($youtube){
                ?>
                <li class="hover-youtube">
                    <a href="<?php echo $youtube; ?>" target="_blank">
                        <?php
                        smk_get_template_part(
                            'template-parts/iconos/youtube.php',
                            array()
                        );
                        ?>
                    </a>
                </li>
                <?php }?>
                <?php 
                if($facebook){
                ?>
                <li class="hover-facebook">
                    <a href="<?php echo $facebook; ?>" target="_blank">
                        <?php
                        smk_get_template_part(
                            'template-parts/iconos/facebook.php',
                            array()
                        );
                        ?>
                    </a>
                </li>
                <?php }?>
                <?php 
                if($instagram){
                ?>
                <li class="hover-instagram">
                    <a href="<?php echo $instagram; ?>" target="_blank">
                        <?php
                        smk_get_template_part(
                            'template-parts/iconos/instagram.php',
                            array()
                        );
                        ?>
                    </a>
                </li>
                <?php }?>
                <?php 
                if($linkedin){
                ?>
                <li class="hover-linkedin">
                    <a href="<?php echo $linkedin; ?>" target="_blank">
                        <?php
                        smk_get_template_part(
                            'template-parts/iconos/facebook.php',
                            array()
                        );
                        ?>
                    </a>
                </li>
                <?php }?>
                <?php 
                if($numeroWhats){
                    $telefonoWhats = telCorrect($numeroWhats);
                ?>
                <li class="hover-whatsapp">
                    <a href="<?php echo "https://api.whatsapp.com/send?phone=52" . $telefonoWhats; ?>" target="_blank">
                        <?php
                        smk_get_template_part(
                            'template-parts/iconos/whatsapp.php',
                            array()
                        );
                        ?>
                    </a>
                </li>
                <?php }?>
            </ul>
        <?php } ?>
        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start justify-content-md-between mt-4">
            <h4 class="mb-2 text-copy">© All Rights Reserved</h4>
            <h4 class="mb-0 text-copy">Website made with love</h4>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>