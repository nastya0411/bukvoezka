<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BookCart $model */

$this->title = 'Create Book Cart';
$this->params['breadcrumbs'][] = ['label' => 'Book Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-cart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
