    <div class="container">


    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    	<div class="row">
        	<div class="col-md-12 col-sm-12">
            	<div class="col-md-12 col-sm-12 add-business-head">
                	<h1>Dodaj swój biznes i zbieraj zlecenia. Bezpłatnie!</h1>
                </div>
                <div class="col-md-12 col-sm-12 quote-form-style">
           	    	<div class="col-md-12 col-sm-12 padd-null quote-form-inner">
                    	<form action="<?php echo URL; ?>business/create" method="post" name="add_business">
                          <div class="form-group">
                            <div class="radio">
                              Szukasz zleceń jako firma czy osoba prywatna? <br />
                              <label><input type="radio" name="is_company" onchange="showCompanyInput();" value="1">Firma</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="is_company" onchange="hideCompanyInput();" value="0">Osoba prywatna</label>
                            </div>
                          </div>
                          <div class="form-group" id="company_name_div" style="display: none;">
                            <label>Nazwa firmy</label>
                            <input type="name" name="company_name" class="form-control" pattern=".{1,}" 
                              value = "<?php echo isset($_SESSION['company_name'])?$_SESSION['company_name']:''; ?>"  />
                          </div>
                          <div class="form-group">
                            <label>Imię i nazwisko</label>
                            <input type="name" name="first_name" class="form-control" style="width:45%" pattern=".{1,}" 
                              value = "<?php echo isset($_SESSION['first_name'])?$_SESSION['first_name']:''; ?>" 
                              required />
                            <input type="name" name="last_name" class="form-control" style="width: 45%" pattern=".{1,}" 
                              value = "<?php echo isset($_SESSION['last_name'])?$_SESSION['last_name']:''; ?>" 
                              required />
                          </div>
                          <div class="form-group">
                            <label>W czym się specjalizujesz?</label>
                            <select multiple = "multiple" class="form-control" name="subcategories[]" required>
                              <option value="30">Wybierz kategorie</option>
                              <?php
                                  foreach($this->getAllSubcategories() as $subcategory) {
                                      echo '<option value="'.$subcategory->subcategory_id.'">' . $subcategory->name.'</option>';
                                  } 
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Telefon kontaktowy (np. 606555222)</label>
                            <input type="name" name="user_phone" class="form-control" pattern="\+?\d{9,}" 
                              value = "<?php echo isset($_SESSION['user_phone'])?$_SESSION['user_phone']:''; ?>" 
                              required />
                          </div>
                          <?php 
                            // display these only if user is not logged in
                            if(!Auth::isLoggedIn()) { ?>
                          <div class="form-group">
                            <label for="user_email">Adres email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" 
                              value = "<?php echo isset($_SESSION['user_email'])?$_SESSION['user_email']:''; ?>" 
                              required />
                          </div>
                          <?php } ?>

                          <div class="form-group">
                            <label>Kod pocztowy (np. 23-100)</label>
                            <input type="name" id="post_code" class="form-control" name="post_code" 
                              value = "<?php echo isset($_SESSION['post_code'])?$_SESSION['post_code']:''; ?>" 
                              required />
                          </div>

                          <div class="form-group">
                            <label>Kilka słów o Tobie / Twojej firmie (postaraj się! Ten opis pomoże innym zaufać Twoim umiejętnościom)</label>
                            <textarea class="form-control" rows="3" name="descr" required><?php echo isset($_SESSION['descr'])?$_SESSION['descr']:''; ?></textarea>
                          </div>

                          
                          <?php if($this->isCaptchaNeeded) { ?>
                          <div class="form-group">
                            <label>Wpisz kod z obrazka</label> <br />
                            <input type="text" name="captcha" required /> <br />
                            <img id="captcha" src="<?php echo URL; ?>login/showCaptcha" /><a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Przeładuj kod ]</a> <br />
                          </div>
                          <?php } ?>

                          <div class="form-group">
                            <label style="font-size:12px;">By pressing 'Get Quotes Now', you agree to the <br /> 
                            <span id="terms"><a href="#">terms and conditions</a></span> of Majsteria</label>
                            <button class="btn btn-default navbar-btn quote-sub pull-right" type="submit">Wyceń koszty »</button>
                          </div>
                          
                        </form>
                    </div>
                </div>
          </div>
    	</div>	
    </div>


  <script type="text/javascript">
    function showCompanyInput() {
      document.getElementById("company_name_div").style.display="block";
    }
    function hideCompanyInput() {
      document.getElementById("company_name_div").style.display="none";
    }
  </script>