
    
    
    
    <div class="container-fluid">
    <div class="row">
    <ul class="rslides" id="slider4">
    <li><img src="public/images/slide1.jpg" alt=""></li>
    <li><img src="public/images/slide2.jpg" alt=""></li>
    <li><img src="public/images/slide3.jpg" alt=""></li>
    </ul>
    
    <div class="container" <?php /*style="margin-top: -590px;"*/ ?>>
    <div class="row">
    <div class="col-md-5 col-sm-5 form-bg pull-right">
    <div class="org-div">
    <h2>Poszukujesz fachowca?</h2>
    </div>
   
    <div class="col-md-12 col-sm-12">
    <ul class="nav nav-pills nav-stacked list-style">
    <li><span>1</span> Powiedz nam czego potrzebujesz</li>
    <li><span>2</span> Poczekaj na błyskawiczną wycenę</li>
    <li><span>3</span> Wybierz najlepszą ofertę</li>
    </ul>

    <form action="<?php echo URL; ?>get_quotes/index" method="post" name="post_project_form">
        <select class="form-control full-width drop input-text" name="subcategory_id" required>
            <option value>Wybierz kategorie</option>
            <?php
                foreach($this->getAllSubcategories() as $subcategory) {
                    echo '<option value="'.$subcategory->subcategory_id.'">' . $subcategory->name.'</option>';
                } 
            ?>
        </select>
<?php /*
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
     */ ?>   
        <input type="name" class="form-control input-text enter" id="post_code" name="post_code"  placeholder="Podaj swój kod pocztowy">
        <button type="submit" class="btn btn-default blue-btn">DODAJ ZLECENIE</button>
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
    <img src="public/images/cap.png" alt="" class="img-responsive">
    </div>
    <div class="col-md-9 col-sm-10 text-div">
    Dołącz do grona zadowolonych klientów
    </div>
    </div>
    
    <div class="col-md-12 col-sm-12 arrow">
    <img src="public/images/arrow.png" alt="" class="img-responsive arrow">
    </div>
    </div>
    <div class="row">
    <div class="col-md-12 col-sm-12">
    <div class="col-md-4 col-sm-4 blk">
    <div class="img-div"><img src="public/images/img1.png" alt="" class="img-responsive"></div>
    <div class="img-text"><span class="bold">Sprawdzeni</span> fachowcy</span>
    <span class="img-sml">Największa sieć profesjonalistów.</span>
    </div>
    </div>
    
    <div class="col-md-4 col-sm-4 blk">
    <div class="img-div"><img src="public/images/img2.png" alt="" class="img-responsive"></div>
    <div class="img-text">Ponad <span class="bold">50 kategorii.</span>
    <span class="img-sml">Znajdziemy Ci fachowca do każdego problemu.</span>
    </div>
    </div>
    
    <div class="col-md-4 col-sm-4 blk border-none">
    <div class="img-div"><img src="public/images/img3.png" alt="" class="img-responsive"></div>
    <div class="img-text">Codziennie <span class="bold">świeże zlecenia</span>
    <span class="img-sml"> Coraz więcej Polaków oszczędza z Majsterią!</span>
    </div>
    </div>
    
    <div class="col-md-12 col-sm-12 shadow">
    <img src="public/images/shadow.png" alt="" class="img-responsive">
    </div>
    </div>
    </div>
    
        
    <div class="row">
    <div class="col-md-12 col-sm-12 top">
    <div class="col-md-5 col-sm-5 about">
    <h3>Witaj na Majsterii</h3>
    <img src="public/images/about-img.png" alt="" class="img-responsive">

    <span>
    Majsteria to serwis skupiający ekspertów z różnych dziedzin, na terenie całej Polski. 
    Tutaj szybko uzyskasz pomoc przy pracach remontowych, budowlanych czy innych, wymagających specjalistycznej wiedzy. 
    Publikacja zlecenia jest niezobowiązująca i bezpłatna, nie ponosisz więc żadnego ryzyka. Majsteria oszczędza Twój czas i pieniądze!
    </span>
    <button type="button" class="btn btn-default navbar-btn get-now">DODAJ ZLECENIE</button>
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
            <img src="public/images/shadow.png" alt="" class="img-responsive">
        </div>
    </div>
    
    
    <!--
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
    -->
    
    <div class="row featured">
    <div class="col-md-12 colsm-12 top">
    <div class="col-md-8 col-sm-8 padd-null">
    <h2>Kategorie</h2>
    <p>Wybieraj spośród setek profesjonalistów</p>
    </div>
    
    <div class="col-md-2 col-sm-2 pull-right pdd">
    <button type="button" class="btn btn-default navbar-btn featured-btn">zobacz więcej kategorii</button>    
    </div>
    </div>    
    
    <div class="row left-mr1">
    <div class="col-md-12 col-sm-12 padd-null">
    <div class="col-md-6 col-sm-5 white-box">
    <div class="col-md-6 col-sm-6 font1">Malarstwo</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>znajdz/malarze">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Wiaty garażowe</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Pergole</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Architekci</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Kuchnia</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Wiaty garażowe</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Pergole</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Architekci</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Wiaty garażowe</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="#">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    <div class="col-md-6 col-sm-6 white-box">
    <div class="col-md-6 col-sm-6 font1">Ogrodnictwo</div>
    <div class="col-md-5 col-sm-5 pull-right org-font"><a href="<?php echo URL;?>znajdz/ogrodnicy">Cennik</a> | <a href="<?php echo URL;?>get_quotes/index">Wyceń koszty</a></div>
    </div>
    
    
    </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="container-fluid org-bg">
    <div class="container">
    <div class="row padd-null">
    <div class="col-md-12 col-sm-12">
    <div class="col-md-6 col-sm-6 left-org">
    <h2>Przyłącz się do dyskusji na Facebooku</h2>
    <p>Dołącz do dyskusji na temat najnowszych trendów w Twojej profesji, oraz zainspiruj się zdjęciami prac Twoich kolegów po fachu! </p>
    <div class="fb-like-box" data-href="https://www.facebook.com/Majsteria" 
        data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"
        data-height="190"
        style="background: white;"></div>

    </div>
    
    <div class="col-md-5 col-sm-5 right-org pull-right padd-null">
    <h2>Najpopularniejszy post dnia</h2>
    <div class="fb-post" data-href="https://www.facebook.com/Majsteria/posts/783047508438633" 
        data-width="500" data-show-border="true"></div>
    </div>
    </div>
    </div>
    </div>
    </div>