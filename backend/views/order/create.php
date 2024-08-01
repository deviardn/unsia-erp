<?php

/**
 * @var yii\web\View $this
 * @var common\models\Order $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Order',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
