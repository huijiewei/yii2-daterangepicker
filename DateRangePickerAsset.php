<?php
/**
 * Created by PhpStorm.
 * User: huijiewei
 * Date: 15/9/4
 * Time: 17:10
 */

namespace huijiewei\daterangepicker;

use yii\web\AssetBundle;

class DateRangePickerAsset extends AssetBundle
{
    public $sourcePath = '@huijiewei/daterangepicker/assets';

    public $css = [
        'daterangepicker.min.css',
    ];

    public $js = [
        'jquery.daterangepicker.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'huijiewei\moment\MomentAsset',
    ];
}