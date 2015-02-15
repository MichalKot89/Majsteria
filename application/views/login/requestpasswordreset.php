<div class="container">
    <h1>Zmiana hasła</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <!-- request password reset form box -->
    <form method="post" action="<?php echo URL; ?>login/requestpasswordreset_action" name="password_reset_form">
        <label for="password_reset_input_email">
            Podaj swój adres email, na który otrzymasz link do zmiany hasła:
        </label>
        <input id="password_reset_input_email" class="password_reset_input" type="text" name="user_email" required />
        <input type="submit"  name="request_password_reset" value="Zresetuj hasło" />
    </form>
</div>
