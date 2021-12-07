<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="center">
      
        <div class="container">
           <label for="show" class="close-btn fas fa-times" title="close"></label>
           <div class="text">
              Iniciar Sesion
           </div>
    <p>Que aun no estas registrado? <a href="<?php echo URLROOT; ?>/users/register">Create una cuenta jefe, clickando aqui</a></p>
        <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
            <div class="data">
                <label>DNI:</label>
            <input type="text" placeholder="Username *" name="dni">
            <span class="invalidFeedback">
                <?php echo $data['dniError']; ?>
            </span><br />
            </div>
            <div class="data">
                <label>Contraseña:</label>
            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span><br />
            </div>
            <div class="btn">
                 <div class="inner"></div>
            <button id="submit" type="submit" value="submit">Submit</button>
            </div>
            </div>
        </form>
    </div>
</div>
