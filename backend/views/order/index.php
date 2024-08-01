<?php

use common\models\Customer;
use common\models\Order;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\search\OrderSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Orders');
$this->params['breadcrumbs'][] = $this->title;

$totalOrder = Order::find()->count();

$query = (new \yii\db\Query())->from('order');
$totalRupiah = $query->sum('total_amount');
?>
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totalOrder ?></h3>
                <p>Total Order</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= 'Rp'.number_format($totalRupiah) ?><sup style="font-size: 20px"></sup></h3>
                <p>Total Pendapatan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

   

</div>
<div class="order-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                'modelClass' => 'Order',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
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

                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>

        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>