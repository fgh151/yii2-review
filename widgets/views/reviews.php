<?php
use yii\helpers\Html;

/**
 * @var \fgh151\review\models\Review[] $list
 * @var \yii\web\View $this
 */

?>

<?php if(Yii::$app->session->hasFlash('reviewOnModerate')) { ?>
    <div class="alert alert-success col-md-12" role="alert">
        <p align="center"><?= Yii::$app->session->getFlash('reviewOnModerate') ?></p>
    </div>
<?php } ?>

<?php if(empty($list)) { ?>
    <p class="notfound">Отзывов пока нет.</p>
<?php } ?>
<?php foreach ($list as $review): ?>
    <div class="row review">
        <div class="col-lg-3 left-column">
            <p><strong><?=Html::encode($review->name)?></strong></p>
            <p>Оценка <b><?=$review->vote?></b> из 10</p>
            <p><small><?=Html::encode(date('d.m.Y H:i', strtotime($review->date)))?></small></p>
        </div>
        <div class="col-lg-9 right-column">
            <p><strong>message</strong></p>
            <p><?=nl2br(Html::encode($review->message))?></p>
        </div>
    </div>
<?php endforeach ?>
