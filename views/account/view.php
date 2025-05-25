<?php

use app\models\Status;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BookCart $model */

$this->title = 'Карточка № ' . $model->title . ' от ' .
    Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i.s');
$this->params['breadcrumbs'][] = ['label' => 'Карточки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-cart-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Назад', ['index', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'author',
            'title',
            [
                'attribute' => 'status_id',
                'value' => Status::getStatuses()[$model->status_id]
            ],
            [
                'attribute' => 'sharing',
                'value' => "отмечено"
            ],
            [
                'attribute' => 'to_lib',
                'value' => "отмечено"
            ],

            [
                'attribute' => 'reason',
                'format' => 'ntext',
                'value' => $model->reason,
                'visible' => (bool)$model->reason
            ],
            [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i.s')
            ],
        ],
    ]) ?>

</div>