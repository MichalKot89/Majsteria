<div class="container">
    <?php 
        echo '<h1>' . $this->project->subcategory_name . ' ' . $this->project->city . '</h1>';
    ?>
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    
    <?php
        echo '<b>Data dodania:</b> ' . $this->displayDate($this->project->submit_date) . '<br />';
        echo '<b>Opis zlecenia: </b><br />' . $this->project->descr;
    ?>

    <div style="margin-top: 50px;">
    <?php
    	// If not logged in, prompt to log in.
		if(!$this->loggedIn) {
			echo "Zaloguj się, aby złożyć ofertę.";
		}
		// if is owner, just display info
		else if($this->isOwner) {
			echo "Poniżej znajdziesz oferty od majstrów i ich numery telefonów. Wybierz tego, który najbardziej Ci odpowiada.";
		}
		// if not a business and not an owner, prompt to create one
		else if(!$this->isBusiness) {
			echo 'Zanim złożysz ofertę na to zlecenie potrzebujemy zebrać więcej informacji o Tobie. Zajmie Ci to minutę i możesz to zrobić ';
			echo '<a href="' . URL . 'business">tutaj</a>.';
		}
    	else if(!$this->hasPlacedOffer) { ?>
		    	<form class="form-signin" role="form" action="<?php echo URL; ?>project/offer/<?php echo $this->project->project_id;?>" method="post">
				    <b>Złóż ofertę wykonania zlecenia. </b><br />
				    Treść oferty: <br />
				    <textarea name="descr" style="width: 500px; height: 100px;" required=""></textarea><br />
				    Szacowany koszt:<br />
				    <input  type="name" name="offer_value" style="width: 60px;"  placeholder="np. 200" required="" /> zł brutto
				    <select name="offer_type" required="">
				    	<option value="1">za całość</option>
				    	<option value="2">za godzinę</option>
				    </select>
				    <br />
				    <button class="btn btn-lg btn-primary" type="submit">Złóż ofertę</button>
				</form>
	<?php }
	?>
	</div>
	<div style="margin-top: 50px;">
		<b>Złożone oferty:</b><br />
	    <table id="bid_listing" class="table">
	    <?php
	        if ($this->offers) { ?>
	        	<tr>
	    		<th>Data</th>
	    		<th>Firma/Osoba</th>
	    		<th>Lokalizacja</th>
	    		<th>Treść oferty</th>
	    		<?php if($this->isOwner OR $this->isAdmin) { ?>
	    		<th>Cena</th>
	    		<th>Nr kontaktowy</th>
	    		<?php } ?>
	    	</tr>
	    	<?php
	            foreach($this->offers as $key => $value) {
	                echo '<tr>';
	                echo '<td>' . $this->displayDate($value->submit_date) . '</td>';
	                echo '<td><a href="' . URL . 'business/profile/' . $value->user_id . '">' . ($value->is_company?$value->company_name:($value->first_name . ' ' . $value->last_name)). '</a></td>';
	                echo '<td>' . $value->city . '</td>';
	                echo '<td>' . $value->descr . '</td>';
	                if($this->isOwner OR $this->isAdmin) {
	                	echo '<td>' . $value->offer_value . ' zł ';
	                	echo '' . (($value->offer_type==1)?'':'za godz.') . '</td>';
	                    echo '<td>' . $value->phone . '</td>';
	                }
	                if($value->active == 0 && $this->isAdmin) {
	                    echo '<td><a href="'. URL . 'project_offer/activate/' . $value->project_offer_id.'">Activate</a></td>';
	                }
	                if($value->deleted == 0 && $this->isAdmin) {
	                    echo '<td><a href="'. URL . 'project_offer/delete/' . $value->project_offer_id.'">Delete</a></td>';
	                }
	                echo '</tr>';

	            }
	        } else {
	            echo "Nikt nie złożył jeszcze oferty na to zlecenie.";
	            if(!$this->isOwner) {
	            	echo " To szansa dla Ciebie!";
	            }
	        }
	    ?>
	    </table>
	</div>
</div>