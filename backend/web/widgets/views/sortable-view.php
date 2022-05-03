<?php

/** @var $cards array */

use kartik\sortable\Sortable;
?>

<div class="container mt-2">
    <div class="row d-flex justify-content-center">
        <div class="mt-5">
            <?= Sortable::widget([
                'type' => Sortable::TYPE_GRID,
                'items' => $cards
            ]); ?>
        </div>
    </div>
</div>

