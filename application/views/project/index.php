<div class="container">
    <h1><?php echo $this->headline; ?></h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <table id="project_listing" class="table">
    <?php
        if ($this->projects) {
            foreach($this->projects as $key => $value) {
                echo '<tr class="clickableRow" href="' . URL . 'project/view/' . $value->project_id . '"">';
                echo '<td>' . $value->submit_date . '</td>';
                echo '<td>' . $value->descr . '</td>';
                echo '<td>' . $value->post_code . '</td>';
                echo '<td>' . $value->subcategory_name . '</td>';
                echo '<td><a href="' . URL . 'project/view/' . $value->project_id . '">Szczegóły zlecenia</a></td>';
                if($this->isAdmin || $value->user_id == $_SESSION['user_id']) {
                    echo '<td><a href="'. URL . 'project/edit/' . $value->project_id.'">Edycja zlecenia</a></td>';
                }
                if($value->active == 0 && $this->isAdmin) {
                    echo '<td><a href="'. URL . 'project/activate/' . $value->project_id.'">Activate</a></td>';
                }
                if($value->deleted == 0 && $this->isAdmin) {
                    echo '<td><a href="'. URL . 'project/delete/' . $value->project_id.'">Delete</a></td>';
                }
                echo '</tr>';

            }
        } else {
            echo $this->no_projects_message;
        }
    ?>
    </table>
</div>

<script>
jQuery(document).ready(function($) {
      $(".clickableRow").click(function() {
            window.document.location = $(this).attr("href");
      });
});
</script>