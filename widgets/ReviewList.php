<?php
namespace fgh151\review\widgets;

use fgh151\review\components\OverrideView;
use fgh151\review\models\Review;
use fgh151\review\assets\Asset;
use yii\base\Widget;

/**
 * Class ReviewList
 * @package fgh151\review\widgets
 * @property integer $itemId
 * @property integer $limit
 * @property string $entity
 */

class ReviewList extends Widget
{
    use OverrideView;

	public $itemId = null;
	public $limit = 200;
    public $entity;

	public function init()
	{
		Asset::register($this->getView());
	}

	public function run()
	{
        $list = Review::find()
            ->limit($this->limit)
            ->where([
                'item_id' => $this->itemId,
                'active' => true,
                'entity' => $this->entity
            ])
            ->all();
        
		return $this->render('reviews',[
			'list' => $list,
		]);
	}
}
