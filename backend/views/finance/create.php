<?php

/**
 * @var yii\web\View $this
 * @var common\models\Finance $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Finance',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Finances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finance-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
