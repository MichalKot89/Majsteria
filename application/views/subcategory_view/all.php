
<div class="container">
  <h1>Wszystkie kategorie</h1>
<?php
/*
  foreach($this->categories AS $category) {
    echo $category->name . '<br />';
    foreach($this->subcategories AS $subcategory) {
      if($subcategory->category_id == $category->category_id) {
        echo '<a href="' . URL . 'znajdz/' . $subcategory->seo_url . '">' . $subcategory->name . '</a><br />';
      }
    }
  }
  */
$letters = range('A', 'Z');
  foreach($letters AS $letter) {
    $post = true;
    foreach($this->subcategories AS $subcategory) {
      if(substr($subcategory->name, 0, 1) == $letter) {
        if($post) {
          echo '<h3>' . $letter . '</h3>';
          $post = false;
        }
        echo '<a href="' . URL . 'znajdz/' . $subcategory->seo_url . '">' . $subcategory->name . '</a><br />';
      }
    }
  }
?>
</div>