<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BookCart $model */

$this->title = 'Update Book Cart: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Book Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="book-cart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
