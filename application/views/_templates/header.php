<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if(isset($this->meta_title)) {
        echo '<title>' . $this->meta_title . '</title>';
    }
    else {
        echo '<title>Źródło Sprawdzonych Fachowców - Majsteria.pl</title>';
    }
    if(isset($this->meta_descr)) {
        echo '<meta name="description" content="' . $this->meta_descr . '">';
    }
    else {
        echo '<meta name="description" content="Znajdź pomoc już teraz - powiedz czego potrzebujesz, a wykwalifikowani fachowcy sami Cię znajdą.Dzięki nam szybko i bezpłatnie znajdziesz pomoc eksperta. Dodanie zlecenia jest proste i zajmuje tylko kilka minut. Nasz zespół regularnie monitoruje jakość usług oferowanych w serwisie. Majsteria to również doskonały sposób na dodatkowy zarobek jeśli prowadzisz biznes lub sam wykonujesz specjalistyczne prace.">';
    }
    if(isset($this->meta_keywords)) {
        echo '<meta name="keywords" content="' . $this->meta_keywords . '">';
    }
    else {
        echo '<meta name="keywords" content="Hydraulicy, Ogrodnicy, Szklarze, Stolarze, Mechanicy, Elektrycy, Dacharze">';
    }
    ?>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">

    <!-- multiselect --> 
    <link rel="stylesheet"  href="<?php echo URL; ?>public/css/multi-select.css" media="screen" type="text/css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/responsiveslides.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">
    <?php /*<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>*/ ?>
    <script src="<?php echo URL; ?>public/js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.multi-select.js"></script>
    
    <script>
    // You can also use "$(window).load(function() {"
    $(function () {
    
    // Slideshow 1
    $("#slider1").responsiveSlides({
    maxwidth: 1383,
    speed: 488
    });
    
    // Slideshow 2
    $("#slider2").responsiveSlides({
    auto: false,
    pager: true,
    speed: 300,
    maxwidth: 540
    });
    
    // Slideshow 3
    $("#slider3").responsiveSlides({
    manualControls: '#slider3-pager',
    maxwidth: 540
    });
    
    // Slideshow 4
    $("#slider4").responsiveSlides({
    auto: true,
    pager: false,
    nav: true,
    speed: 500,
    namespace: "callbacks",
    before: function () {
    $('.events').append("<li>before event fired.</li>");
    },
    after: function () {
    $('.events').append("<li>after event fired.</li>");
    }
    });
    
    });
    </script>
    <!-- jQuery autocomplete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script>
  $(function() {
    $( "#post_code" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          //url: "http://gd.geobytes.com/AutoCompleteCity",
          url: "<?php echo URL; ?>application/ajax/list_post_codes.php",
          dataType: "jsonp",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 3,
      change: function (event, ui) {
        if (!ui.item) { this.value = ''; }
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
  });
  </script>

<!-- pop up window js -->
  <script type="text/javascript">
<!--
function popup(mylink, windowname, width, height)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=' + width + ',height=' + height + ',scrollbars=yes');
return false;
}
//-->
</script>

    <!-- Bootstrap -->
    <link href="<?php echo URL; ?>public/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/bootstrap-social.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
<link rel="stylesheet" id="dt-main-css" href="<?php echo URL; ?>public/jquery/main.css" type="text/css" media="all">
<link rel="stylesheet" id="dt-custom.less-css" href="<?php echo URL; ?>public/jquery/custom-febe56f96f.css" type="text/css" media="all">
<link rel="stylesheet" id="dt-media-css" href="<?php echo URL; ?>public/jquery/media.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo URL; ?>public/jquery/jquery_004.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/jquery/jquery-migrate.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/jquery/modernizr.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/jquery/svg-icons.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-5762150-3', 'auto');
  ga('send', 'pageview');

</script>


  </head>
  <body>
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=599337976843978&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <div style="visibility: visible; margin-top: 0px;" class="top-bar-hide" id="top-bar" role="complementary">
    <div class="container-fluid" id="top-bg">
    <div class="container">
    <div class="row">
    <div class="wf-wrap">
    <div class="wf-table wf-mobile-collapsed">
    <div class="wf-td">
    <div class="col-md-6 col-sm-12 padd-null">
    <div class="col-md-12 col-sm-12 btn-group">
    <button type="button" class="btn btn-default bgnone org blank" onclick="location.href='<?php echo URL; ?>get_quotes/index'"><div class="icon icon-comment-1 wht"></div> <a href="<?php echo URL; ?>get_quotes/index">Dodaj zlecenie</a></button>
    <button type="button" class="btn btn-default bgnone org blank" onclick="location.href='<?php echo URL; ?>business/index'"><div class="icon icon-align-justify wht"></div> <a href="<?php echo URL; ?>business/index">Przeglądaj zlecenia</a></button>
    <button type="button" class="btn btn-default dropdown-toggle bgnone org blank2" data-toggle="dropdown">
    <div class="icon icon-flow-cascade wht">
    Kategorie
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">

<?php
    foreach($this->getAllSubcategories() as $subcategory) {
        echo '<li><a href="'.URL.subcategory_SEO.'/' . $subcategory->seo_url .'">' . $subcategory->name.'</a></li>';
    } 
?>
    <li><a href="<?php echo URL; ?>znajdz/all">Pokaż wszystkie</a></li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-6 col-sm-7 nav-ul padd-null">
    <ul class="nav nav-pills">
            <!-- for not logged in users -->
            <?php if (Session::get('user_logged_in') == false):?>
                <li class="white-text" <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/register"><div class="icon icon-lock-open yellow"></div> Zarejestruj się</a>
                </li>
                <li class="white-text" <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index"><div class="icon icon-log-in org wht"></div> Zaloguj się</a>
                </li>
                <li class="white-text"><a href="<?php echo $this->getFacebookLoginUrl(); ?>"><div class="icon icon-social-facebook blue"></div> ZALOGUJ Z FB</a></li>
            <!-- for logged in users -->
            <?php else:?>
                <li class="white-text" <?php if ($this->checkForActiveControllerAndAction($filename, "dashboard/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
                </li>
                <li class="white-text" <?php if ($this->checkForActiveControllerAndAction($filename, "settings/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>settings/index">Ustawienia</a>
                </li>
                <li class="white-text" <?php if ($this->checkForActiveControllerAndAction($filename, "login/logout")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/logout">Wyloguj</a>
                </li>         
            <?php endif; ?>
    
    </ul>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    <span class="act"></span>
    </div>
    
    
    <?php /*
    <div class="container-fluid" id="top-bg">
    <div class="container">
    
    <div class="row">
    <div class="col-md-12 col-sm-12 padd-null">
    <div style="visibility: visible; margin-top: 0px;" class="top-bar-hide" id="top-bar" role="complementary">
    <div class="wf-wrap">
    <div class="wf-table wf-mobile-collapsed">
    <div class="wf-td">
   
    <div class="col-md-6 col-sm-4 padd-null">
    <div class="btn-group">
    <button type="button" class="btn btn-default bgnone blank wht"><div class="icon icon-comment-1 wht"></div> WYCEŃ KOSZTY</button>
    <button type="button" class="btn btn-default bgnone org blank"><div class="icon icon-align-justify wht"></div> Dodaj swój biznes</button>
    
    <div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle bgnone org blank2" data-toggle="dropdown">
    <div class="icon icon-flow-cascade wht"></div> Kategorie
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
    <li><a href="#">Dropdown link</a></li>
    <li><a href="#">Dropdown link</a></li>
    </ul>
    </div>
    </div>
    </div>
 
    </div>
   
    <div class="col-md-6 col-sm-7 padd-null">
    <ul class="nav nav-pills pull-right">
    <li class="grey active"><a href="#"><div class="icon icon-lock-open yellow"></div> Zarejestruj się</a></li>
    <li class="white-text"><a href="#"><div class="icon icon-log-in org wht"></div> Zaloguj się</a></li>
    <li class="white-text"><a href="#"><div class="icon icon-social-facebook blue"></div> ZALOGUJ Z FB</a></li>
    </ul>
    </div>
    
    </div>
    
    </div>
 
    <span class="act"></span>
    </div>
    </div>
    </div>
    </div>
    </div>
    */ ?>
   
    
    <div class="container-fluid" id="light-grey">
    <div class="container">
    <div class="row">
    <div class="col-md-12 col-sm-12 padd-null">
    <div class="col-md-4 col-sm-3 padd-null">
    <div class="logo"><a href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/images/logo.png" alt="" class="img-responsive"></a></div>
    </div>
    
    <?php /*
    <div class="col-md-8 col-sm-9 padd-null right-div">
    <form class="navbar-form navbar-left pull-right" role="search">
    <input type="text" class="form-control input-text input-text2" placeholder="Search by Service or Business Name">
   
  
    <div class="form-group">
    <input type="text" class="form-control input-text" placeholder="All States">
    </div>
    <button type="submit" class="btn btn-default search-btn">SZUKAJ</button>
    </form>
    </div>
    */ ?>
    </div>
    </div>
    </div>
    </div>


<?php /*
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Application</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/public/css/reset.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/public/css/style.css" />
    <!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/public/js/application.js"></script>
</head>
<body>

    <div class="debug-helper-box">
        DEBUG HELPER: you are in the view: <?php echo $filename; ?>
    </div>

    <div class='title-box'>
        <a href="<?php echo URL; ?>">My Application</a>
    </div>

    <div class="header">
        <div class="header_left_box">
        <ul id="menu">
            <li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>index/index">Index</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>help/index">Help</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "overview")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>overview/index">Overview</a>
            </li>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
            </li>
            <?php endif; ?>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "note")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>note/index">My Notes</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "subcategory")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>subcategory/index">Subcategories</a>
            </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">My Account</a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/changeaccounttype">Change account type</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/uploadavatar">Upload an avatar</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername">Edit my username</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Edit my email</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <li <?php if ($this->checkForActiveController($filename, "edytuj")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>note/index">My Notes</a>
            </li>
            
            <!-- for not logged in users -->
            <?php if (Session::get('user_logged_in') == false):?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index">Login</a>
                </li>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/register">Register</a>
                </li>
            <?php endif; ?>
        </ul>
        </div>

        <?php if (Session::get('user_logged_in') == true): ?>
            <div class="header_right_box">
                <div class="namebox">
                    Hello <?php echo Session::get('user_name'); ?> !
                </div>
                <div class="avatar">
                    <?php if (USE_GRAVATAR) { ?>
                        <img src='<?php echo Session::get('user_gravatar_image_url'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } else { ?>
                        <img src='<?php echo Session::get('user_avatar_file'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="clear-both"></div>
    </div>

    */ ?>
