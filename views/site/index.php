<?php

/** @var yii\web\View $this */

use yii\web\JqueryAsset;

$this->title = 'Буквоежка';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4"></h1>
        <h1 class="display-4 main-text"></h1>
        <h2>Весь мир книг у вас на ладони!</h2>

    </div>
    <div class="body-content">
        <div class="d-flex text-center justify-content-between">
            <div class="col-lg-4 mb-3 d-flex flex-column align-content-end justify-content-center" style="height: 500px; width: 300px;">
                <h3>Загружай</h3>
                <img src="/web/img/11.png" class="img-style">

            </div>
            <div class="col-lg-4 mb-3 d-flex flex-column align-content-end justify-content-center"  style="height: 500px; width: 300px;">
                <h3>Делись с друзьями</h3>
                <img src="/web/img/22.png" class="img-style">

            </div>
            <div class="col-lg-4 mb-3 d-flex flex-column align-content-end justify-content-center"  style="height: 500px; width: 300px;">
                <h3>Добавляй в свою библиотеку</h3>
                <img src="/web/img/33.png" class="img-style">

            </div>
        </div>

    </div>
</div>

<?php 

    $this->registerJsFile("/js/animation.js", ["depends" => JqueryAsset::class]) 
?>
