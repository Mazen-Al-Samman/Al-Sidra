<?php

/** @var $model */

use common\models\Constant;
use yii\helpers\Html;

$attributeLabels = $model->attributeLabels();
?>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-lg-6 mt-3">
                            <h3 class="font-weight-bold"><?= $model->type ?></h3>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-center" dir="rtl">
                            <?php foreach ($model->fields() as $attribute):
                                $value = "(لا يوجد)";
                                switch ($attribute) {
                                    case 'status':
                                        $value = Constant::READ_STATUS[$model->{$attribute}];
                                        break;
                                    case 'report_img':
                                    case 'real_estate_img':
                                        $value = Html::img($model->getImgPath($attribute), ['class' => 'img-fluid', 'width' => 250]);
                                        break;
                                    case 'created_at':
                                    case 'updated_at':
                                        $value = date('h:i / Y-m-d', strtotime($model->{$attribute}));
                                        break;
                                    default:
                                        $value = $model->{$attribute};
                                }
                                ?>
                                <div class="col-lg-3 border text-center rounded p-3 mt-2 ml-1 mr-1">
                                    <h5 class="text-danger mt-1 font-weight-bold"><?= $attributeLabels[$attribute] ?></h5>
                                    <p class="mt-4 font-weight-bold"><?= $value ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
