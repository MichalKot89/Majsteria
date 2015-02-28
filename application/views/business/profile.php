<div class="container">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

        <div style="margin-top: 50px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: <?php echo AVATAR_SIZE; ?>px">
                        <img src="<?php echo $this->user->user_avatar_link; ?>" /><br /><br />
                        <b>Lokalizacja:</b><br />
                        <?php echo $this->user_info->city; ?><br /><br />
                        <b>Specjalizacje:</b><br />
                        <?php 
                        foreach($this->business_subcategories AS $subcategory) {
                            echo $subcategory->name . '<br />';
                        }
                        ?>

                    </td>
                    <td style="align: left; vertical-align: top; padding-left: 50px;">
                        <h1><?php echo $this->name; ?></h1>
                        <p>
                            <?php echo $this->business_info->descr; ?>
                        </p>
                        <br />
                        <b>Telefon: </b><br />
                        <?php if(!isset($_SESSION['user_id'])) { ?>
                        <a href="<?php echo URL; ?>login/register">Załóż bezpłatne konto</a>, aby zobaczyć dane kontaktowe.
                        <?php } else {
                            echo $this->user_info->phone;
                        }
                        ?>

                        <br /><br />
                        <b>Podobni specjaliści:</b><br />
                        <?php 
                        foreach($this->business_subcategories AS $subcategory) {
                            echo $subcategory->name . ' ' . $this->user_info->city . '<br />';
                        }
                        ?>
                    </td>
                </tr>
 <?php /*               <tr>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                </tr> */ ?>
            </table>

        </div>
</div>
