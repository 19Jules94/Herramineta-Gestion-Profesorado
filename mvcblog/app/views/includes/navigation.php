<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Index</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/acciones">CRUD Acciones</a>
        </li>
        
        <li class="btn-login">
            <?php if(isset($_SESSION['dni'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
