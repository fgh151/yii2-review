<?php
/**
 * Created by PhpStorm.
 * User: fgorsky
 * Date: 01.02.17
 * Time: 12:25
 */

namespace fgh151\review\components;

trait OverrideView
{
    public $viewFolder;

    public function getViewPath()
    {
        return $this->viewFolder ? \Yii::getAlias($this->viewFolder ) : parent::getViewPath();
    }

}