<?php
namespace fgh151\review\assets;

use yii\web\AssetBundle;

class Asset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $css = [
        'css/styles.css',
    ];

    public function init()
    {
        $this->sourcePath = dirname(__DIR__).'/assets';
        parent::init();
    }
}
