<div class="bloque-sobremi">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col col-12 col-md-6 col-lg-6">
                <?php
                if (!empty($this->img)) {
                    $urlImg = $this->img['url'];
                ?>
                <div class="img-container">
                    <img src="<?php echo $urlImg; ?>" alt="<?php echo imagenesAlt($this->img) ?>">
                </div>
                <?php } ?>
            </div>
            <div class="col col-12 col-md-6 col-lg-6">
                <div class="px-3">
                    <?php
                    if ($this->titulo) {
                    ?>
                        <h2 class="h1 mb-3"><?php echo $this->titulo; ?></h2>
                    <?php } ?>
                    <?php
                    if ($this->texto) {
                    ?>
                        <div class="mb-4"><?php echo $this->texto; ?></div>
                    <?php } ?>
                    <a href="<?php echo get_the_permalink(40); ?>" class="btn-main font-button">Conocer más</a>
                </div>
            </div>
        </div>
    </div>
</div>