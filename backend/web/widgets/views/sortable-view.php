<?php

use kartik\sortable\Sortable;
use yii\helpers\Url;

?>

<ul style="display: none">
    <li id="template" draggable="true" role="option" aria-grabbed="false">
        <div class="card component-card_9" style="width: 350px">
            <img src="<?= Yii::$app->params['filesUrl'] . '/__img__' ?>" class="card-img-top mt-3 border border-1 border-secondary" alt="widget-card-2">
            <div class="card-body text-center">
                <h5 class="card-title">__title__</h5>
                <p class="card-text mt-3">__body__</p>
            </div>
        </div>
    </li>
</ul>

<div class="container mt-2">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="col-lg-4">
                <div class="p-2 border border-1">
                    <div class="bg-light p-4 text-center font-weight-bold"><p>مـربــع محـتوى جـديـد</p>
                        <button class="btn btn-dark mt-3"
                                data-modal="<?= Yii::$app->controller->id ?>"
                                data-label="بيـانــات مربــع المحــتوى"
                                value="<?= Url::to(['site/add-item']) ?>">
                            <img src="https://img.icons8.com/external-bearicons-glyph-bearicons/30/ffffff/external-Plus-essential-collection-bearicons-glyph-bearicons.png"
                                 alt="Plus"/>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <?= Sortable::widget([
                'type' => Sortable::TYPE_GRID,
                'items' => [
                ]
            ]); ?>
        </div>
    </div>
</div>

