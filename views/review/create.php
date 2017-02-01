<?php

/**
 * @var \fgh151\review\models\Review $model
 * @var \yii\web\View $this
 */

$this->title = 'Добавление отзыва';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавление';
?>
<div class="review-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
