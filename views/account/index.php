<?php

use app\models\BookCart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Карточки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать карточку', ['create'], ['class' => 'btn btn-outline-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "<div class='row row-cols-sm-1 row-cols-md-3 carts-account'>{items}</div>",
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item',
    ]) ?>

    <?php Pjax::end(); ?>

</div>
