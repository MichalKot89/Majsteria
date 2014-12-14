<div class="container">
    <?php 
        if($this->project) {
            echo '<h1>' . $this->project->subcategory_name . ' ' . $this->project->post_code . '</h1>';
            echo '<b>Data dodania:</b> ' . $this->project->submit_date . '<br />';
            echo '<b>Opis zlecenia: </b><br />' . $this->project->descr;
        }
    ?>
</div>