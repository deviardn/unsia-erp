<?php

/**
 * @var yii\web\View $this
 * @var common\models\Order $model
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Order',
]) . ' ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'order_id' => $model->order_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="order-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
