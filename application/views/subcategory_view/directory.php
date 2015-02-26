<div class="container">
    <h1><?php echo $this->subcategory->name . ' ' . ucfirst($this->city_url); ?></h1>

    <table class="table">
    <?php
        if ($this->businesses) {
            foreach($this->businesses as $key => $value) {
                echo '<tr>';
                echo '<td><a href="' . URL . 'business/profile/' . $value->user_id . '">' . ($value->is_company?$value->company_name:($value->first_name . ' ' . $value->last_name)). '</a></td>';
                echo '<td>' . $value->city . '</td>';
                echo '<td>' . $value->phone . '</td>';
                echo '</tr>';

            }
        } else {
            echo 'Nie szukaj fachowców, pozwól im znaleźć Ciebie! <a href="' . URL . 'get_quotes/index">Dodaj zlecenie</a> i wybierz z listy dostępnych specjalistów.';
        }
    ?>
    </table>
</div>