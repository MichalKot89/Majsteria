<div class="content">
    <h1>Wszystkie zlecenia</h1>

    <table>
    <?php
        if ($this->projects) {
            foreach($this->projects as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value->submit_date . '</td>';
                echo '<td>' . $value->descr . '</td>';
                echo '<td>' . $value->post_code . '</td>';
                echo '<td>' . $value->subcategory_id . '</td>';
                if($value->active == 0) {
                    echo '<td><a href="'. URL . 'project/activate/' . $value->project_id.'">Activate</a></td>';
                }
                if($value->deleted == 0) {
                    echo '<td><a href="'. URL . 'project/delete/' . $value->project_id.'">Delete</a></td>';
                }
                echo '</tr>';
            }
        } else {
            echo 'Nie ma zleceń.';
        }
    ?>
    </table>
</div>