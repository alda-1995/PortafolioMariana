<nav>
    <div class="container">
        <div class="d-flex justify-content-between main-content align-items-center">
            <a href="#" class="logo-content">
                <img src="<?php theme_url(); ?>/assets/images/logo.png" alt="logo img">
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
                    <a href="#" class="font-button">Portafolio</a>
                </li>
                <li>
                    <a href="#" class="font-button">Sobre mí</a>
                </li>
                <li>
                    <a href="<?php echo get_the_permalink(40); ?>" class="btn-main font-button pink">Contáctame</a>
                </li>
            </ul>
        </div>
    </div>
</nav>