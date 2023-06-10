<div class="bloque-sobremi" id="portafolioSobreMi">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col col-12 col-md-6 order-md-2">
                <div class="px-3">
                    <?php
                    if ($this->titulo) {
                    ?>
                        <h2 class="h1 mb-3 title"><?php echo $this->titulo; ?></h2>
                    <?php } ?>
                    <?php
                    if ($this->texto) {
                    ?>
                        <div class="mb-4 texto-wisyng"><?php echo $this->texto; ?></div>
                    <?php } ?>
                    <div class="d-none d-md-block">
                        <a href="<?php echo get_the_permalink(40); ?>" class="btn-main font-button">Conocer más</a>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-6 order-md-1">
                <?php
                if (!empty($this->img)) {
                    $urlImg = $this->img['url'];
                ?>
                    <div class="img-container">
                        <img src="<?php echo $urlImg; ?>" alt="<?php echo imagenesAlt($this->img) ?>">
                    </div>
                <?php } ?>
            </div>
            <div class="col col-12 d-md-none">
                <a href="<?php echo get_the_permalink(40); ?>" class="btn-main font-button w-full">Conocer más</a>
            </div>
            <?php
            if ($this->texto2) {
            ?>
                <div class="col col-12 col-md-10 col-lg-6 order-md-3">
                    <div class="texto-wisyng mt-4 mt-xl-5"><?php echo $this->texto2; ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>