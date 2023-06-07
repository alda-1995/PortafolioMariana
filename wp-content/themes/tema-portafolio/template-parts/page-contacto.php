<?php
/*
  Template Name: Portafolio Mariana - Contacto
  Template Post Type: page
*/
?>
<?php get_header(); ?>
<?php
$titulo = get_field('titulo');
$texto = get_field('texto');
$imgSmall = get_field('imagen_pequena');
$imgBig = get_field('imagen_grande');
?>
<div class="bloque-contacto">
  <div class="content-contacto">
    <?php
    if (!empty($imgSmall)) {
      $urlImg = $imgSmall['url'];
    ?>
      <div class="img-fondo d-md-none" style="background-image: url('<?php echo $urlImg ?>');"></div>
    <?php } ?>
    <?php
    if (!empty($imgBig)) {
      $urlImg = $imgBig['url'];
    ?>
      <div class="img-fondo d-none d-md-block" style="background-image: url('<?php echo $urlImg ?>');"></div>
    <?php } ?>
    <div class="container">
      <div class="content-formulario">
        <?php
        if ($titulo) {
        ?>
          <h2 class="title-contacto mb-3"><?php echo $titulo; ?></h2>
        <?php } ?>
        <?php
        if ($texto) {
        ?>
          <h4 class="text-contacto mb-3"><?php echo $texto; ?></h4>
        <?php } ?>
        <div class="container-formulario">
          <div class="form-c-principal">
            <form id="formularioContacto" name="formularioContacto" novalidate>
              <div class="form-input">
                <input class="parrafo" type="text" name="nombre" placeholder="Nombre" required>
              </div>
              <div class="form-input">
                <input class="parrafo" type="email" name="correo" placeholder="Correo" required>
              </div>
              <div class="form-input">
                <input class="parrafo phoneValidationMark" type="text" name="telefono" placeholder="Teléfono" required>
              </div>
              <div class="form-input">
                <textarea class="parrafo" name="mensaje" placeholder="Mensaje"></textarea>
              </div>
              <button type="submit" class="btn-main font-button" id="btnContacto">Envíar</button>
            </form>
          </div>
          <div class="message-error-contact">
            <h4 class="text-contacto mb-3">Se genero un error al enviar. Vuelve a intentarlo.</h4>
            <a href="#" class="btn-main font-button hide-error-contact">Volver a intentar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>