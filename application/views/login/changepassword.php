<div class="container">
    <h1>Ustaw nowe hasło</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <!-- new password form box -->
    <br />
    <form method="post" action="<?php echo URL; ?>login/setnewpassword" name="new_password_form">
        <input type='hidden' name='user_name' value='<?php echo $this->user_name; ?>' />
        <input type='hidden' name='user_password_reset_hash' value='<?php echo $this->user_password_reset_hash; ?>' />
        <label for="reset_input_password_new">
            Nowe hasło (min. 6 znaków)
        </label>
        <input id="reset_input_password_new" class="reset_input" type="password"
               name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br />
        <label for="reset_input_password_repeat">Powtórz nowe hasło</label>
        <input id="reset_input_password_repeat" class="reset_input" type="password"
               name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br />
        <input type="submit"  name="submit_new_password" value="Zatwierdź nowe hasło" />
    </form>
    <br />
    <a href="<?php echo URL; ?>login/index">Wróc do strony logowania</a>
</div>