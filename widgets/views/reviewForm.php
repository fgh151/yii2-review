<?php
use yii\widgets\ActiveForm;

/**
 * @var \fgh151\review\models\Review $reviewModel
 * @var array $votes
 * @var \yii\web\View $this
 */
?>

<div class="add-review">
    <?php if(Yii::$app->session->hasFlash('reviewAddFail')) { ?>
        <div class="alert alert-danger col-md-12" role="alert">
            <p align="center"><?= Yii::$app->session->getFlash('reviewAddFail') ?></p>
        </div>
    <?php } ?>
    
    <?php $form = ActiveForm::begin(['action' => ['/review/review/add']]); ?>
        <div class="col-md-6">
            <?= $form->field($reviewModel, 'name')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($reviewModel, 'vote')->dropDownList($votes) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($reviewModel, 'message')->textarea() ?>
        </div>
    <?= $form->field($reviewModel, 'itemId')->hiddenInput();?>
    <?= $form->field($reviewModel, 'entity')->hiddenInput();?>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success">
                Добавить отзыв
            </button>
        </div>
    <?php ActiveForm::end(); ?>
</div>
