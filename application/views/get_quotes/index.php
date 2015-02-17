    <div class="container">


    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    	<div class="row">
        	<div class="col-md-12 col-sm-12">
            	<div class="col-md-12 col-sm-12 quotes-head">
                	<h1>Znajdowanie specjalistów nigdy nie było tak szybkie i proste!</h1>
                    <hr />
                    <span>
                    	Nie trać czasu na dzwonienie i szukanie specjalistów. 
                        Majsteria łączy Polaków z lokalnymi fachowcami poprzez prosty i bezpłatny system składania ofert. <br />
                        Porównując fachowców i ich ceny zawsze znajdziesz najkorzystniejszą dla siebie ofertę. To proste jak raz, dwa, trzy...
                    </span>
                </div>
              <div class="col-md-12 col-sm-12 quote-mid-sec">
               	  <div class="col-md-3 col-sm-3 padd-null quote-mid">
                   	<div class="center-block shape-no">
                   	  <h1>1</h1>
                    </div>
                    <div class="center-block">
                   		<img src="<?php echo URL; ?>public/images/first.png" class="img-responsive center-block"> 
                        <p>Powiedz nam czego potrzebujesz</p>
                    </div>
                    </div>
                  <div class="col-md-3 col-sm-3 padd-null quote-mid">
                    	<div class="center-block shape-no">
                        	<h1>2</h1>
                        </div>
                        <div class="center-block">
                   			<img src="<?php echo URL; ?>public/images/second.png" class="img-responsive center-block"> 
                            <p>Specjaliści składają Ci oferty</p>
                    	</div>
                    </div>
                  <div class="col-md-3 col-sm-3 padd-null">
                    	<div class="center-block shape-no">
                        	<h1>3</h1>
                        </div>
                        <div class="center-block quote-mid1">
                   			<img src="<?php echo URL; ?>public/images/third.png" class="img-responsive center-block"> 
                            <p>Ty wybierasz najlepszego specjalistę</p>
                    	</div>
                    </div>
                  <div class="col-md-3 col-sm-3 padd-null box-styling">
               	  	<div class="get_quotes">
			<p>Bezpłatna publikacja zlecenia</p>
			<p>Błyskawiczne wyceny</p>
			<p>Brak konieczności wyboru</p>
			<p id="get_quotes">Nad czym się jeszcze zastanawiasz?</p>
			</div>
               	  	<img src="<?php echo URL; ?>public/images/right-banner.png" class="center-block img-responsive" title="Prosty wybór fachowców!" alt="prosty wybor fachowcow">
                  </div>
                </div> 
                <div class="col-md-12 col-sm-12">
           	    	<img src="<?php echo URL; ?>public/images/quote-shadow.png" class="center-block img-responsive" alt="quote-shadow"> 
                </div>
<?php require VIEWS_PATH . '_templates/add_project_form.php'; ?>
          </div>
    	</div>	
    </div>
