<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\OrderDetail $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'order_detail_id') ?>
    <?php echo $form->field($model, 'quantity') ?>
    <?php echo $form->field($model, 'price') ?>
    <?php echo $form->field($model, 'order_id') ?>
    <?php echo $form->field($model, 'product_id') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
