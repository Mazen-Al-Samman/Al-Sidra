<?php

/** @var View $this */

/** @var string $content */

use aryelds\sweetalert\SweetAlert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\web\View;

AppAsset::register($this);
$this->registerCssFile("https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap", ['position' => View::POS_HEAD]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js', ['position' => View::POS_HEAD]);
$this->registerJs('!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);');
$this->registerJsFile('https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=623c47907413d05dab48f209', ['position' => View::POS_END]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js', ['position' => View::POS_END]);

if (!empty(Yii::$app->session->allFlashes)) :
    $flashes = Yii::$app->session->allFlashes;
    foreach ($flashes as $type => $msg) :
        echo SweetAlert::widget([
            'options' => [
                'title' => '',
                'text' => "<span class='font-cairo font-25 font-weight-bold'>{$msg}</span>",
                'type' => $type,
                'html' => true,
                'showConfirmButton' => true,
                'confirmButtonColor' => '#064221',
                'confirmButtonText' => 'مـوافق',
                'closeOnConfirm' => true
            ]
        ]);
    endforeach;
endif;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="body-4" style="font-family: 'Cairo', serif; font-weight: bold">
    <?php $this->beginBody() ?>
    <?= $this->render('header') ?>
    <?= $content ?>
    <?= !in_array(Yii::$app->controller->action->id, ['login', 'signup']) ? $this->render('footer') : '' ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
