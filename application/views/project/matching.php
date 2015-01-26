<div class="container">
    <h1>Sugerowane zlecenia</h1>

    <table class="table">
    <?php
        if ($this->projects) {
            foreach($this->projects as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value->submit_date . '</td>';
                echo '<td>' . $value->descr . '</td>';
                echo '<td>' . $value->post_code . '</td>';
                echo '<td>' . $value->subcategory_name . '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Niestety nie znaleźliśmy dla Ciebie żadnych zleceń. Rozważ dodanie większej ilości kategorii.';
        }
    ?>
    </table>
</div>