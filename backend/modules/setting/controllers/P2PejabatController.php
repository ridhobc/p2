<?php

namespace backend\modules\setting\controllers;

use backend\modules\setting\models\P2Pejabat;
use backend\modules\setting\models\P2PejabatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * P2PejabatController implements the CRUD actions for P2Pejabat model.
 */
class P2PejabatController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all P2Pejabat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new P2PejabatSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single P2Pejabat model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new P2Pejabat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new P2Pejabat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                \Yii::$app->getSession()->setFlash('success', 'Berhasil direkam');
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing P2Pejabat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('warning', 'Berhasil diubah');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing P2Pejabat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->getSession()->setFlash('warning', 'Berhasil dihapus');
        return $this->redirect(['index']);
    }

    
    public function actionAktif($id) {
        
        $model = P2Pejabat::findOne($id);
        $model->status_pejabat = 1;

        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'Pejabat siap menandatangi dokumen');
        return $this->redirect(['index']);
    
    }

    public function actionNonaktif($id) {
        
        $model = P2Pejabat::findOne($id);
        $model->status_pejabat = 0;

        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'Pejabat dinonaktifkan');
        return $this->redirect(['index']);
    
    }
    /**
     * Finds the P2Pejabat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2Pejabat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = P2Pejabat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
