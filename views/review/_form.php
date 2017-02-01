<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \fgh151\review\models\Review $model
 * @var \yii\web\View $this
 */

?>

<div class="review-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'active')->dropDownList(['yes' => 'Да', 'no' => 'Нет']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'date')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'itemId')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'vote')->textInput(['type' => 'number']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'userId')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'message')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>