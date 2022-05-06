<?php
/** @var $model Landing */

use common\models\Landing;

$callingMethods = ['هـاتـف'];
$phoneUrl = "phone:";
if ($model->has_whatsapp) {
    $callingMethods[] = 'واتســاب';
    $phoneUrl = "https://iwtsp.com/";
}
$methodsString = implode(' أو ', $callingMethods);

$phoneUrl .= $model->phone;
?>
<div class="container">
    <div class="row content-center">
        <div class="col-lg-12 text-center">
            <img src="<?= $model->getImagePath() ?>" class="img-fluid" width="150" alt="<?= $model->main_text ?>">
        </div>
        <div class="col-lg-6 text-center mt-3">
            <h3 class="font-weight-bold text-dark-blue"><?= $model->main_text ?></h3>
            <p><?= $model->body ?></p>

            <div class="rounded text-center pt-2 pb-4 mt-3 bg-light">
                <h1 class="font-din"><?= $methodsString ?></h1>
                <div>
                    <?php if ($model->has_whatsapp) : ?>
                        <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="whatsapp"/>
                        <span class="text-success">&</span>
                    <?php endif; ?>
                    <img src="https://img.icons8.com/dotty/48/26e07f/callback.png" alt="Call"/>
                </div>
                <a href="<?= $phoneUrl ?>" class="font-15 mt-3 mb-2 d-block"
                   target="_blank"><?= $model->phone ?></a>
            </div>
        </div>
    </div>
</div>