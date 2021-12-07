<div id="header">
    <ul class="nav">
    
        <li>
            <a href="<?php echo URLROOT; ?>/index" class="sbm">Index</a>
        </li>
        
            <li><a href="" class="sbm">Gestion</a>
            <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/acciones" class="sbm">CRUD Acciones</a>
        </li>
        </ul>
        <li id="iniciar-ses" style="float:right" id="in-ses">
            <?php if(isset($_SESSION['dni'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
    
