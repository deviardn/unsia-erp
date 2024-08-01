<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Finance $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="finance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'transaction_id') ?>
    <?php echo $form->field($model, 'transaction_date') ?>
    <?php echo $form->field($model, 'transaction_type') ?>
    <?php echo $form->field($model, 'amount') ?>
    <?php echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
