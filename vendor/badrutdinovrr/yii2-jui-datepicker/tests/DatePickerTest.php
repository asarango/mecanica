<?php

namespace yii\jui\datepicker\tests;

use yii\widgets\ActiveForm;
use yii\jui\datepicker\DatePicker;
use yii\jui\datepicker\DatePickerAsset;
use yii\jui\datepicker\DatePickerLanguageAsset;
use yii\jui\datepicker\DatePickerLanguageFixAsset;
use DateTime;
use DateTimeInterface;
use Exception;
use yii\jui\datepicker\FormatConverter;
use yii\helpers\Html;
use yii\phpunit\TestCase;
use yii\web\View;
use Yii;

class DatePickerTest extends TestCase
{

    const MODE_NAME_VALUE = 1;
    const MODE_NAME_VALUE_AJAX = 2;
    const MODE_MODEL_ATTRIBUTE = 3;
    const MODE_MODEL_ATTRIBUTE_AJAX = 4;
    const MODE_MODEL_ATTRIBUTE_VALUE = 5;
    const MODE_MODEL_ATTRIBUTE_VALUE_AJAX = 6;

    /**
     * @param int $mode
     * @param string $value
     * @param array $config
     * @return string
     */
    protected function getActual($mode, $value, array $config = [])
    {
        switch ($mode) {
            case static::MODE_NAME_VALUE_AJAX:
            case static::MODE_MODEL_ATTRIBUTE_AJAX:
            case static::MODE_MODEL_ATTRIBUTE_VALUE_AJAX:
                /* @var $request \yii\jui\datepicker\tests\Request */
                $request = Yii::$app->getRequest();
                $request->setIsAjax(true);
        }
        switch ($mode) {
            case static::MODE_NAME_VALUE:
            case static::MODE_NAME_VALUE_AJAX:
                DatePicker::$counter = 0;
                return DatePicker::widget(array_merge($config, [
                    'name' => 'date',
                    'value' => $value
                ]));
            case static::MODE_MODEL_ATTRIBUTE_VALUE:
            case static::MODE_MODEL_ATTRIBUTE_VALUE_AJAX:
                $model = new TestForm;
                if (array_key_exists('options', $config)) {
                    $config['options']['value'] = $value;
                } else {
                    $config['options'] = ['value' => $value];
                }
            case static::MODE_MODEL_ATTRIBUTE:
            case static::MODE_MODEL_ATTRIBUTE_AJAX:
                if (!isset($model)) {
                    $model = new TestForm;
                    $model->date = $value;
                }
                ob_start();
                ob_implicit_flush(false);
                $form = ActiveForm::begin();
                $actual = (string)$form->field($model, 'date', ['template' => '{input}'])->widget(DatePicker::className(), $config);
                ActiveForm::end();
                ob_end_clean();
                return $actual;
        }
        throw new Exception;
    }

    /**
     * @param int $mode
     * @return array
     */
    protected function getIdName($mode)
    {
        switch ($mode) {
            case static::MODE_NAME_VALUE:
            case static::MODE_NAME_VALUE_AJAX:
                $id = 'w0';
                $name = 'date';
                return [$id, $name];
            case static::MODE_MODEL_ATTRIBUTE:
            case static::MODE_MODEL_ATTRIBUTE_AJAX:
            case static::MODE_MODEL_ATTRIBUTE_VALUE:
            case static::MODE_MODEL_ATTRIBUTE_VALUE_AJAX:
                $id = 'testform-date';
                $name = 'TestForm[date]';
                return [$id, $name];
        }
        throw new Exception;
    }

    /**
     * @param int $mode
     * @param string $actual
     * @param string $expectedHtml
     * @param string $expectedJs
     */
    protected function checkExpected($mode, $actual, $expectedHtml, $expectedJs)
    {
        switch ($mode) {
            case static::MODE_MODEL_ATTRIBUTE:
            case static::MODE_MODEL_ATTRIBUTE_VALUE:
                $expectedHtml = '<div class="form-group field-testform-date">' . "\n" . $expectedHtml . "\n" . '</div>';
            case static::MODE_NAME_VALUE:
                $this->assertEquals($expectedHtml, $actual);
                $view = Yii::$app->getView();
                $this->assertArrayHasKey(DatePickerAsset::className(), $view->assetBundles);
                $this->assertArrayHasKey(DatePickerLanguageAsset::className(), $view->assetBundles);
                $this->assertArrayHasKey(DatePickerLanguageFixAsset::className(), $view->assetBundles);
                $this->assertArrayHasKey(View::POS_READY, $view->js);
                $jsKey = md5($expectedJs);
                $this->assertArrayHasKey($jsKey, $view->js[View::POS_READY]);
                $this->assertEquals($expectedJs, $view->js[View::POS_READY][$jsKey]);
                return;
            case static::MODE_NAME_VALUE_AJAX:
                $expectedHtml .= '<script>' . $expectedJs . '</script>';
                $this->assertEquals($expectedHtml, $actual);
                return;
            case static::MODE_MODEL_ATTRIBUTE_AJAX:
            case static::MODE_MODEL_ATTRIBUTE_VALUE_AJAX:
                $expectedHtml .= '<script>' . $expectedJs . '</script>';
                $expectedHtml = '<div class="form-group field-testform-date">' . "\n" . $expectedHtml . "\n" . '</div>';
                $this->assertEquals($expectedHtml, $actual);
                return;
        }
        throw new Exception;
    }

