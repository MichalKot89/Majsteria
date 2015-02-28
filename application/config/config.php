<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */

error_reporting(E_ALL);
#error_reporting(E_ERROR);
ini_set("display_errors", 1);

/**
 * Configuration for: Base URL
 * This is the base url of our app. if you go live with your app, put your full domain name here.
 * if you are using a (different) port, then put this in here, like http://mydomain:8888/subfolder/
 * Note: The trailing slash is important!
 */
#define('URL', 'http://majsteri.vot.pl/');
define('URL', 'http://localhost:8888/');

define('subcategory_SEO', 'znajdz');

/**
 * Configuration for: Folders
 * Here you define where your folders are. Unless you have renamed them, there's no need to change this.
 */
define('LIBS_PATH', 'application/libs/');
define('CONTROLLER_PATH', 'application/controllers/');
define('MODELS_PATH', 'application/models/');
define('VIEWS_PATH', 'application/views/');
// don't forget to make this folder writable via chmod 775 or 777 (?)
// the slash at the end is VERY important!
define('AVATAR_PATH', 'public/avatars/');

/**
 * Configuration for: Additional login providers: Facebook
 * Self-explaining. The FACEBOOK_LOGIN_PATH is the controller-action where the user is redirected to after getting
 * authenticated via Facebook. Leave it like that unless you know exactly what you do.
 */
define('FACEBOOK_LOGIN', true);
define('FACEBOOK_LOGIN_APP_ID', '1554442274815536');
define('FACEBOOK_LOGIN_APP_SECRET', '7759d24f2d818033b0e49e0cbd11cf9a');
define('FACEBOOK_LOGIN_PATH', 'login/loginWithFacebook');
define('FACEBOOK_REGISTER_PATH', 'login/registerWithFacebook');

/**
 * Configuration for: Avatars/Gravatar support
 * Set to true if you want to use "Gravatar(s)", a service that automatically gets avatar pictures via using email
 * addresses of users by requesting images from the gravatar.com API. Set to false to use own locally saved avatars.
 * AVATAR_SIZE set the pixel size of avatars/gravatars (will be 44x44 by default). Avatars are always squares.
 * AVATAR_DEFAULT_IMAGE is the default image in public/avatars/
 */
define('USE_GRAVATAR', false);
define('AVATAR_SIZE', 168);
define('AVATAR_JPEG_QUALITY', 85);
define('AVATAR_DEFAULT_IMAGE', 'default.jpg');

/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is,
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development .127.0.0.1 is fine, but when deploying you should
 * change this to your real domain, like '.mydomain.com' ! The leading dot makes the cookie available for
 * sub-domains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see php.net/manual/en/function.setcookie.php
 */
// 1209600 seconds = 2 weeks
define('COOKIE_RUNTIME', 1209600);
// the domain where the cookie is valid for, for local development ".127.0.0.1" and ".localhost" will work
// IMPORTANT: always put a dot in front of the domain, like ".mydomain.com" !
#define('COOKIE_DOMAIN', '.majsteri.vot.pl');
define('COOKIE_DOMAIN', 'localhost');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, type etc.
 *
 * database type
 * define('DB_TYPE', 'mysql');
 * database host, usually it's "127.0.0.1" or "localhost", some servers also need port info, like "127.0.0.1:8080"
 * define('DB_HOST', '127.0.0.1');
 * name of the database. please note: database and database table are not the same thing!
 * define('DB_NAME', 'login');
 * user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT
 * By the way, it's bad style to use "root", but for development it will work
 * define('DB_USER', 'root');
 * The password of the above user
 * define('DB_PASS', 'xxx');
 */

define('DB_TYPE', 'mysql');
#define('DB_HOST', 'sql.s20.vdl.pl');
define('DB_HOST', 'localhost');
define('DB_NAME', 'majsteri_main');
define('DB_USER', 'majsteri_main');
define('DB_PASS', 'ZwlTkzCk');

/*
Nazwa bazy:	majsteri_main
Host do połączenia:	sql.s20.vdl.pl
User:	majsteri_main
Hasło:	maniekbaza1251
*/

