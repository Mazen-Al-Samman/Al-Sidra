<?php

use common\models\BannerImage;
use frontend\assets\AppAsset;

$bannerImages = BannerImage::find()->all();
AppAsset::register($this);
?>
<div class="container-fluid">
    <div class="row content-center">
        <div class="col-10">
            <div data-delay="5000" data-animation="cross" class="w-slider" data-autoplay="true" data-easing="ease"
                 data-hide-arrows="true" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3"
                 data-duration="500" data-infinite="true">

                <div class="w-slider-mask">
                    <?php foreach ($bannerImages as $img): ?>
                        <div class="w-slide"
                             style="background-image: url('<?= Yii::$app->params['filesUrl'] . $img->img_name ?>'); background-size: cover"></div>
                    <?php endforeach; ?>
                </div>
                <div class="w-slider-arrow-left">
                    <div class="w-icon-slider-left"></div>
                </div>
                <div class="right-arrow w-slider-arrow-right">
                    <div class="w-icon-slider-right"></div>
                </div>
                <div class="slide-nav w-slider-nav w-shadow w-round"></div>
            </div>
        </div>
    </div>
    <div class="row content-center mt-5">
        <div class="services-section">
            <h1 class="section-heading centered font-din">خدماتنا</h1>
            <div class="row content-center" id="services">
                <div class="col-lg-3 mt-5 bg-light rounded">
                    <div class="text-center p-5">
                        <img src="<?= Yii::getAlias('@img') . '/13.png' ?>" loading="lazy" width="80" alt="Manage"
                             class="img-fluid">
                        <h5 class="heading-6 color-sky">إدارة الأملاك والعقارات</h5>
                        <p class="mt-5">تقديم خدمات متميزة ومتنوعة لإدارة الأملاك والعقارات وذلك بحسب متطلبات العملاء
                            وفقاً لخطط واستراتيجيات تلبي التطورات المستقبلية</p>
                    </div>
                </div>
                <div class="col-lg-3 bg-light rounded ml-3 mr-3 mt-5">
                    <div class="text-center p-5">
                        <img src="<?= Yii::getAlias('@img') . '/12.png' ?>" loading="lazy" width="80" alt="Manage"
                             class="img-fluid">
                        <h5 class="heading-6 color-sky">التقييم العقاري</h5>
                        <p class="mt-5">توفير خدمة التقييم العقاري لتحديد القيمة الفعلية للممتلكات والعقارات والقيام
                            بعمليات حسابية دقيقة لأصول الشركة</p>
                    </div>
                </div>
                <div class="col-lg-3 bg-light rounded mt-5">
                    <div class="text-center p-5">
                        <img src="<?= Yii::getAlias('@img') . '/11.png' ?>" loading="lazy" width="80" alt="Manage"
                             class="img-fluid">
                        <h5 class="heading-6 color-sky">التسويق العقاري</h5>
                        <p class="mt-5">تقديم اساليب وطرق فعالة للتسويق العقاري حيث يمكن للعملاء تسويق مختلف العقارات من
                            خلال الموقع ومراقبة العقار بشكل مستمر</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row content-center mt-5">
        <div class="col-10">
            <h1 class="section-heading centered font-din">نبذة عن السدرة العقارية</h1>
            <div class="row content-center">
                <div class="col-lg-3">
                    <div class="text-center p-5 rounded" style="height: 300px">
                        <h5 class="heading-6 color-sky">رسالتنا</h5>
                        <p class="mt-5">تقديم الأساليب والتقنيات الحديثة لتطوير وتسهيل المعاملات في كافة أنواع
                            الأنشطة العقارية وإضافة القيمة والجودة إليها لإحداث فرق إيجابي للعملاء</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="text-center p-5 rounded" style="height: 300px">
                        <h5 class="heading-6 color-sky">رؤيتنا</h5>
                        <p class="mt-5">التوسع في المجال العقاري بتقديم خدمات وحلول عقارية متكاملة رفيعة المستوى ومتميزة
                            في الأداء والإبداع وأن نصبح شركة عالمية رئيسية في قطاع العقارات</p>
                    </div>
                </div>

                <div class="col-lg-3 ml-3 mr-3">
                    <div class="text-center p-5 rounded" style="height: 300px">
                        <h5 class="heading-6 color-sky">أهدافنا</h5>
                        <p class="mt-5">زيادة القدرة على اكتشاف أفضل الفرص والأفكار الإستثمارية وتقديم جميع الخدمات
                            العقارية بشكل متكامل وبإحترافية عالية تجمع بين الخبرة والطم</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row content-center mt-5">
        <div class="col-lg-12 services-section">
            <h1 class="section-heading centered font-din">تواصل معنا</h1>
            <div class="row content-center">
                <div class="col-lg-3 mb-3 p-3 rounded text-center bg-light">
                    <h1 class="font-din mt-lg-5">هاتف أو واتساب</h1>
                    <div>
                        <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="whatsapp"/>
                        <span class="text-success">&</span>
                        <img src="https://img.icons8.com/dotty/48/26e07f/callback.png" alt="Call"/>
                    </div>
                    <a href="https://iwtsp.com/966505931313" class="font-15 mt-3 d-block"
                       target="_blank">+966-505931313</a>
                </div>
                <div class="col-lg-3 mb-3 ml-3 mr-3 rounded text-center bg-light">
                    <h1 class="font-din">موقعنا</h1>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28824.67751926832!2d49.5743!3d25.435432!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xafd20fdf3924c980!2z2KfZhNiz2K_YsdipINin2YTYudmC2KfYsdmK2Kk!5e0!3m2!1sar!2ssa!4v1651273757551!5m2!1sar!2ssa"
                            height="200" style="border:0; width: 100%" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-3 mb-3 p-3 rounded text-center bg-light">
                    <h1 class="font-din mt-lg-4">تقييم العقار</h1>
                    <div>
                        <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="whatsapp"/>
                        <span class="text-success">&</span>
                        <img src="https://img.icons8.com/dotty/48/26e07f/callback.png" alt="Call"/>
                    </div>
                    <a href="https://iwtsp.com/966504831313" class="font-15 mt-3 d-block"
                       target="_blank">+966-504831313</a>
                    <a href="https://iwtsp.com/966504931313" class="font-15 mt-3 d-block"
                       target="_blank">+966-504931313</a>
                </div>
            </div>
        </div>
    </div>
</div>