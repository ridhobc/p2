<?php

namespace backend\modules\pegawai\controllers;

use Yii;
use backend\modules\pegawai\models\DbPendidikan;
use backend\modules\pegawai\models\DbPendidikanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PendidikanController implements the CRUD actions for DbPendidikan model.
 */
class PendidikanController extends Controller
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
     * Lists all DbPendidikan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DbPendidikanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DbPendidikan model.
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
     * Creates a new DbPendidikan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DbPendidikan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DbPendidikan model.
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

    public function actionUpload() {
        $model = new DbPendidikan();
        $searchModel = new DbPendidikanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('upload', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionImport() {
        if (!empty($_FILES)) {
            $importFile = \yii\web\UploadedFile::getInstanceByName('import');
            $inputFileType = \PHPExcel_IOFactory::identify($importFile->tempName);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($importFile->tempName);
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $baseRow = 2;
            $i = 0;
            $row = $i + $baseRow;
            function ubahTgl($tgl) {
                    $arr = explode('-', $tgl);
                    $newDate = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
                    return $newDate;
                }
            while (!empty($sheetData[$row]['A'])) {                

                // get data via row dan colom
                $KdPendidikanAkhir = $sheetData[$row]['A'];
                $NmPendidikanAkhir = ubahTgl($sheetData[$row]['B']);
                
                //cek nama nip
                //cek data klu ada
                $count = DbPendidikan::find()
                        ->where(['kd_pendidikan' => $KdPendidikanAkhir])
                        ->count();
                if ($count > 0) {
                    // update database
                    $modelupdate = DbPendidikan::findOne(['kd_pendidikan' => $KdPendidikanAkhir]);
                    $modelupdate->kd_pendidikan = $KdPendidikanAkhir;
                    $modelupdate->nm_pendidikan = $NmPendidikanAkhir;
                    
                    $modelupdate->save();
                    $i++;
                    $row = $i + $baseRow;
                } else {
                    // save database
                    $model = new DbPendidikan([
                        'kd_pendidikan' => $KdPendidikanAkhir,
                        'nm_pendidikan' => $NmPendidikanAkhir,
                        
                    ]);
                    $model->save();
                    $i++;

                    $row = $i + $baseRow;
                }
            }
        }
        \Yii::$app->getSession()->setFlash('success', 'Data Berhasil di upload!');
        return $this->redirect(['upload']);
    }
    /**
     * Deletes an existing DbPendidikan model.
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
     * Finds the DbPendidikan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DbPendidikan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DbPendidikan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
