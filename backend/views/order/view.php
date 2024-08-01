<?php

use common\models\Customer;
use common\models\Product;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Order $model
 */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'order_id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'order_id' => $model->order_id], [
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
                    'order_id',
                    'order_date',
                    [
                        'attribute' => 'total_amount',
                        'value' => function ($model) {
                            $hasilAkhir = Yii::$app->formatter->asCurrency($model['total_amount']);
                            return str_replace("$", "Rp", $hasilAkhir);
                        }
                    ],
                    [
                        'attribute' => 'order_status',
                        'value' => function ($model) {
                            if ($model['order_status'] == '1') {
                                $status = 'Selesai';
                            }

                            return $status;
                        }
                    ],
                    [
                        'attribute' => 'customer_id',
                        'value' => function ($model) {
                            $dataCustomer = Customer::find()->where(['customer_id' => $model->customer_id])->one();
                            return $dataCustomer['customer_name'];
                        }
                    ],

                ],
            ]) ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Product Detail
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Product</td>
                        <td>Harga</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($modelOrderDetail as $modelOrderDetail) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?php
                                $productDetail = Product::find()->where(['product_id' => $modelOrderDetail['product_id']])->one();
                                echo $productDetail['product_name'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                echo 'Rp'.number_format($productDetail['price']);
                                ?>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>

                </tbody>
            </table>


        </div>
    </div>
</div>