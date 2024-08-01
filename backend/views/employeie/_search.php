<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Employee $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'employee_id') ?>
    <?php echo $form->field($model, 'employee_name') ?>
    <?php echo $form->field($model, 'position') ?>
    <?php echo $form->field($model, 'salary') ?>
    <?php echo $form->field($model, 'hire_date') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
