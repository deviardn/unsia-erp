<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Employee $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="employee-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hire_date')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
