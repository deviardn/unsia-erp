<?php

/**
 * @var yii\web\View $this
 * @var common\models\OrderDetail $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Order Detail',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
