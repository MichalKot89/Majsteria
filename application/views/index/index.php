
    
    
    
    <div class="container-fluid">
    <div class="row">
    <ul class="rslides" id="slider4">
    <li><img src="public/images/slide1.jpg" alt="fachowiec online"></li>
    <li><img src="public/images/slide2.jpg" alt="specjalista online"></li>
    <li><img src="public/images/slide3.jpg" alt="złota rączka online"></li>
    </ul>
    
    <div class="container" <?php /*style="margin-top: -590px;"*/ ?>>
    <div class="row">
    <div class="col-md-5 col-sm-5 form-bg pull-right">
    <div class="org-div">
    <h2>POTRZEBUJESZ ZLECEŃ?</h2>
    </div>
   
    <div class="col-md-12 col-sm-12">
    <ul class="nav nav-pills nav-stacked list-style">
    <li><span>1</span> Bezpłatnie dodaj swoją firmę</li>
    <li><span>2</span> Pozwól klientom się odnaleźć</li>
    <li><span>3</span> Zwiększaj przychody swojego biznesu</li>
    </ul>

    <form action="<?php echo URL; ?>fachowcy" method="post" name="post_project_form">
<?php /*
        <select class="form-control full-width drop input-text" name="subcategory_id" required>
            <option value>Wybierz kategorie</option>
            <?php
                foreach($this->getAllSubcategories() as $subcategory) {
                    echo '<option value="'.$subcategory->subcategory_id.'">' . $subcategory->name.'</option>';
                } 
            ?>
        </select>

        <div class="dropdown">
        <button class="btn btn-default dropdown-toggle drop" type="button" id="dropdownMenu1" data-toggle="dropdown">Wybierz kategorię
        <span class="caret pull-right mrg-top"></span>
        </button>
        <ul class="dropdown-menu dropdown-link full-width" role="menu" aria-labelledby="dropdownMenu1">
        <?php
            foreach($this->getAllSubcategories() as $subcategory) {
              echo '<li role="presentation"><a role="menuitem" tabindex="-1">' . $subcategory->name.'</a></li>';
            } 
        ?>
        </ul>
        </div>
       
        <input type="name" class="form-control input-text enter" id="post_code" name="post_code"  placeholder="Podaj swój kod pocztowy">
*/ ?> 
        <button type="submit" class="btn btn-default blue-btn">DODAJ SWOJĄ FIRMĘ</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="container">
    <div class="row">
    <div class=" col-md-12 col-sm-12">
    <div class="row">
    <div class="col-md-11 col-sm-11 mid">
    <div class="col-md-1 col-sm-2 cap">
    <img src="public/images/cap.png" alt="sprawdzeni fachowcy" class="img-responsive">
    </div>
    <div class="col-md-9 col-sm-10 text-div">
    Dołącz do grona zadowolonych klientów
    </div>
    </div>
    
    <div class="col-md-12 col-sm-12 arrow">
    <img src="public/images/arrow.png" alt="usługi hydrauliczne" class="img-responsive arrow">
    </div>
    </div>
    <div class="row">
    <div class="col-md-12 col-sm-12">
    <div class="col-md-4 col-sm-4 blk">
    <div class="img-div"><img src="public/images/img1.png" alt="usługi elektryczne" class="img-responsive"></div>
    <div class="img-text"><span class="bold">Sprawdzeni</span> fachowcy</span>
    <span class="img-sml">Największa sieć profesjonalistów.</span>
    </div>
    </div>
    
    <div class="col-md-4 col-sm-4 blk">
    <div class="img-div"><img src="public/images/img2.png" alt="zatrudnię fachowca" class="img-responsive"></div>
    <div class="img-text">Ponad <span class="bold">50 kategorii.</span>
    <span class="img-sml">Znajdziemy Ci fachowca do każdego problemu.</span>
    </div>
    </div>
    
    <div class="col-md-4 col-sm-4 blk border-none">
    <div class="img-div"><img src="public/images/img3.png" alt="zatrudnię majstra" class="img-responsive"></div>
    <div class="img-text">Codziennie <span class="bold">świeże zlecenia</span>
    <span class="img-sml"> Coraz więcej Polaków oszczędza z Majsterią!</span>
    </div>
    </div>
    
    <div class="col-md-12 col-sm-12 shadow">
    <img src="public/images/shadow.png" alt="szukam specjalisty" class="img-responsive">
    </div>
    </div>
    </div>
    
        
    <div class="row">
    <div class="col-md-12 col-sm-12 top">
    <div class="col-md-5 col-sm-5 about">
    <h3>Witaj na Majsterii</h3>
    <img src="public/images/about-img.png" alt="fachowiec szybko" class="img-responsive">

    <p>
    Majsteria to serwis skupiający ekspertów z różnych dziedzin, na terenie całej Polski. 
    Tutaj szybko uzyskasz pomoc przy pracach remontowych, budowlanych czy innych, wymagających specjalistycznej wiedzy. 
    Publikacja zlecenia jest niezobowiązująca i bezpłatna, nie ponosisz więc żadnego ryzyka. Majsteria oszczędza Twój czas i pieniądze!
    </p>
    <a href="<?php echo URL; ?>fachowcy"><button type="button" class="btn btn-default navbar-btn get-now">DODAJ FIRMĘ</button></a>
    </div>
    
    <div class="col-md-7 col-sm-7 recent">
    <h3>Wydarzenia</h3>
    <p>Majsteria jest najczęściej odwiedzanym potralem o profilu budowlano-remontowym. Coraz więcej Polaków korzysta z naszej bazy najlepszych fachowców. </p>
    
    <ul class="nav nav-tabs" role="tablist" id="myTab">
    <li class="active"><a href="#home" role="tab" data-toggle="tab" class="recm">Rekomendacje</a></li>
    
    <li><a href="#profile" role="tab" data-toggle="tab" class="jobs">Zlecenia</a></li>
    </ul>
    
    <div class="tab-content tab-bg">
    <div class="tab-pane active " id="home">
    <div class="row">
    <div class="col-md-11 col-sm-11 white-bg">
    <div class="col-md-7 col-sm-7 pad">
    Gosia z Wrocławia poleca serwis Majsteria.pl! Dzisiaj, 09:12
    </div>
    <div class="col-md-1 col-sm-1 pull-right user">
    <i class="fa fa-user user-i"></i>
    </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-11 col-sm-11 white-bg">
    <div class="col-md-7 col-sm-7 pad">
    Marcin z Gdańska poleca serwis Majsteria.pl! Dzisiaj, 08:33
    </div>
    <div class="col-md-1 col-sm-1 pull-right user">
    <i class="fa fa-user user-i"></i>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="tab-pane" id="profile">
    <div class="row">
    <div class="col-md-11 col-sm-11 white-bg">
    <div class="col-md-7 col-sm-7 pad">
    Jerzy z Warszawy poszukuje hydraulika. Dzisiaj, 10:12
    </div>
    <div class="col-md-1 col-sm-1 pull-right user">
    <i class="fa fa-user"></i>
    </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-11 col-sm-11 white-bg">
    <div class="col-md-7 col-sm-7 pad">
    Jakub ze Szczecina poszukuje geodety. Dzisiaj, 09:31
    </div>
    <div class="col-md-1 col-sm-1 pull-right user">
    <i class="fa fa-user"></i>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script>
    (function () {
    $('#myTab a:first').tab('show')
    })
    </script>

        <div class="col-md-12 col-sm-12 shadow">
            <img src="public/images/shadow.png" alt="zlecenia dla firm remontowych" class="img-responsive">
        </div>
    </div>
    
    
    <?php /*
    <div class="container padd-null wd-768">
    <div class="row featured">
    <div class="col-md-12 colsm-12 top">
    <div class="col-md-7 col-sm-7 padd-null">
    <h2>Wyróżnione Artykuły</h2>
    <p>Wszystko co musisz wiedziec o swoim projekcie</p>
    </div>
    
    <div class="col-md-2 col-sm-2 pull-right pdd">
    <button type="button" class="btn btn-default navbar-btn featured-btn">Więcej artykułów</button>    
    </div>
    </div>
    
    
    <div class="row left-mr">
    <div class="col-md-12 col-sm-12">
    <div class="col-md-4 col-sm-4 featured-list">
    <img src="public/images/f-img.png" alt="" class="img-responsive">
    <h2>Landscaping</h2>
    <p><span class="sm">5 wskazówek zanim rozpoczniesz planowanie swojego ogrodu</span><br>
     Zanim wezwiesz projektanta ogrodu, zapoznaj się z kluczowymi informacjami na temat kształtowania terenu. 
    </p>
    <div class="col-md-11 col-sm-12 padd-null">
    <div class="col-md-6 col-sm-11 padd-null date">
    <p>Marz 19, 2013 przez Kasię.N</p>
    </div>
    <div class="col-md-6 col-sm-11 padd-null">
    <button type="button" class="btn btn-default navbar-btn f-btn pull-right">czytaj więcej</button>
    </div>    
    </div>
    </div>
    
    <div class="col-md-4 col-sm-4 featured-list">
    <img src="public/images/f-img1.png" alt="" class="img-responsive">
    <h2>Renowacja Łazienki</h2>
    <p><span class="sm">Ile Kosztuje Renowacja Łazienki?</span><br>
    Dowiedz się dlaczego koszty remontu łazienki różnią się od siebie
    </p>
    <div class="col-md-11 col-sm-12 padd-null">
    <div class="col-md-8 col-sm-11 padd-null date">
    <p>Sty 12, 2014 przez Anię.B</p>
    </div>
    <div class="col-md-4 col-sm-11 padd-null">
    <button type="button" class="btn btn-default navbar-btn f-btn pull-right">czytaj więcej</button>
    </div>    
    </div>
    </div>
    
    <div class="col-md-4 col-sm-4 featured-list1 padd-null">
    <img src="public/images/f-img3.png" alt="" class="img-responsive">
    <h2>Renowacja</h2>
    <p><span class="sm">5 Wskazówek Taniego Remontu Łazienki</span><br><br>
    Remont łazienki wcale nie musi byc drogi!
    </p>
    <div class="col-md-11 col-sm-12 padd-null">
    <div class="col-md-8 col-sm-11 padd-null date">
    <p></p>
    </div>
    <div class="col-md-4 col-sm-11 padd-null">
    <button type="button" class="btn btn-default navbar-btn f-btn pull-right">czytaj więcej</button>
    </div>    
    </div>
    </div>
    
    <div class="col-md-12 col-sm-12 shadow">
    <img class="img-responsive" alt="" src="public/images/shadow.png">
    </div>
    
    
    

    </div>
    </div>
    </div>
    
    
    <div class="row featured">
    <div class="col-md-12 colsm-12 top">
    <div class="col-md-8 col-sm-8 padd-null">
    <h2>Inspiracje dla Twojego Domu</h2>
    <p>Przeglądaj zdjęcia i obrazy, a swoje ulubione zachowaj w 'Tablicy Inspiracji' </p>
    </div>
    
    <div class="col-md-2 col-sm-2 pull-right pdd">
    <button type="button" class="btn btn-default navbar-btn featured-btn">Zobacz więcej zdjęc</button>    
    </div>
    </div>    
    
    <div class="row left-mr">
    <div class="col-md-4 col-sm-11 featured-list">
    <img src="public/images/f-img.png" alt="" class="img-responsive">
    <button type="button" class="btn btn-default navbar-btn center-btn">Kuchnia</button>  
    </div>
        
    <div class="col-md-4 col-sm-11 featured-list">
    <img src="public/images/f-img1.png" alt="" class="img-responsive">
    <button type="button" class="btn btn-default navbar-btn center-btn">Łazienka</button>  
    </div>
    
    <div class="col-md-4 col-sm-11 featured-list">
    <img src="public/images/f-img3.png" alt="" class="img-responsive">
    <button type="button" class="btn btn-default navbar-btn center-btn">Ogród</button>    
    </div>
    </div>
    
    <div class="col-md-12 col-sm-12 shadow">
    <img class="img-responsive" alt="" src="public/images/shadow.png">
    </div>
    </div>
    */ ?>
    
    <div class="row featured">
    <div class="col-md-12 colsm-12 top">
    <div class="col-md-8 col-sm-8 padd-null">
    <h2>Kategorie</h2>
    <p>Wybieraj spośród setek profesjonalistów</p>
    </div>
    
    <div class="col-md-2 col-sm-2 pull-right pdd">
    <a href="<?php echo URL; ?>kategorie"><button type="button" class="btn btn-default navbar-btn featured-btn">więcej kategorii</button></a>  
    </div>
    </div>    
    
    <div class="row left-mr1">
    <div class="col-md-12 col-sm-12 padd-null">
    <div class="col-md-6 col-sm-5 white-box">
    <div class="col-md-6 col-sm-6 font1">Betoniarze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/betoniarze">Zlecenia betoniarskie</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Posadzkarze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/posadzkarze">Zlecenia posadzkarskie</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Elektrycy</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/elektrycy">Zlecenia dla elektryków</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Geodeci</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/geodeci">Zlecenia dla geodetów</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Brukarze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/brukarze">Zlecenia brukarskie</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Instalacje grzewcze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/izolacje">Zlecenia grzewcze</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Szklarze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/szklarze">Zlecenia szklarskie</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Stolarze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/stolarze">Zlecenia stolarskie</a></div>
    </div>
    
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Malarze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/malarze">Zlecenia malarskie</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Dekarze</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>kategorie/dekarze">Zlecenia dekarskie</a></div>
    </div>
    
    
    </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <?php /*
    <div class="container-fluid org-bg">
    <div class="container">
    <div class="row padd-null">
    <div class="col-md-12 col-sm-12">
    <div class="col-md-6 col-sm-6 left-org">
    <h2>Przyłącz się do dyskusji na Facebooku</h2>
    <p>Dołącz do dyskusji na temat najnowszych trendów w Twojej profesji, oraz zainspiruj się zdjęciami prac Twoich kolegów po fachu! </p>
   
    <div class="fb-like-box" data-href="http://www.facebook.com/majsteriapl" 
        data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"
        data-height="190"
        style="background: white;"></div>

    </div>

<div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>

    <div class="col-md-5 col-sm-5 right-org pull-right padd-null">
    <h2>Najpopularniejszy post dnia</h2>

<div class="fb-post" data-href="http://www.facebook.com/majsteriapl/posts/724045407710912:0" data-width="250" data-show-border="true">
    <div class="fb-xfbml-parse-ignore"><a href="http://www.facebook.com/majsteriapl/posts/724045407710912:0">Post</a> by <a href="http://www.facebook.com/majsteriapl">Majsteria.pl</a>.</div></div>
  <?php /*
    <div class="fb-post" data-href="https://www.facebook.com/Majsteria/posts/724045407710912" 
        data-width="500" data-show-border="true"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    */ ?>
