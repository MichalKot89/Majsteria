<div class="container" style="position: relative;">
<h1>Ustawienia konta</h1>
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
<center>
    <table id="settings" class="table" style="width: 200px;">
        <tr>
            <td style="border-top: 0px;"><a href="<?php echo URL;?>login/requestpasswordreset">Zmień hasło</a></td>
        </tr>
        <tr>
            <td><a href="<?php echo URL;?>login/edituseremail">Zmień adres email</a></td>
        </tr>
        <tr>
            <td><a href="<?php echo URL;?>login/uploadavatar">Zmień zdjęcie profilowe</a></td>
        </tr>
        <?php
        if($this->isBusiness) { ?>
        <tr>
            <td><a href="<?php echo URL . 'business/edit/' . $_SESSION['user_id']; ?>">Edycja biznesu</a></td>
        </tr>
        <? } ?>
    </table>
</center>
</div>