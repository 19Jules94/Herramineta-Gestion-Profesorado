<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="text">
    <?php if(isLoggedIn()): ?>
        <a class="btn" href="<?php echo URLROOT; ?>/acciones/create">
            Create
        </a>
    <?php endif; ?>
<h2>Gestion Acciones</h2>
<table class="tabla-gestion">
    <tr>
          <th>Accion</th>
          <th>Descripcion</th>
          <th>Borrado</th>  
          </tr>
          <tr>
    <?php foreach($data['accion'] as $accion): ?>

            <?php //if(isset($_SESSION['dni']) 
            //&& $_SESSION['user_id'] == $post->user_id): ?>
            <?php //endif; ?>
            <td>
                <?php echo $accion->nombre; ?>
            </td>
            <td>
                <?php echo $accion->descripcion ?>
            </td>
            <td>
                <?php echo $accion->borrado ?>
            </td>
            <td>
             <a
                    class="btn orange"
                    href="<?php echo URLROOT . "/acciones/update/" . $accion->id ?>">
                    Update
                </a>
                <form action="<?php echo URLROOT . "/acciones/delete/" . $accion->id ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="btn red">
                </form>
            </td>
            </tr>
        </div>
    <?php endforeach; ?>
</div>
