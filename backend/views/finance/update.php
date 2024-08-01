<?php

/**
 * @var yii\web\View $this
 * @var common\models\Finance $model
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Finance',
]) . ' ' . $model->transaction_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Finances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transaction_id, 'url' => ['view', 'transaction_id' => $model->transaction_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="finance-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
