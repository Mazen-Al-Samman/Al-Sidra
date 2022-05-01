<?php

/** @var View $this */

/** @var string $content */

use backend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php
        $this->registerCsrfMetaTags();
        $this->registerCssFile("https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap", ['position' => View::POS_HEAD]);
        ?>
        <main role="main" class="flex-shrink-0">
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </main>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <?php if (Yii::$app->controller->action->id != 'login') echo $this->render('header') ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
