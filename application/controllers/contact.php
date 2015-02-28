<?php

/**
 * Class Contact
 * This controller is used to 
 */
class Contact extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens when you move to /Contact/index in your app.
     * Shows a contact form
     */
    function index()
    {
        if(isset($_SESSION['user_id'])) {
            $user_info_model = $this->loadModel('UserInfo');
            $this->view->user_info = $user_info_model->getUserInfo($_SESSION['user_id']);
            if($this->view->user_info) {
                $this->view->first_name = $this->view->user_info->first_name;
            }
            else {
                $this->view->first_name = '';
            }

            $overview_model = $this->loadModel('Overview');
            $user = $overview_model->getUserProfile($_SESSION['user_id']);
            $this->view->user_email = $user->user_email;
        }
        else {
            $this->view->first_name = '';
            $this->view->user_email = '';
        }
        $this->view->render('contact/index');
    }

    /**
     * This method controls what happens when you move to /contact/send in your app.
     * Sends an email to us
     */
    function send()
    {
        $_SESSION['contact_msg'] = $_POST['contact_msg'];
        if (!isset($_POST["captcha"]) OR ($_POST["captcha"] != $_SESSION['captcha'])) {
            $_SESSION["feedback_negative"][] = FEEDBACK_CAPTCHA_WRONG;
            header('location: ' . URL . 'kontakt');
            exit(1);
        }

        // create PHPMailer object (this is easily possible as we auto-load the according class(es) via composer)
        $mail = new PHPMailer;

        // please look into the config/config.php for much more info on how to use this!
        if (EMAIL_USE_SMTP) {
            // set PHPMailer to use SMTP
            $mail->IsSMTP();
            // useful for debugging, shows full SMTP errors, config this in config/config.php
            $mail->SMTPDebug = PHPMAILER_DEBUG_MODE;
            // enable SMTP authentication
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            // enable encryption, usually SSL/TLS
            if (defined('EMAIL_SMTP_ENCRYPTION')) {
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            // set SMTP provider's credentials
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->Port = EMAIL_SMTP_PORT;
        } else {
            $mail->IsMail();
        }

        // fill mail with data
        $mail->From = $_POST['user_email'];
        $mail->FromName = $_POST['first_name'];;
        $mail->AddAddress(CONTACT_EMAIL);
        $mail->Subject = 'Zapytanie z formularza kontaktowego';
        $mail->IsHTML(false);
        $mail->Body = $_POST['contact_msg'];

        // final sending and check
        if($mail->Send()) {
            $_SESSION["feedback_positive"][] = CONTACT_EMAIL_SENT;
            if(isset($_SESSION['user_id'])) {
                header('location: ' . URL . 'dashboard/index');
            }
            else {
                header('location: ' . URL . 'kontakt');
            }
        } else {
            $_SESSION["feedback_negative"][] = CONTACT_EMAIL_NOT_SENT . $mail->ErrorInfo;
            header('location: ' . URL . 'kontakt');
        }
    }
}
