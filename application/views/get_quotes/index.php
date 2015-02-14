    <div class="container">


    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    	<div class="row">
        	<div class="col-md-12 col-sm-12">
            	<div class="col-md-12 col-sm-12 quotes-head">
                	<h1>Find Tradespeople And Home Services the Easy Way</h1>
                    <hr />
                    <span>
                    	Don't waste time doing the ring around, get 3 reliable local 
                        businesses to follow you up to quote on your job. <br />
                        We have been connecting Australians with local businesses for 
                        over 10 years and our free get quote service makes this as easy as 1,2,3...
                    </span>
                </div>
              <div class="col-md-12 col-sm-12 quote-mid-sec">
               	  <div class="col-md-3 col-sm-3 padd-null quote-mid">
                   	<div class="center-block shape-no">
                   	  <h1>1</h1>
                    </div>
                    <div class="center-block">
                   		<img src="<?php echo URL; ?>public/images/first.png" class="img-responsive center-block"> 
                        <p>Tell us what you need</p>
                    </div>
                    </div>
                  <div class="col-md-3 col-sm-3 padd-null quote-mid">
                    	<div class="center-block shape-no">
                        	<h1>2</h1>
                        </div>
                        <div class="center-block">
                   			<img src="<?php echo URL; ?>public/images/second.png" class="img-responsive center-block"> 
                            <p>Plumbers contact you</p>
                    	</div>
                    </div>
                  <div class="col-md-3 col-sm-3 padd-null">
                    	<div class="center-block shape-no">
                        	<h1>3</h1>
                        </div>
                        <div class="center-block quote-mid1">
                   			<img src="<?php echo URL; ?>public/images/third.png" class="img-responsive center-block"> 
                            <p>You choose the best plumber</p>
                    	</div>
                    </div>
                  <div class="col-md-3 col-sm-3 padd-null box-styling">
               	  	<img src="<?php echo URL; ?>public/images/right-banner.png" class="center-block img-responsive" alt="right-banner">
                  </div>
                </div> 
                <div class="col-md-12 col-sm-12">
           	    	<img src="<?php echo URL; ?>public/images/quote-shadow.png" class="center-block img-responsive" alt="quote-shadow"> 
                </div>
<?php require VIEWS_PATH . '_templates/add_project_form.php'; ?>
          </div>
    	</div>	
    </div>