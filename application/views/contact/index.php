<div class="container">
<h1>Skontaktuj się z nami</h1>
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

<div style="width: 350px; margin-left: auto; margin-right: auto; margin-top:20px; text-align: center;">

    <form class="form-signin" role="form" action="<?php echo URL; ?>contact/send" method="post">

        <div class="form-group">
            <label for="first_name">Imię</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $this->first_name; ?>" required />
        </div>
        <div class="form-group">
            <label for="user_email">Adres email</label>
            <input type="email" name="user_email" class="form-control" id="user_email" name="user_email" value="<?php echo $this->user_email; ?>" required />
        </div>
        <div class="form-group">
            <label>Wiadomość</label>
            <textarea class="form-control" rows="5" name="contact_msg" required><?php echo isset($_SESSION['contact_msg'])?$_SESSION['contact_msg']:''; ?></textarea>
        </div>
        <label for="inputCatcha" class="sr-only">Kod z obrazka</label>
        <input type="text" name="captcha" id="inputCaptcha" class="form-control" placeholder="Kod z obrazka" required="" />
        <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
        <!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
        <img style="margin-top: 5px;" id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
        <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
            <!-- quick & dirty captcha reloader -->
            <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Przeładuj kod ]</a>
        </span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Wyślij wiadomość</button>
    </form>
</div>
</div>