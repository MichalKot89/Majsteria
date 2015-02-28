<div class="container">
    <h1>
    
    <?php 
    if($this->user_info) {
        echo 'Witaj ' . $this->user_info->first_name . '!';
    }
    else {
        echo 'Dashboard';
    }
    ?>
    </h1>
    <br /><br />
    <?php 
    if($this->isAdmin) {
        echo '<a href="' . URL . 'subcategory/index' . '">Zarządzaj kategoriami</a>';
    }
    ?>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <?php 
    	if(count($this->my_projects) > 0) {
    		// I have projects
    ?>
    <h2>Moje zlecenia</h2>
    Dodane przez Ciebie zlecenia: <?php echo count($this->my_projects); ?>
    <br /><a href="<?php echo URL; ?>project/index"><button type="submit" class="btn btn-default blue-btn">MOJE ZLECENIA</button></a>
    <a href="<?php echo URL; ?>get_quotes/index"><button type="submit" class="btn btn-default blue-btn">DODAJ ZLECENIE</button></a>
   	<?php
    	}
    	if($this->isBusiness) {
    		// I am a business
	?>
    <h2>Szukaj zleceń</h2>
    Aktywne zlecenia w Twojej okolicy: <?php echo count($this->matching_projects); ?>
    <br /><a href="<?php echo URL; ?>project/matching"><button type="submit" class="btn btn-default blue-btn">ZLECENIA DLA MNIE</button></a>

	<?php
    	}
    	if(count($this->my_projects) == 0 AND !$this->isBusiness) {
    		// I am fresh
    ?>
    <h2>Szukasz fachowców?</h2>
    Na Majsterii znajdziesz ich łatwo i szybko! Pierwszym krokiem jest dodanie zlecenia, w którym opiszesz czego potrzebujesz. <br />
    My powiadomimy specjalistów z Twojej okolicy, a oni przyślą Ci swoje wyceny wraz z numerami telefonu. TAK! To jest tak proste i nic nie kosztuje!
    <br /><a href="<?php echo URL; ?>get_quotes/index"><button type="submit" class="btn btn-default blue-btn">DODAJ ZLECENIE</button></a>

    <h2>Jesteś fachowcem?</h2>
    Majsteria to idealne miejsce dla Ciebie. Codziennie setki Polaków poszukuje u nas specjalistów, więc u nas łatwo zdobędziesz dodatkowe zlecenia. <br />
    Pierwszym krokiem jest dodanie biznesu -- możesz to zrobić klikając w przycisk poniżej. Dodając biznes powiesz nam w czym się specjalizujesz, 
    a także w jakiej okolicy jesteś gotowy wykonywać zlecenia. Reszte zostaw nam -- my będziemy sugerować Ci zlecenia, którymi możesz być zainteresowany. <br />
    Dodając swój biznes nie ryzykujesz nic -- jest to całkowicie bezpłatne, a Ty nie musisz odpowiadać na zlecenia, które Ci podsyłamy. To naprawdę może być takie proste!
    <br /><a href="<?php echo URL; ?>business/index"><button type="submit" class="btn btn-default blue-btn">DODAJ BIZNES</button></a>

    <?php
    	}
    ?>
</div>
