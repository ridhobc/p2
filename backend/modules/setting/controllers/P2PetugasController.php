<?php

namespace backend\modules\setting\controllers;

use backend\modules\setting\models\P2Petugas;
use backend\modules\setting\models\P2PetugasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * P2PetugasController implements the CRUD actions for P2Petugas model.
 */
class P2PetugasController extends Controller
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
     * Lists all P2Petugas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new P2PetugasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single P2Petugas model.
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
     * Creates a new P2Petugas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new P2Petugas();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->kd_kantor = \Yii::$app->user->identity->kd_kantor;
                //simpan ke database
                $model->save();
                  Yii::$app->session->setFlash('success', 'berhasil direkam');
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
     * Updates an existing P2Petugas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'berhasil diubah');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionAktif($id) {
        
        $model = P2Petugas::findOne($id);
        $model->status_aktif = 1;

        $model->save();
        \Yii::$app->getSession()->setFlash('warning', 'Petugas dinonaktifkan');
        return $this->redirect(['index']);
    
    }

    public function actionNonaktif($id) {
        
        $model = P2Petugas::findOne($id);
        $model->status_aktif = 0;

        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'Petugas diaktifkan');
        return $this->redirect(['index']);
    
    }
    /**
     * Deletes an existing P2Petugas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('warning', 'berhasil dihapus');
        return $this->redirect(['index']);
    }

    /**
     * Finds the P2Petugas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2Petugas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = P2Petugas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
