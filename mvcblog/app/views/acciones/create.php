<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container center">
    <h1>
        Crear nueva accion
    </h1>

    <form action="<?php echo URLROOT; ?>/acciones/create" method="POST">
        <div class="form-item">
            <input type="number" name="id" placeholder="Id...">

            <span class="invalidFeedback">
                <?php echo $data['idError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input type="text" name="nombre" placeholder="Nombre...">

            <span class="invalidFeedback">
                <?php echo $data['nombreError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input type="text" name="descripcion" placeholder="Descripcion...">

            <span class="invalidFeedback">
                <?php echo $data['descripcionError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input type="number" name="borrado" placeholder="Borrado...">

            <span class="invalidFeedback">
                <?php echo $data['borradoError']; ?>
            </span>
        </div>
        

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
