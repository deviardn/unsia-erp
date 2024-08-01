<?php

use common\models\Employee;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\search\FinanceSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Finances');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finance-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Finance',
]), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
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

                    'transaction_id',
                    'transaction_date',
                    [
                        'attribute' => 'transaction_type',
                        'value' => function ($model) {
                            if ($model['transaction_type'] == '1') {
                                $status = 'Pembayaran Gaji';
                            }

                            return $status;
                        }
                    ],
                    [
                        'attribute' => 'amount',
                        'value' => function ($model) {
                            $hasilAkhir = Yii::$app->formatter->asCurrency($model['amount']);
                            return str_replace("$", "Rp", $hasilAkhir);
                        }
                    ],
                    [
                        'attribute' => 'description',
                        'value' => function ($model) {
                            $dataCustomer = Employee::find()->where(['employee_id' => $model->description])->one();
                            return $dataCustomer['employee_name'];
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
