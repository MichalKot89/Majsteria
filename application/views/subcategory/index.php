<div class="container">
    <h1>Dodaj nową podkategorię</h1>
    <h3>Podkategoria to każda ze stron jak tu: http://www.homeimprovementpages.com.au/find/plumbers</h3>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form method="post" action="<?php echo URL;?>subcategory/create">
        <label>Select category: </label>
        <select name="category_id">
    <?php
        if ($this->categories) {
            foreach($this->categories as $key => $value) {
                echo '<option value=' . $value->category_id . '>' . $value->name . '</option>\n';
            }
        } else {
            echo 'No subcategories yet. Create some !';
        }
    ?>
            </select><br /><label>Kto (mnoga)-- np. Hydraulicy: </label><br />
	<input type="text" name="name" /><br /><br />
	    <label>Kogo (pojedyncza) np. Hydraulika: </label><br />
	<input type="text" name="specialist_name" /><br /><br />
		    <label>Seo url -- np. hydraulicy: </label><br />
	<input type="text" name="seo_url" /><br /><br />
		    <label>Meta title -- np. Hydraulicy -- znajdź hydraulika: </label><br />
	<input type="text" name="meta_title" /><br /><br />
	    <label>Meta descr: </label><br />
	<input type="text" name="meta_descr" /><br /><br />
	    <label>Treść: </label><br />
        <textarea style="width: 400px; height: 300px" name="content"></textarea><br />
        <input type="submit" value='Dodaj podkategorie' autocomplete="off" />
    </form>    
    
    <h1 style="margin-top: 50px;">List of your subcategories</h1>

    <table>
    <?php
        if ($this->subcategories) {
            foreach($this->subcategories as $key => $value) {
                echo '<tr>';
                echo '<td>' . htmlentities($value->name) . '</td>';
                echo '<td><a href="'. URL . 'subcategory/edit/' . $value->subcategory_id.'">Edit</a></td>';
                echo '<td><a href="'. URL . 'subcategory/delete/' . $value->subcategory_id.'">Delete</a></td>';
                echo '</tr>';
            }
        } else {
            echo 'No subcategories yet. Create some !';
        }
    ?>
    </table>
</div>