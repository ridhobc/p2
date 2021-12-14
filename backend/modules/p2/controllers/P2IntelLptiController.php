<?php

namespace backend\modules\p2\controllers;

use backend\modules\p2\models\P2IntelLpti;
use backend\modules\p2\models\P2IntelLptiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * P2IntelLptiController implements the CRUD actions for P2IntelLpti model.
 */
class P2IntelLptiController extends Controller {

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
     * Lists all P2IntelLpti models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new P2IntelLptiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single P2IntelLpti model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $modelstpi = \backend\modules\p2\models\P2IntelStpi::find()
                ->where([
                    'id' => $model->stpi_id, //status aktif
                ])
                ->one();
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'modelstpi' => $modelstpi,
        ]);
    }

    /**
     * Creates a new P2IntelLpti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new P2IntelLpti();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->kd_kantor = \Yii::$app->user->identity->kd_kantor;

                //simpan ke database
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
        $modelstpi = \backend\modules\p2\models\P2IntelStpi::find()
                ->where(['id' => $model->stpi_id])
                ->one();
        $searchModel = new \backend\modules\p2\models\P2IntelStpiPetugasSearch([
            'id_intel_stpi' => $model->stpi_id,
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('warning', 'Data berhasil diubah');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('next', [
                    'model' => $model,
                    'modelstpi' => $modelstpi,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing P2IntelLpti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('warning', 'Data berhasil diubah');
            return $this->redirect(['next', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionAmbilNoLpti($id) {
        $model = $this->findModel($id);

        //buat surat
        $surat = new \backend\modules\p2\models\P2IntelLptiNosurat();
        $surat->tgl_lpti = date('Y-m-d');
        $surat->lpti_id = $id;
        $surat->save();

        $nomorsurat = \backend\modules\p2\models\P2IntelLptiNosurat::find()
                ->where(['lpti_id' => $id])
                ->one();

        $nomorsuratambil = substr($nomorsurat->no_lpti, 0, 3);
        $nomorsurat->no_lpti_nomor = $nomorsuratambil;
        $nomorsurat->save();


        $model->no_lpti = $nomorsuratambil;
        $model->tgl_lpti = $nomorsurat->tgl_lpti;
        $model->save();


        \Yii::$app->getSession()->setFlash('success', 'Nomor Surat Berhasil di simpan');
        return $this->redirect(['view', 'id' => $model->id]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing P2IntelLpti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('warning', 'Data berhasil dihapus');
        return $this->redirect(['index']);
    }

    /**
     * Finds the P2IntelLpti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2IntelLpti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = P2IntelLpti::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
