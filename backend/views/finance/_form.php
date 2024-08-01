<?php

use common\models\Customer;
use common\models\Employee;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\money\MaskMoney;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Finance $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="finance-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-body">
            <?php echo $form->errorSummary($model); ?>
            <div class="row">


                <div class="col-lg-3">
                    <?php echo $form->field($model, 'transaction_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'date ...'],
                        'pluginOptions' => [
                            'autoclose' => true
                        ]
                    ]); ?>

                </div>
                <div class="col-lg-3">
                    <?php
                    echo $form->field($model, 'transaction_type')->widget(Select2::classname(), [
                        'data' => ['1' => 'Pembayaran Gaji'],
                        'options' => ['placeholder' => 'Status ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-lg-3">
                    <?php
                    echo $form->field($model, 'amount')->widget(MaskMoney::classname(), [
                        'pluginOptions' => [
                            'prefix' => 'Rp ',
                            'suffix' => '',
                            'allowNegative' => false
                        ]
                    ]);
                    ?>
                </div>
                <div class="col-lg-3">
                    <?php
                    $customerList = Employee::find()->all();
                    $customerData = ArrayHelper::map($customerList, 'employee_id', 'employee_name');

                    echo $form->field($model, 'description')->widget(Select2::classname(), [
                        'data' => $customerData,
                        'options' => ['placeholder' => 'Employee ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);

                    ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>