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
        Update accion
    </h1>

    <form
    action="<?php echo URLROOT; ?>/acciones/update/<?php echo $data['accion']->id ?>" method="POST">
        <div class="form-item">
            <input
                type="number"
                name="id"
                value="<?php echo $data['accion']->id ?>">

            <span class="invalidFeedback">
                <?php echo $data['idError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input
                type="text"
                name="nombre"
                value="<?php echo $data['accion']->nombre ?>">

            <span class="invalidFeedback">
                <?php echo $data['nombreError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input
                type="text"
                name="descripcion"
                value="<?php echo $data['accion']->descripcion ?>">

            <span class="invalidFeedback">
                <?php echo $data['descripcionError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input
                type="number"
                name="borrado"
                value="<?php echo $data['accion']->borrado ?>">

            <span class="invalidFeedback">
                <?php echo $data['borradoError']; ?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