    /**
     * @return array
     */
    public function modeValueDataProvider()
    {
        $modes = [
            static::MODE_NAME_VALUE,
            static::MODE_NAME_VALUE_AJAX,
            static::MODE_MODEL_ATTRIBUTE,
            static::MODE_MODEL_ATTRIBUTE_AJAX,
            static::MODE_MODEL_ATTRIBUTE_VALUE,
            static::MODE_MODEL_ATTRIBUTE_VALUE_AJAX
        ];
        $values = [
            null,
            '',
            '1952-12-13',
            0,
            mktime(0, 0, 0),
            new DateTime
        ];
        $data = [];
        foreach ($modes as $mode) {
            foreach ($values as $value) {
                $data[] = [$mode, $value];
            }
        }
        return $data;
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidget($mode, $value)
    {
        $actual = $this->getActual($mode, $value);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetClass($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'options' => ['class' => 'something']
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="something form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetReadOnlyTrue($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'options' => ['readonly' => true]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr readonly><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd","beforeShow":function (input, inst) { return false; }});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetReadOnlyFalse($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'options' => ['readonly' => false]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetReadOnlyTrueIgnored($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'options' => ['readonly' => true],
            'clientOptions' => ['beforeShow' => null]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr readonly><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"beforeShow":null,"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetDisabledTrue($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'options' => ['disabled' => true]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr disabled><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetDisabledFalse($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'options' => ['disabled' => false]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetDateFormatFull($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'dateFormat' => 'full',
            'clientOptions' => ['dateFormat' => 'ignored']
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'full')) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('full'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetAltDateFormatYmd($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'altDateFormat' => 'php:Ymd',
            'clientOptions' => [
                'altField' => 'ignored',
                'altFormat' => 'ignored'
            ]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyyMMdd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"altField":"#$id-alt","altFormat":"yymmdd","dateFormat":"$dateFormat"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetNumberOfMonths3($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'numberOfMonths' => 3
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"numberOfMonths":3,"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetNumberOfMonths1($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'numberOfMonths' => 1
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetNumberOfMonths3Ignored($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'numberOfMonths' => 3,
            'clientOptions' => ['numberOfMonths' => 1]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"numberOfMonths":1,"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetShowButtonPanelTrue($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'showButtonPanel' => true
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"showButtonPanel":true,"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetShowButtonPanelFalse($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'showButtonPanel' => false
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetShowButtonPanelTrueIgnored($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'showButtonPanel' => true,
            'clientOptions' => ['showButtonPanel' => false]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"showButtonPanel":false,"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetAltOptions($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'altOptions' => [
                'data-key1' => 1,
                'data-key2' => 2
            ]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr data-key1="1" data-key2="2">
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }

    /**
     * @param int $mode
     * @param string $value
     * @dataProvider modeValueDataProvider
     */
    public function testWidgetClientOptions($mode, $value)
    {
        $actual = $this->getActual($mode, $value, [
            'clientOptions' => [
                'defaultDate' => -1,
                'duration' => 'slow'
            ]
        ]);
        list ($id, $name) = $this->getIdName($mode);
        if (is_int($value) || (is_string($value) && strlen($value)) || ($value instanceof DateTime) || ($value instanceof DateTimeInterface)) {
            $formatter = Yii::$app->getFormatter();
            $encodedValueAttr = ' value="' . Html::encode($formatter->asDate($value)) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($formatter->asDate($value, 'yyyy-MM-dd')) . '"';
        } elseif (!is_null($value)) {
            $encodedValueAttr = ' value="' . Html::encode($value) . '"';
            $encodedAltValueAttr = ' value="' . Html::encode($value) . '"';
        } else {
            $encodedValueAttr = '';
            $encodedAltValueAttr = '';
        }
        $expectedHtml = <<<EXPECTED_HTML
<input type="text" id="$id" class="form-control"$encodedValueAttr><input type="hidden" id="$id-alt" name="$name"$encodedAltValueAttr>
EXPECTED_HTML;
        $dateFormat = str_replace('\'', '\u0027', FormatConverter::convertDateIcuToJui('medium'));
        $expectedJs = <<<EXPECTED_JS
jQuery('#$id').datepicker({"defaultDate":-1,"duration":"slow","dateFormat":"$dateFormat","altField":"#$id-alt","altFormat":"yy-mm-dd"});
EXPECTED_JS;
        $this->checkExpected($mode, $actual, $expectedHtml, $expectedJs);
    }
}
