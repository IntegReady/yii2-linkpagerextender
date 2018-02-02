<?php

namespace integready\linkpagerextender;

use yii\web\AssetBundle;

/**
 * Class LinkPagerAssets
 */
class LinkPagerAssets extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@integready/linkpagerextender/assets';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/script.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
