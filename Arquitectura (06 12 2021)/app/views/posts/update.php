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
    action="<?php echo URLROOT; ?>/posts/update/<?php echo $data['post']->id ?>" method="POST">
        <div class="form-item">
            <input
                type="number"
                name="data[id]"
                value="<?php echo $data['post']->id ?>">

            <span class="invalidFeedback">
                <?php echo $data['idError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input
                type="text"
                name="data[nombre]"
                value="<?php echo $data['post']->nombre ?>">

            <span class="invalidFeedback">
                <?php echo $data['nombreError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input
                type="text"
                name="data[descripcion]"
                value="<?php echo $data['post']->descripcion ?>">

            <span class="invalidFeedback">
                <?php echo $data['descripcionError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input
                type="number"
                name="data[borrado]"
                value="<?php echo $data['post']->v ?>">

            <span class="invalidFeedback">
                <?php echo $data['borradoError']; ?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
