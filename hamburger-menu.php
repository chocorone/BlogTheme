<div class="header__inner">
    <h1 class="header__title header-title">
    </h1>
    <nav class="header__nav nav" id="js-nav">
        <ul class="nav__items nav-items">
            <?php
            $defaults = array(
                'global' => 'グローバルメニュー',
            )
            ?>
            <?php wp_nav_menu($defaults); ?>
        </ul>
    </nav>

    <button class="header__hamburger hamburger" id="js-hamburger">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>

<script type="text/javascript">
    const ham = document.querySelector('#js-hamburger');
    const nav = document.querySelector('#js-nav');

    ham.addEventListener('click', function() {

        ham.classList.toggle('active');
        nav.classList.toggle('active');

    });
</script>