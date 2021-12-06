<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Register</h2>

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/register"
                >
            <input type="text" placeholder="Username *" name="data[dni]">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

             <input type="text" placeholder="Nombre *" name="data[nombre]">
            <span class="invalidFeedback">
                <?php echo $data['nombreError']; ?>
            </span>

             <input type="text" placeholder="Apellidos *" name="data[apellidos]">
            <span class="invalidFeedback">
                <?php echo $data['apellidosError']; ?>
            </span>

            <input type="email" placeholder="Email *" name="data[email]">
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>

            <input type="password" placeholder="Password *" name="data[password]">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="data[confirmPassword]">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

             <input type="number" placeholder="Borrado *" name="data[borrado]">
            <span class="invalidFeedback">
                <?php echo $data['borradoError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
        </form>
    </div>
</div>
