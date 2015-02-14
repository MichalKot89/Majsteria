                <div class="col-md-12 col-sm-12 quote-form-style">
           	    	<div class="col-md-12 col-sm-12 padd-null quote-form-inner">
                    	<form action="<?php echo URL; ?>project/create" method="post" name="post_project_form">
                          <div class="form-group">
                            <label>Jakiego rodzaju fachowca poszukujesz?</label>
                            <select class="form-control" name="subcategory_id" required>
                              <option value>Wybierz kategorie</option>
                              <?php
                                  foreach($this->getAllSubcategories() as $subcategory) {
                                      echo '<option value="'.$subcategory->subcategory_id.'">' . $subcategory->name.'</option>';
                                  } 
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Na kiedy?</label><br />
                            <select class="form-control" name = "timeline" required>
                              <option value>Wybierz termin</option>
                              <option value="1">Jak najszybciej</option>
                              <option value="2">Za kilka dni</option>
                              <option value="3">Za kilka tygodni</option>
                              <option value="4">Dogadamy się</option>
                              <option vlaue="5">Nie wiem</option>
                            </select>

                            <?php /*
                            <button type="button" class="btn btn-default btn-de">Jak najszybciej</button>
                            <button type="button" class="btn btn-default btn-de btn-de-active">Za kilka dni</button>
                            <button type="button" class="btn btn-default btn-de">Za kilka tygodni</button>
                            <button type="button" class="btn btn-default btn-de">Dogadamy się</button>
                            <button type="button" class="btn btn-default btn-de">Nie wiem</button>*/ ?>
                          </div>

                          <?php 
                            // display first_name and last_name only if user doesn't have it yet
                            if(!isset($this->skip_name)) { ?>
                          <div class="form-group">
                            <label>Imię i nazwisko</label>
                            <input type="name" name="first_name" class="form-control" style="width:45%" pattern=".{1,}" 
                              value = "<?php echo isset($_SESSION['first_name'])?$_SESSION['first_name']:''; ?>" 
                              required />
                            <input type="name" name="last_name" class="form-control" style="width: 45%" pattern=".{1,}" 
                              value = "<?php echo isset($_SESSION['last_name'])?$_SESSION['last_name']:''; ?>" 
                              required />
                          </div>
                          <?php 
                            }
                            // display phone only if user doesn't have it yet
                            if(!isset($this->skip_phone)) { ?>
                          <div class="form-group">
                            <label>Telefon kontaktowy (np. 606555222)</label>
                            <input type="name" name="user_phone" class="form-control" pattern="\+?\d{9,}" 
                              value = "<?php echo isset($_SESSION['user_phone'])?$_SESSION['user_phone']:''; ?>" 
                              required />
                          </div>
                          <?php 
                            }
                            // display these only if user is not logged in
                            if(!Auth::isLoggedIn()) { ?>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Adres email</label>
                            <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" name="user_email" 
                              value = "<?php echo isset($_SESSION['user_email'])?$_SESSION['user_email']:''; ?>" 
                              required />
                          </div>
                          <?php } ?>

                          <div class="form-group">
                            <label>Kod pocztowy miejsca zlecenia (np. 23-100)</label>
                            <input type="name" class="form-control" id="post_code" name="post_code" 
                              value = "<?php echo isset($_SESSION['post_code'])?$_SESSION['post_code']:''; ?>" 
                              required />
                          </div>
                          <div class="form-group">
                            <label>Opisz dokładnie czego potrzebujesz</label>
                            <textarea class="form-control" rows="3" name="descr"><?php echo isset($_SESSION['descr'])?$_SESSION['descr']:''; ?></textarea>
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