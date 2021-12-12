<?php

namespace backend\modules\p2\controllers;

use backend\modules\p2\models\P2IntelLppi;
use backend\modules\p2\models\P2IntelLppiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * P2IntelLppiController implements the CRUD actions for P2IntelLppi model.
 */
class P2IntelLppiController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(), [
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
     * Lists all P2IntelLppi models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new P2IntelLppiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single P2IntelLppi model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $searchModel = new \backend\modules\p2\models\P2IntelLppiDetailSearch([
            'lppi_id' => $id,
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('view', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new P2IntelLppi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new P2IntelLppi();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->kd_kantor = \Yii::$app->user->identity->kd_kantor;
                $model->save();
                Yii::$app->session->setFlash('success', 'berhasil direkam');
                return $this->redirect(['next', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionNext($id) {
        $model = $this->findModel($id);
        $searchModel = new \backend\modules\p2\models\P2IntelLppiDetailSearch([
            'lppi_id' => $id,
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('next', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing P2IntelLppi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $searchModel = new \backend\modules\p2\models\P2IntelLppiDetailSearch([
            'lppi_id' => $id,
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing P2IntelLppi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionAmbilNoLppi($id) {
        $model = $this->findModel($id);

        //buat surat
        $surat = new \backend\modules\p2\models\P2IntelLppiNosurat();
        $surat->tgl_lppi = date('Y-m-d');
        $surat->lppi_id = $id;
        $surat->save();

        $nomorsurat = \backend\modules\p2\models\P2IntelLppiNosurat::find()
                ->where(['lppi_id' => $id])
                ->one();

        $nomorsuratambil = substr($nomorsurat->no_lppi, 0, 3);
        $nomorsurat->no_lppi_nomor = $nomorsuratambil;
        $nomorsurat->save();


        $model->no_lppi = $nomorsuratambil;
        $model->tgl_lppi = $nomorsurat->tgl_lppi;
        $model->save();


        \Yii::$app->getSession()->setFlash('success', 'Nomor Surat Berhasil di simpan');
        return $this->redirect(['view', 'id' => $model->id]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the P2IntelLppi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2IntelLppi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = P2IntelLppi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
