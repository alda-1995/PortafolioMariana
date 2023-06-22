<nav>
    <div class="container">
        <div class="d-flex justify-content-between main-content align-items-center">
            <a href="<?php blog_url(); ?>" class="logo-content">
                <?php
                $logo = get_field('logo', 'option');
                if (!empty($logo)) {
                    $urlLogo = $logo['url'];
                ?>
                    <img src="<?php echo $urlLogo; ?>" alt="logo img">
                <?php } ?>
                <h3 class="title-logo mx-3">Mariana Gutiérrez</h3>
            </a>
            <button class="d-flex-buttons openMenu d-md-none" type="button">
                <div class="hamburger hamburger--collapse" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </button>
            <ul class="list-menu d-none d-md-flex">
                <li>
                    <a href="#" data-id="portafolioBlock" class="font-button link-menu link-menu-scroll">Portfolio</a>
                </li>
                <li>
                    <a href="#" data-id="portafolioSobreMi" class="font-button link-menu link-menu-scroll">About me</a>
                </li>
                <li>
                    <a href="<?php echo get_the_permalink(40); ?>" class="btn-main font-button pink">Get in touch</a>
                </li>
            </ul>
        </div>
    </div>
</nav>