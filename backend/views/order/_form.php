<?php

use common\models\Customer;
use common\models\Product;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Order $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="order-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-body">

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <div class="col-lg-3">

                    <?php
                    $productList = Product::find()->all();
                    $productData = ArrayHelper::map($productList, 'product_id', 'product_name');

                    echo $form->field($model, 'product_id')->widget(Select2::classname(), [
                        'data' => $productData,
                        'options' => ['placeholder' => 'Product ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <?php echo $form->field($model, 'order_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Order date ...'],
                        'pluginOptions' => [
                            'autoclose' => true
                        ]
                    ]); ?>
                </div>
                <div class="col-lg-3">
                    <?php
                    echo $form->field($model, 'total_amount')->widget(MaskMoney::classname(), [
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
                    echo $form->field($model, 'order_status')->widget(Select2::classname(), [
                        'data' => ['1' => 'Selesai'],
                        'options' => ['placeholder' => 'Status ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-lg-3">
                    <?php
                    $customerList = Customer::find()->all();
                    $customerData = ArrayHelper::map($customerList, 'customer_id', 'customer_name');

                    echo $form->field($model, 'customer_id')->widget(Select2::classname(), [
                        'data' => $customerData,
                        'options' => ['placeholder' => 'Customer ...'],
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