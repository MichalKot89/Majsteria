<div class="container">
    <h1>Edit a subcategory</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <?php if ($this->subcategory) { ?>
        <form method="post" action="<?php echo URL; ?>subcategory/editSave/<?php echo $this->subcategory->subcategory_id; ?>">
        <label>Select category: </label>
        <select name="category_id">
	<?php
	    if ($this->categories) {
		foreach($this->categories as $key => $value) {
		    echo '<option value=' . $value->category_id . 
		      ($value->category_id == $this->subcategory->category_id?' selected="selected"':'') . 
		      '>' . $value->name . '</option>\n';
		}
	    } else {
		echo 'No subcategories yet. Create some !';
	    }
	?>
		</select><label>Kto (mnoga) -- np. Hydraulicy: </label>
	    <input type="text" name="name" value="<?php echo $this->subcategory->name; ?>"/>
		<label>Kogo (pojedyncza) np. Hydraulika: </label>
	    <input type="text" name="specialist_name" value="<?php echo $this->subcategory->specialist_name; ?>"/>
			<label>Seo url -- np. hydraulicy: </label>
	    <input type="text" name="seo_url" value="<?php echo $this->subcategory->seo_url; ?>"/>
			<label>Meta title -- np. Hydraulicy -- znajdź hydraulika: </label>
	    <input type="text" name="meta_title" value="<?php echo $this->subcategory->meta_title; ?>"/>
		<label>Meta descr: </label>
	    <input type="text" name="meta_descr" value="<?php echo $this->subcategory->meta_descr; ?>"/>
		<label>Treść: </label>
	    <textarea style="width: 400px; height: 300px" name="content"><?php echo $this->subcategory->content; ?></textarea>
            <input type="submit" value='Change' />
        </form>
    <?php } else { ?>
        <p>This subcategory does not exist.</p>
    <?php } ?>
</div>
