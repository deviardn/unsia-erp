<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\OrderDetail $model
 */

$this->title = $model->order_detail_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'order_detail_id' => $model->order_detail_id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'order_detail_id' => $model->order_detail_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'order_detail_id',
                    'quantity',
                    'price',
                    'order_id',
                    'product_id',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
