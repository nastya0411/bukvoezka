<?php

use app\models\BookCart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\BookCartSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Book Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book Cart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
        },
    ]) ?>

    <?php Pjax::end(); ?>

</div>
