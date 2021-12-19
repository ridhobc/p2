<?php

namespace backend\modules\p2\controllers;

use backend\modules\p2\models\P2IntelNhi;
use backend\modules\p2\models\P2IntelNhiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
/**
 * P2IntelNhiController implements the CRUD actions for P2IntelNhi model.
 */
class P2IntelNhiController extends Controller {

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
     * Lists all P2IntelNhi models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new P2IntelNhiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single P2IntelNhi model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new P2IntelNhi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new P2IntelNhi();
        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->kd_kantor = \Yii::$app->user->identity->kd_kantor;
                $model->save();
                Yii::$app->session->setFlash('success', 'berhasil direkam');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing P2IntelNhi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->kd_kantor = \Yii::$app->user->identity->kd_kantor;
                $model->save();
                Yii::$app->session->setFlash('success', 'berhasil disimpan');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    //ambilno surat
    public function actionAmbilNoNhi($id) {
        $model = $this->findModel($id);

        //buat surat
        $surat = new \backend\modules\p2\models\P2IntelNhiNosurat();
        $surat->tgl_nhi = date('Y-m-d');
        $surat->nhi_id = $id;
        $surat->save();

        $nomorsurat = \backend\modules\p2\models\P2IntelNhiNosurat::find()
                ->where(['nhi_id' => $id])
                ->one();

        $nomorsuratambil = substr($nomorsurat->no_nhi, 0, 3);
        $nomorsurat->no_nhi_nomor = $nomorsuratambil;
        $nomorsurat->save();


        $model->no_nhi = $nomorsuratambil;
        $model->tgl_nhi = $nomorsurat->tgl_nhi;
        $model->save();


        \Yii::$app->getSession()->setFlash('success', 'Nomor Surat Berhasil di simpan');
        return $this->redirect(['view', 'id' => $model->id]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    /**
     * Deletes an existing P2IntelNhi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the P2IntelNhi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2IntelNhi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = P2IntelNhi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
