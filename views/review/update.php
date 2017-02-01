<?php

/**
 * @var \fgh151\review\models\Review $model
 * @var \yii\web\View $this
 */

$this->title = 'Редактирование отзыва';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="review-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
