<div class="container" style="position: relative;">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
<?php /*
    <div class="login-default-box">
        <h1>Login</h1>
        <form action="<?php echo URL; ?>login/login" method="post">
                <label>Username (or email)</label>
                <input type="text" name="user_name" required />
                <label>Password</label>
                <input type="password" name="user_password" required />
                <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                <label class="remember-me-label">Keep me logged in (for 2 weeks)</label>
                <input type="submit" class="login-submit-button" />
        </form>
        <a href="<?php echo URL; ?>login/register">Register</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>
    </div>

    <?php if (FACEBOOK_LOGIN == true) { ?>
    <div class="login-facebook-box">
        <h1>or</h1>
        <a href="<?php echo $this->facebook_login_url; ?>" class="facebook-login-button">Log in with Facebook</a>
    </div>
    <?php } ?>
*/ ?>
<div style="width: 270px; margin-left: auto; margin-right: auto; margin-top:20px;">

<div style="width: 240px; margin-left: auto; margin-right: auto; ">
  <a class="btn btn-block btn-social btn-facebook" href="<?php echo $this->facebook_login_url; ?>">
    <i class="fa fa-facebook"></i> Zaloguj się z Facebookiem
  </a>
</div>
<div style="text-align: center; margin-top: 20px;">
      lub
</div>

<form class="form-signin" role="form" action="<?php echo URL; ?>login/login" method="post">
        <h2 class="form-signin-heading">Podaj email i hasło</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="user_rememberme" value="remember-me"> Pamiętaj mnie
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
      </form>
<div style="text-align: center; margin-top: 10px;">
      <a href="<?php echo URL; ?>login/requestpasswordreset">Nie pamiętam hasła</a>
</div>
</div>
</div>

