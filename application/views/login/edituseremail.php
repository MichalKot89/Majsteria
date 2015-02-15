<div class="container">
    <h1>Zmień adres email</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form action="<?php echo URL; ?>login/edituseremail_action" method="post">
        <label>Nowy adres email:</label>
        <input type="text" name="user_email" required />
        <input type="submit" value="Zmień" />
    </form>
</div>
