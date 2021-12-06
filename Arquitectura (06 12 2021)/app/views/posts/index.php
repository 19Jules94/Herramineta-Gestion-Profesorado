<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/posts/create">
            Create
        </a>
    <?php endif; ?>

    <?php foreach($data['accion'] as $accion): ?>
        <div class="container-item">
            <?php if(isset($_SESSION['dni']) 
            //&& $_SESSION['user_id'] == $post->user_id): ?>
                <a
                    class="btn orange"
                    href="<?php echo URLROOT . "/posts/update/" . $accion->id ?>">
                    Update
                </a>
                <form action="<?php echo URLROOT . "/posts/delete/" . $accion->id ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="btn red">
                </form>
            <?php endif; ?>
            <h2>
                <?php echo $accion->nombre; ?>
            </h2>

            <h3>
                <?php echo 'Created on: ' . date('F j h:m', strtotime($accion->created_at)) ?>
            </h3>

            <p>
                <?php echo $accion->descripcion ?>
            </p>

            <p>
                <?php echo $accion->borrado ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>
