<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\OrderDetail $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="order-detail-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'quantity')->textInput() ?>
                <?php echo $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'order_id')->textInput() ?>
                <?php echo $form->field($model, 'product_id')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
