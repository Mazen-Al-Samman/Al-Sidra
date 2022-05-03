<?php
/* @var $model RealEstateTypes */

use backend\web\widgets\ModalWidget;
use backend\web\widgets\SortableWidget;
use common\models\RealEstateTypes;

?>

<?= ModalWidget::widget() ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-lg-12 mt-3 text-center">
                            <h3 class="font-weight-bold">المحـتوى لـنوع العقـار <span
                                        class="text-warning"><?= $model->title ?></span></h3>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="container">
                        <div class="row">
                            <?=
                                SortableWidget::widget()
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>