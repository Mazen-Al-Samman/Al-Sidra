<?php

namespace backend\web\widgets;

use Yii;
use yii\base\Exception;
use yii\base\Widget;

class SortableWidget extends Widget
{
    public $cards;

    /**
     * @throws Exception
     */
    public function run()
    {
        $contents = [];
        foreach ($this->cards as $card) {
            $img = Yii::$app->params['filesUrl'] . $card->img;
            $title = $card->title;
            $body = $card->body;
            $randomString = Yii::$app->security->generateRandomString(5);
            $htmlCard = <<< HTML
            <div class="position-relative">
                <img class="position-absolute delete-icon" src="https://img.icons8.com/external-gliphyline-royyan-wijaya/32/fa314a/external-delete-gloria-interface-glyph-gliphyline-royyan-wijaya.png" alt="Delete"/>
                <div class="card component-card_9" style="width: 350px">
                    <div class="card-img-top mt-3" style="background-image: url({$img}); background-size: cover;"></div>
                    <hr class="ml-4 mr-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">{$title}</h5>
                        <p class="card-text mt-3">{$body}</p>
                    </div>
                    <input type="hidden" name="RealEstateItem[{$randomString}][title]" value="{$title}">
                    <input type="hidden" name="RealEstateItem[{$randomString}][body]" value="{$body}">
                    <input type="hidden" name="RealEstateItem[{$randomString}][img]" value="{$card->img}">
                </div>
            </div>
HTML;
        $contents[] = ['content' => $htmlCard];
        }
        Yii::$app->params['bsDependencyEnabled'] = false;
        return $this->render('sortable-view', ['cards' => $contents]);
    }
}