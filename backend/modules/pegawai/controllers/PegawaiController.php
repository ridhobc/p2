<?php

namespace backend\modules\pegawai\controllers;

use Yii;
use backend\modules\pegawai\models\DbPegawaiMasterNew;
use backend\modules\pegawai\models\DbPegawaiMasterNewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PegawaiController implements the CRUD actions for DbPegawaiMasterNew model.
 */
class PegawaiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DbPegawaiMasterNew models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DbPegawaiMasterNewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionLagiCuti()
    {
        $searchModel = new DbPegawaiMasterNewSearch([
            'FlCuti'=>'Y'
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lagi-cuti', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionLagiDiklat()
    {
        $searchModel = new DbPegawaiMasterNewSearch([
            'FlDiklat'=>'Y'
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lagi-diklat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionLagiTugasbelajar()
    {
        $searchModel = new DbPegawaiMasterNewSearch([
            'FlTugasBelajar'=>'Y'
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lagi-tugasbelajar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DbPegawaiMasterNew model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DbPegawaiMasterNew model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DbPegawaiMasterNew();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DbPegawaiMasterNew model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DbPegawaiMasterNew model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DbPegawaiMasterNew model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DbPegawaiMasterNew the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DbPegawaiMasterNew::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
