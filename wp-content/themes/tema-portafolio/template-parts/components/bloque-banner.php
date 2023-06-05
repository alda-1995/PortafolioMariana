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
                <div class="col col-md-10 col-lg-8 col-xl-6">
                    <div class="d-flex flex-column align-items-md-start">
                        <?php
                        if ($this->titulo) {
                        ?>
                            <h1 class="title mb-3"><?php echo $this->titulo; ?></h1>
                        <?php } ?>
                        <?php
                        if ($this->texto) {
                        ?>
                            <h4 class="subtitle mb-4"><?php echo $this->texto; ?></h4>
                        <?php } ?>
                        <?php
                        if (!empty($this->img)) {
                            $urlImg = $this->img['url'];
                        ?>
                            <div class="mb-4 d-lg-none">
                                <img src="<?php echo $urlImg ?>" alt="banner mobile">
                            </div>
                        <?php } ?>
                        <a href="<?php echo get_the_permalink(40); ?>" class="btn-main font-button">Contáctame</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>