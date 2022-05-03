<?php

/* @var $model RealEstateTypes */

use common\models\RealEstateTypes;

$typeConfig = $model->config;
if (!empty($typeConfig)) $typeConfig->validate();
?>

<div class="container text-center">
    <h2 class="main-text font-weight-bold font-din" style="letter-spacing: 2px;"><?= $model->title ?></h2>
    <div class="row content-center mt-5">
        <?php foreach ($typeConfig->cards as $card) : ?>
            <div class="col-lg-4 mt-3">
                <div class="border border-2 p-3 rounded">
                    <div class="card-img-div"
                         style="background-image: url(<?= Yii::$app->params['filesUrl'] . $card->img ?>); background-size: cover"></div>
                    <hr>
                    <div class="mt-3">
                        <h3 class="font-din"><?= $card->title ?></h3>
                        <p class="mt-4 text-grey font-15 font-weight-normal body-text"><?= $card->body ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