/**
 * Configuration for: Hashing strength
 * This is the place where you define the strength of your password hashing/salting
 *
 * To make password encryption very safe and future-proof, the PHP 5.5 hashing/salting functions
 * come with a clever so called COST FACTOR. This number defines the base-2 logarithm of the rounds of hashing,
 * something like 2^12 if your cost factor is 12. By the way, 2^12 would be 4096 rounds of hashing, doubling the
 * round with each increase of the cost factor and therefore doubling the CPU power it needs.
 * Currently, in 2013, the developers of this functions have chosen a cost factor of 10, which fits most standard
 * server setups. When time goes by and server power becomes much more powerful, it might be useful to increase
 * the cost factor, to make the password hashing one step more secure. Have a look here
 * (@see https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
 * in the BLOWFISH benchmark table to get an idea how this factor behaves. For most people this is irrelevant,
 * but after some years this might be very very useful to keep the encryption of your database up to date.
 *
 * Remember: Every time a user registers or tries to log in (!) this calculation will be done.
 * Don't change this if you don't know what you do.
 *
 * To get more information about the best cost factor please have a look here
 * @see http://stackoverflow.com/q/4443476/1114320
 */

// the hash cost factor, PHP's internal default is 10. You can leave this line
// commented out until you need another factor then 10.
define("HASH_COST_FACTOR", "10");

/**
 * Configuration for: Email server credentials
 *
 * Here you can define how you want to send emails.
 * If you have successfully set up a mail server on your linux server and you know
 * what you do, then you can skip this section. Otherwise please set EMAIL_USE_SMTP to true
 * and fill in your SMTP provider account data.
 *
 * An example setup for using gmail.com [Google Mail] as email sending service,
 * works perfectly in August 2013. Change the "xxx" to your needs.
 * Please note that there are several issues with gmail, like gmail will block your server
 * for "spam" reasons or you'll have a daily sending limit. See the readme.md for more info.
 *
 * define("PHPMAILER_DEBUG_MODE", 0);
 * define("EMAIL_USE_SMTP", true);
 * define("EMAIL_SMTP_HOST", 'ssl://smtp.gmail.com');
 * define("EMAIL_SMTP_AUTH", true);
 * define("EMAIL_SMTP_USERNAME", 'xxxxxxxxxx@gmail.com');
 * define("EMAIL_SMTP_PASSWORD", 'xxxxxxxxxxxxxxxxxxxx');
 * define("EMAIL_SMTP_PORT", 465);
 * define("EMAIL_SMTP_ENCRYPTION", 'ssl');
 *
 * It's really recommended to use SMTP!
 */
// Options: 0 = off, 1 = commands, 2 = commands and data, perfect to see SMTP errors, see the PHPMailer manual for more
define("PHPMAILER_DEBUG_MODE", 0);
// use SMTP or basic mail() ? SMTP is strongly recommended
define("EMAIL_USE_SMTP", true);
// name of your host
define("EMAIL_SMTP_HOST", 'smtpcorp.com');
// leave this true until your SMTP can be used without login
define("EMAIL_SMTP_AUTH", true);
// SMTP provider username
define("EMAIL_SMTP_USERNAME", 'a225.waldek@gmail.com');
// SMTP provider password
define("EMAIL_SMTP_PASSWORD", 'manieksmtp1251');
// SMTP provider port
define("EMAIL_SMTP_PORT", 465);
// SMTP encryption, usually SMTP providers use "tls" or "ssl", for details see the PHPMailer manual
define("EMAIL_SMTP_ENCRYPTION", 'ssl');

