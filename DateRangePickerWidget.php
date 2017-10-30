<?php
/**
 * Created by PhpStorm.
 * User: huijiewei
 * Date: 5/24/15
 * Time: 10:48
 */

namespace huijiewei\daterangepicker;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;

class DateRangePickerWidget extends InputWidget
{
    public $clientOptions = [];

    public function init()
    {
        parent::init();

        $this->options = ArrayHelper::merge([
            'class' => 'form-control',
        ], $this->options);

        $this->clientOptions = ArrayHelper::merge([
            'separator' => ' - '
        ], $this->clientOptions);

        DateRangePickerAsset::register($this->view);

        $this->registerScript();
    }

    public function run()
    {
        $html = '<div class="input-group">';

        if ($this->hasModel()) {
            $html .= Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $html .= Html::textInput($this->name, $this->value, $this->options);
        }
        $html .= '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>';
        $html .= '</div>';

        return $html;
    }

    public function registerScript()
    {
        $clientOptions = Json::encode($this->clientOptions);

        $js = <<<EOD
            $('#{$this->id}').dateRangePicker($clientOptions).bind('datepicker-apply',function(event,obj) {
                if(obj.date1.getUTCDate() && obj.date2.getUTCDate()) {
                    $('#{$this->id}').trigger('change');
                }
            });
EOD;

        $this->getView()->registerJs($js, View::POS_END);
    }
}
