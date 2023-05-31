<div class="bloque-banner">
    <div class="content-banner">
        <?php 
        if(!empty($this->img)){
            $urlImg = $this->img['url'];
        ?>
        <div class="img-fondo" style="background-image: url('<?php echo $urlImg ?>') ;">
        </div>
        <?php }?>
        <div class="container">
            <div class="row">
                <div class="col col-md-6 col-lg-5">
                    <?php 
                    if($this->titulo){
                    ?>
                    <h1 class="title mb-3"><?php echo $this->titulo; ?></h1>
                    <?php }?>
                    <?php 
                    if($this->texto){
                    ?>
                    <h4 class="subtitle mb-3"><?php echo $this->texto; ?></h4>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>