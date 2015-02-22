
<div class="container">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

<div style="width: 270px; margin-left: auto; margin-right: auto; margin-top:20px; text-align: center;">

<div style="width: 250px; margin-left: auto; margin-right: auto; ">
  <a class="btn btn-block btn-social btn-facebook" href="<?php echo $this->facebook_login_url; ?>">
    <i class="fa fa-facebook"></i> Zarejestruj się z Facebookiem
  </a>
</div>
<div style="text-align: center; margin-top: 20px;">
      lub
</div>

    <form class="form-signin" role="form" action="<?php echo URL; ?>login/register_action" method="post">
        <h2 class="form-signin-heading">Podaj email i hasło</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Adres email" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="user_password" id="inputPassword" class="form-control" placeholder="Hasło" required="">
        <label for="inputCatcha" class="sr-only">Kod z obrazka</label>
        <?php if($this->isCaptchaNeeded) { ?>
        <input type="text" name="captcha" id="inputCaptcha" class="form-control" placeholder="Kod z obrazka" required="" />
        <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
        <!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
        <img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
        <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
            <!-- quick & dirty captcha reloader -->
            <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Przeładuj kod ]</a>
        </span>
        <?php } ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Załóż konto</button>
    </form>
    <div style="font-size: 12px; color: grey; text-align: left; margin-top: 10px;">
    Klikając 'Załóż konto' potwierdzasz, że akceptujesz
    <span id="terms"><a href="<?php echo URL; ?>public/html/regulamin.html" onClick="return popup(this, 'Regulamin', 800, 600)">regulamin</a></span>
    serwisu Majsteria.pl
    </div>
</div>
</div>
</div>