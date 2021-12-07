<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div id="main-container">
      <div id="form-alta">
        <h2>Register</h2>

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/register"
                >
            <label for="" class="lbl">DNI:</label><br />
            <input class="inp" type="text" placeholder="Username *" name="dni"><br />
            <span class="invalidFeedback">
                <?php echo $data['dniError']; ?>
            </span><br />
            <label for="" class="lbl">Nombre:</label><br />
            <input class="inp" type="text" placeholder="Nombre *" name="nombre"><br />
            <span class="invalidFeedback">
                <?php echo $data['nombreError']; ?>
            </span><br />
            <label for="" class="lbl">Apellidos:</label><br />
             <input class="inp" type="text" placeholder="Apellidos *" name="apellidos"><br />
            <span class="invalidFeedback">
                <?php echo $data['apellidosError']; ?>
            </span><br />
            <label for="" class="lbl">Correo Electronico:</label><br />
            <input class="inp" type="email" placeholder="Email *" name="email"><br />
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span><br />
            <label for="" class="lbl">Contraseña:</label><br />
            <input class="inp" type="password" placeholder="Password *" name="password"><br />
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span><br />
            <label for="" class="lbl">Confirmar Contraseña:</label><br />
            <input class="inp" type="password" placeholder="Confirm Password *" name="confirmPassword"><br />
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span><br />
            <label for="" class="lbl">Borrado:</label><br />
             <input class="inp" type="number" placeholder="Borrado *" name="borrado">
            <span class="invalidFeedback"><br />
                <?php echo $data['borradoError']; ?>
            </span><br />

            <button id="c-usuario" type="submit" value="submit">Submit</button>

            
        </form>
    </div>
</div>
