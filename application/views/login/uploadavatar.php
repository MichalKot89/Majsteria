<div class="container">
    <h1>Ustaw zdjęcie profilowe</h1>

    Obecne zdjęcie:<br />
    <?php echo '<img src="' . $this->avatar_file_path . '"/>'; ?>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form action="<?php echo URL; ?>login/uploadavatar_action" method="post" enctype="multipart/form-data">
        <label for="avatar_file">Wybierz zdjęcie z dysku (zostanie przeskalowane do rozmiaru <?php echo AVATAR_SIZE . 'x'. AVATAR_SIZE; ?> px):</label>
        <input type="file" name="avatar_file" required />
        <!-- max size 10 MB (as many people directly upload high res pictures from their digital cameras) -->
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        <input name="submit" type="submit" value="Dodaj zdjęcie" />
    </form>
</div>
