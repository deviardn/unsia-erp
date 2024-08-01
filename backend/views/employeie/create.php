<?php

/**
 * @var yii\web\View $this
 * @var common\models\Employee $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Employee',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
