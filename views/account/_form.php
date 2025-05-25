<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BookCart $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="book-cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sharing_option')->radioList([
        1 => 'Готов поделиться',
        2 => 'Хочу в свою библиотеку'])?>

    <div class="form-group">
        <?= Html::submitButton('отправить', ['class' => 'btn btn-outline-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>