/**
 * Configuration for: Email content data
 *
 * php-login uses the PHPMailer library, please have a look here if you want to add more
 * config stuff: @see https://github.com/PHPMailer/PHPMailer
 *
 * As email sending within your project needs some setting, you can do this here:
 *
 * Absolute URL to password reset action, necessary for email password reset links
 * define("EMAIL_PASSWORD_RESET_URL", "http://127.0.0.1/php-login/4-full-mvc-framework/login/passwordReset");
 * define("EMAIL_PASSWORD_RESET_FROM_EMAIL", "noreply@example.com");
 * define("EMAIL_PASSWORD_RESET_FROM_NAME", "My Project");
 * define("EMAIL_PASSWORD_RESET_SUBJECT", "Password reset for PROJECT XY");
 * define("EMAIL_PASSWORD_RESET_CONTENT", "Please click on this link to reset your password:");
 *
 * absolute URL to verification action, necessary for email verification links
 * define("EMAIL_VERIFICATION_URL", "http://127.0.0.1/php-login/4-full-mvc-framework/login/verify/");
 * define("EMAIL_VERIFICATION_FROM_EMAIL", "noreply@example.com");
 * define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
 * define("EMAIL_VERIFICATION_SUBJECT", "Account Activation for PROJECT XY");
 * define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account:");
 */
define("EMAIL_PASSWORD_RESET_URL", URL . "login/verifypasswordreset");
define("EMAIL_PASSWORD_RESET_FROM_EMAIL", "no-reply@majsteria.pl");
define("EMAIL_PASSWORD_RESET_FROM_NAME", "Majsteria.pl");
define("EMAIL_PASSWORD_RESET_SUBJECT", "Zmiana hasla w serwisie Majsteria.pl");
define("EMAIL_PASSWORD_RESET_CONTENT", "Proszę kliknąć w poniższy link, aby ustawić nowe hasło: ");

define("EMAIL_VERIFICATION_URL", URL . "login/verify");
define("EMAIL_VERIFICATION_FROM_EMAIL", "no-reply@majsteria.pl");
define("EMAIL_VERIFICATION_FROM_NAME", "Majsteria.pl");
define("EMAIL_VERIFICATION_SUBJECT", "Witaj w Majsterii!");
define("EMAIL_VERIFICATION_CONTENT", "Aktywuj swoje konto klikając w poniższy link: ");

define("THANKS_FOR_SIGNING_UP", "Dziękujemy za założenie konta na Majsteria.pl");
define("WE_GENERATED_RANDOM_PASSWORD_FOR_YOU", "Dla Twojej wygody wygenerowaliśmy Ci losowe hasło. Możesz je zmienić w każdej chwili.");
define("YOUR_PASSWORD_IS", "Twoje hasło to: ");

/**
 * Configuration for: Error messages and notices
 *
 * In this project, the error messages, notices etc are all-together called "feedback".
 */
