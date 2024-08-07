<div class="bloque-banner">
    <div class="content-banner">
        <?php
        if (!empty($this->img)) {
            $urlImg = $this->img['url'];
        ?>
            <div class="img-fondo d-none d-lg-block" style="background-image: url('<?php echo $urlImg ?>') ;">
            </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="d-flex flex-column align-items-md-center text-md-center">
                        <?php
                        if ($this->titulo) {
                        ?>
                            <h1 class="title mb-4 animacionTextOpacity target-animation-banner"><?php echo $this->titulo; ?></h1>
                        <?php } ?>
                        <?php
                        if ($this->texto) {
                        ?>
                            <h4 class="subtitle mb-4 animacionTextOpacity target-animation-banner delay1"><?php echo $this->texto; ?></h4>
                        <?php } ?>
                        <div class="animacionTextOpacity target-animation-banner delay2">
                            <a href="<?php echo get_the_permalink(40); ?>" class="w-full btn-main font-button">Get in touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>