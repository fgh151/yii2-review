<?php
namespace fgh151\review\widgets;

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
                'itemId' => $this->itemId,
                'active' => 'yes',
                'entity' => $this->entity
            ])
            ->all();
        
		return $this->render('reviews',[
			'list' => $list,
		]);
	}
}