define("FEEDBACK_UNKNOWN_ERROR", "Wystąpił błąd");
define("FEEDBACK_PASSWORD_WRONG_3_TIMES", "Nieprawidłowe hasło zostało wprowadzone 3 lub więcej razy. Poczekaj 30 sekund, aby spróbować ponownie");
define("FEEDBACK_ACCOUNT_NOT_ACTIVATED_YET", "Twoje konto nie zostało jeszcze aktywowane. Kliknij w link aktywacyjny w wiadomości, którą od nas otrzymałeś/aś ");
define("FEEDBACK_PASSWORD_WRONG", "Nieprawidłowe hasło");
define("FEEDBACK_USER_DOES_NOT_EXIST", "Nie znaleziono użytkownika");
// The "login failed"-message is a security improved feedback that doesn't show a potential attacker if the user exists or not
define("FEEDBACK_LOGIN_FAILED", "Logowanie nie powiodło się");
define("FEEDBACK_USERNAME_FIELD_EMPTY", "Nie wprowadzono nazwy użytkownika");
define("FEEDBACK_PASSWORD_FIELD_EMPTY", "Nie wprowadzono hasła");
define("FEEDBACK_EMAIL_FIELD_EMPTY", "Nie wprowadzono adresu e-mail i hasła");
define("FEEDBACK_EMAIL_AND_PASSWORD_FIELDS_EMPTY", "Nie wprowadzono adresu e-mail");
define("FEEDBACK_USERNAME_SAME_AS_OLD_ONE", "Ta nazwa użytkownika jest taka sama jak ta której obecnie używasz. Prosimy wybrać inną");
define("FEEDBACK_USERNAME_ALREADY_TAKEN", "Wybrana nazwa jest zajęta przez innego ućytkownika. Prosimy wybrać inną");
define("FEEDBACK_USER_EMAIL_ALREADY_TAKEN", "Ten adres e-mail jest już zarejestrowany w naszym serwisie. Proszę się najpierw zalogować lub użyć innego e-maila.");
define("FEEDBACK_USERNAME_CHANGE_SUCCESSFUL", "Nazwa użytkownika zmieniona pomyślnie");
define("FEEDBACK_USERNAME_AND_PASSWORD_FIELD_EMPTY", "Nie wprowadzono hasła i nazwy użytkownika");
define("FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN", "Niedozwolone elementy użyte przy tworzeniu nazwy użytkownika. Prosimy używać wyłacznie liter alfabetu angielskiego oraz liczb");
define("FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN", "Nieprawidłowy format adresu e-mail");
define("FEEDBACK_EMAIL_SAME_AS_OLD_ONE", "Podany adres e-mail aktualnie w użyciu");
define("FEEDBACK_EMAIL_CHANGE_SUCCESSFUL", "Adres e-mail zmieniony pomyślnie");
define("FEEDBACK_CAPTCHA_WRONG", "Wprowadzony kod captcha jest nieprawidłowy");
define("FEEDBACK_PASSWORD_REPEAT_WRONG", "Wprowadzone hasła są niezgodne");
define("FEEDBACK_PASSWORD_TOO_SHORT", "Hasło musi zawierać minimum 6 znaków");
define("FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG", "Nazwa użytkownika nie może mieć mniej niż 2 i więcej niż 64 znaki");
define("FEEDBACK_EMAIL_TOO_LONG", "Adres e-mail nie może mieć więcej niż 64 znaki");
define("FEEDBACK_ACCOUNT_SUCCESSFULLY_CREATED", "Twoje konto zostało utworzone pomyślnie. Na podany adres e-mail wysłana została wiadomość z linkiem aktywacyjnym");
define("FEEDBACK_VERIFICATION_MAIL_SENDING_FAILED", "Nie wysłano wiadomości z linkiem aktywacyjnym. Konto nie zostało utworzone");
define("FEEDBACK_ACCOUNT_CREATION_FAILED", "Rejestracja nie powodła się. Proszę spróbowac ponownie");
define("FEEDBACK_VERIFICATION_MAIL_SENDING_ERROR", "Link aktywacyjny nie został wysłany");
define("FEEDBACK_VERIFICATION_MAIL_SENDING_SUCCESSFUL", "Link aktywacyjny został wysłany");
define("FEEDBACK_ACCOUNT_ACTIVATION_SUCCESSFUL", "Aktywacja powiodła się. Możesz teraz zalogować się na swoje konto");
define("FEEDBACK_ACCOUNT_ACTIVATION_FAILED", "Numer identyfikacyjny weryfikacji konta nie został znaleziony...");
define("FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL", "Ładowanie avatara powiodło się");
define("FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE", "Tylko formaty JPEG i PNG akceptowane");
define("FEEDBACK_AVATAR_UPLOAD_TOO_SMALL", "Obraz musi mieć 100x100 pixeli lub więcej");
define("FEEDBACK_AVATAR_UPLOAD_TOO_BIG", "Plik nie może przekraczać 5 MB");
define("FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE", "Folder z avatarem jest niedostępny");
define("FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED", "Ładowanie obrazu nie powiodło się");
define("FEEDBACK_PASSWORD_RESET_TOKEN_FAIL", "Nie udało się zapisać tokena do bazy danych");
define("FEEDBACK_PASSWORD_RESET_TOKEN_MISSING", "Brak tokenu resetowania hasła");
define("FEEDBACK_PASSWORD_RESET_MAIL_SENDING_ERROR", "Link resetujący hasło nie został wysłany z powodu: ");
define("FEEDBACK_PASSWORD_RESET_MAIL_SENDING_SUCCESSFUL", "Wiadomość resetująca hasło została wysłana na Twój adres email");
define("FEEDBACK_PASSWORD_RESET_LINK_EXPIRED", "Link resetujący hasło stracił ważność. Link jest ważny przez godzinę od momentu otrzymania");
define("FEEDBACK_PASSWORD_RESET_COMBINATION_DOES_NOT_EXIST", "Użytkownik/Kod weryfikacyjny nie istnieje");
define("FEEDBACK_PASSWORD_RESET_LINK_VALID", "Link resetujący hasło jest aktywny. Proszę zmienić hasło teraz");
define("FEEDBACK_PASSWORD_CHANGE_SUCCESSFUL", "Zmiana hasła powiodła się");
define("FEEDBACK_PASSWORD_CHANGE_FAILED", "Zmiana hasła zakończona niepowodzeniem");
define("FEEDBACK_ACCOUNT_UPGRADE_SUCCESSFUL", "Upgrade konta powiódł się");
define("FEEDBACK_ACCOUNT_UPGRADE_FAILED", "Upgrade konta nie powiódł się");
define("FEEDBACK_ACCOUNT_DOWNGRADE_SUCCESSFUL", "Downgrade konta powiódł się");
define("FEEDBACK_ACCOUNT_DOWNGRADE_FAILED", "Downgrade konta nie powiódł się");
define("FEEDBACK_NOTE_CREATION_FAILED", "Tworzenie notatki nie powiodło się");
define("FEEDBACK_NOTE_EDITING_FAILED", "Edycja notatki nie powiodła się");
define("FEEDBACK_NOTE_DELETION_FAILED", "Usuwanie notatki nie powiodło się");
define("FEEDBACK_COOKIE_INVALID", "Zapamiętane hasło jest nieprawidłowe");
define("FEEDBACK_COOKIE_LOGIN_SUCCESSFUL", "Logowanie z użyciem zapamiętanego hasła powiodło się");
define("FEEDBACK_FACEBOOK_LOGIN_NOT_REGISTERED", "Nie masz jeszcze konta na Majsterii. Zarejestruj się teraz");
define("FEEDBACK_FACEBOOK_EMAIL_NEEDED", "Musisz podac swój adres e-mail, aby się zarejestrować");
define("FEEDBACK_FACEBOOK_UID_ALREADY_EXISTS", "Numer ID Twojego konta Facebook istnieje już w naszej bazie");
define("FEEDBACK_FACEBOOK_DATA_NOT_AVAILABLE", "Brak dostępu. Prosimy potwierdzić dostęp w oknie autoryzacyjnym facebooka");
define("FEEDBACK_FACEBOOK_EMAIL_ALREADY_EXISTS", "Adres e-mail powiązany z Twoim kontem Facebook istnieje juz w naszej bazie");
define("FEEDBACK_FACEBOOK_USERNAME_ALREADY_EXISTS", "Nazwa użytkownika powiązana z Twoim kontem Facebook istnieje już w naszej bazie");
define("FEEDBACK_FACEBOOK_REGISTER_SUCCESSFUL", "Rejestracja konta z Facebookiem zakończona pomyślnie");
define("FEEDBACK_FACEBOOK_OFFLINE", "Nie możemy połączyć się z serwerami Facebooka. Możliwe, że Facebook jest chwilowo offline..");
define("MEMBERSHIP_UPGRADE_FAILED", "Upgrade członkostwa nie powiódł się");
define("FEEDBACK_EDIT_SUCCESSFUL", "Twoje zmiany zostały zapisane");
define("FEEDBACK_EDIT_UNSUCCESSFUL", "Zapisanie zmian nie powiodło się");
define("BUSINESS_CREATED", "Biznes został dodany pomyślnie. Możesz teraz składać oferty na zlecenia");
define("BUSINESS_NOT_CREATED", "Dodanie biznesu nie powiodło się");
define("PROJECT_CREATED", "Zlecenie zostało dodane pomyślnie. Oferty od fachowców powinny pojawić się wkrótce");
define("PROJECT_NOT_CREATED", "Dodanie zlecenia nie powiodło się");
define("PROJECT_OFFER_CREATED", "Oferta została złożona pomyślnie");
define("PROJECT_OFFER_NOT_CREATED", "Złożenie oferty nie powiodło się");
