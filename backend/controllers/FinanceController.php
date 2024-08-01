<?php

namespace backend\controllers;

use Yii;
use common\models\Finance;
use common\models\search\FinanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FinanceController implements the CRUD actions for Finance model.
 */
class FinanceController extends Controller
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Finance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FinanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Finance model.
     * @param int $transaction_id Transaction ID
     * @return mixed
     */
    public function actionView($transaction_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($transaction_id),
        ]);
    }

    /**
     * Creates a new Finance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Finance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'transaction_id' => $model->transaction_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Finance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $transaction_id Transaction ID
     * @return mixed
     */
    public function actionUpdate($transaction_id)
    {
        $model = $this->findModel($transaction_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'transaction_id' => $model->transaction_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Finance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $transaction_id Transaction ID
     * @return mixed
     */
    public function actionDelete($transaction_id)
    {
        $this->findModel($transaction_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Finance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $transaction_id Transaction ID
     * @return Finance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($transaction_id)
    {
        if (($model = Finance::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
