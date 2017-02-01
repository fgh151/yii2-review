<?php
namespace fgh151\review\widgets;

use fgh151\review\components\OverrideView;
use fgh151\review\models\Review;
use fgh151\review\assets\Asset;
use yii\base\Widget;

class ReviewForm extends Widget
{
    use OverrideView;

	public $modelId;
    public $votes = [];
    public $defaultVote = 10;
    public $entity;

	public function init()
	{
        if(empty($this->votes)) {
            $this->votes = [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
            ];
        }
        
		Asset::register($this->getView());
	}

	public function run()
	{
        $reviewModel = new Review([
            'vote' => $this->defaultVote,
            'entity' => $this->entity,
            'itemId' => $this->modelId
        ]);
        
		return $this->render('reviewForm',
            [
                'reviewModel' => $reviewModel,
                'votes' => $this->votes
            ]
        );
	}
}