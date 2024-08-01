<?php

/**
 * @var yii\web\View $this
 * @var common\models\OrderDetail $model
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Order Detail',
]) . ' ' . $model->order_detail_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_detail_id, 'url' => ['view', 'order_detail_id' => $model->order_detail_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="order-detail-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
