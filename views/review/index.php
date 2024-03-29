<?php
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 * @var \fgh151\review\models\ReviewSearch $searchModel
 * @var \yii\web\View $this
 */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="review-index">

    <?= Html::a('Добавить отзыв', ['create'], ['class' => 'btn btn-success']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'id', 'filter' => false, 'options' => ['style' => 'width: 49px;']],
            'name',
            'date',
            'vote',
            [
                'attribute' => 'active',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'active',
                    [true => 'Да', false => 'Нет'],
                    ['class' => 'form-control', 'prompt' => 'Показано']
                ),
                'format' => 'boolean',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttonOptions' => [
                    'class' => 'btn btn-default'
                ],
                'options' => [
                    'style' => 'width: 145px;'
                ]
            ],
        ],
    ]); ?>

</div>