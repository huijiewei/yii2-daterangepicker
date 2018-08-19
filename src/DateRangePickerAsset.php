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
    public $sourcePath = '@npm/jquery-daterangepicker/lib/dist';

    public $css = [
        'daterangepicker.min.css',
    ];

    public $js = [
        'jquery.daterangepicker.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'huijiewei\moment\MomentAsset',
        'huijiewei\fontawesome\FontAwesomeAsset',
    ];
}