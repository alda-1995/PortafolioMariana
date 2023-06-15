<?php
$bloqueContacto = get_field('contacto', 'option');
$tituloSocials = $bloqueContacto['titulo_redes_sociales'];
$redes = $bloqueContacto['redes_sociales'];
$numeroWhats = $bloqueContacto['numero_de_whatsapp'];
?>
<div class="modal-menu">
    <div class="mb-5">
        <div class="container">
            <div class="header-menu">
                <a href="<?php blog_url(); ?>" class="logo-content">
                    <img src="<?php theme_url(); ?>/assets/images/logo.png" alt="logo img">
                    <h3 class="title-logo mx-3">Mariana Gutiérrez</h3>
                </a>
                <button type="button" class="btn-close closeMenu">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L15 15M1 15L15 1" stroke="#16312D" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="d-flex flex-column align-items-center space">
                <p class="font-menu-title title-modal li-animation">Menu</p>
                <ul class="list-menu-modal">
                    <li>
                        <a href="#" data-id="portafolioBlock" class="links-font-menu link-movil-scroll li-animation">Briefcase</a>
                    </li>
                    <li>
                        <a href="#" data-id="portafolioSobreMi" class="links-font-menu link-movil-scroll li-animation">About me</a>
                    </li>
                </ul>
                <a href="<?php echo get_the_permalink(40); ?>" class="btn-main pink-two links-font-menu li-animation">Get in touch</a>
            </div>
            <?php
            if ($redes) {
                $youtube = $redes['youtube'];
                $facebook = $redes['facebook'];
                $instagram = $redes['instagram'];
                $linkedin = $redes['linkedin'];
                $behance = $redes['behance'];
                $artStation = $redes['art_station'];
            ?>
                <?php 
                if($tituloSocials){
                ?>
                <p class="title-socials font-small-menu opacityAnimation"><?php echo $tituloSocials; ?></p>
                <?php } ?>
                <ul class="list-socials opacityAnimation">
                    <?php
                    if ($facebook) {
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
                    <?php } ?>
                    <?php
                    if ($instagram) {
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
                    <?php } ?>
                    <?php
                    if ($behance) {
                    ?>
                        <li class="hover-behance">
                            <a href="<?php echo $behance; ?>" target="_blank">
                                <?php
                                smk_get_template_part(
                                    'template-parts/iconos/behance.php',
                                    array()
                                );
                                ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($linkedin) {
                    ?>
                        <li class="hover-linkedin">
                            <a href="<?php echo $linkedin; ?>" target="_blank">
                                <?php
                                smk_get_template_part(
                                    'template-parts/iconos/linkedin.php',
                                    array()
                                );
                                ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($artStation) {
                    ?>
                        <li class="hover-art">
                            <a href="<?php echo $artStation; ?>" target="_blank">
                                <?php
                                smk_get_template_part(
                                    'template-parts/iconos/art.php',
                                    array()
                                );
                                ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($youtube) {
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
                    <?php } ?>
                    <?php
                    if ($numeroWhats) {
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
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>