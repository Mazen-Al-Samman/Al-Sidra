<?php

use yii\bootstrap4\Modal;

Modal::begin([
    'title' => '',
    'id' => Yii::$app->controller->id,
    'size' => Modal::SIZE_LARGE,
]);
echo '<div id="modalContent"></div>';
Modal::end();