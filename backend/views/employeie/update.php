<?php

/**
 * @var yii\web\View $this
 * @var common\models\Employee $model
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Employee',
]) . ' ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'employee_id' => $model->employee_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="employee-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
