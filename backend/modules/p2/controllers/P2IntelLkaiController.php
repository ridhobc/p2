<?php

namespace backend\modules\p2\controllers;

use backend\modules\p2\models\P2IntelLkai;
use backend\modules\p2\models\P2IntelLkaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * P2IntelLkaiController implements the CRUD actions for P2IntelLkai model.
 */
class P2IntelLkaiController extends Controller {

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
     * Lists all P2IntelLkai models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new P2IntelLkaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        ]);
        }

        /**
         * Displays a single P2IntelLkai model.
         * @param int $id ID
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
        public function actionView($id)
        {
        $model = $this->findModel($id);
        $modelview = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('view', [
                    'model' => $model,
             'modelview' => $modelview,
        ]);
    }

    /**
     * Creates a new P2IntelLkai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new P2IntelLkai();

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


        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {


                //simpan ke database
                $model->save();
                Yii::$app->session->setFlash('success', 'berhasil direkam');
                return $this->redirect(['next1', 'id' => $id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('next', [
                    'model' => $model,
        ]);
    }

    public function actionNext1($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('next1', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing P2IntelLkai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }
    /**
     * Deletes an existing P2IntelLkai model.
     * Ambil nomor surat
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    public function actionAmbilNoLkai($id) {
        $model = $this->findModel($id);

        //buat surat
        $surat = new \backend\modules\p2\models\P2IntelLkaiNosurat();
        $surat->tgl_lkai = date('Y-m-d');
        $surat->lkai_id = $id;
        $surat->save();

        $nomorsurat = \backend\modules\p2\models\P2IntelLkaiNosurat::find()
                ->where(['lkai_id' => $id])
                ->one();

        $nomorsuratambil = substr($nomorsurat->no_lkai, 0, 3);
        $nomorsurat->no_lkai_nomor = $nomorsuratambil;
        $nomorsurat->save();


        $model->no_lkai = $nomorsuratambil;
        $model->tgl_lkai = $nomorsurat->tgl_lkai;
        $model->save();


        \Yii::$app->getSession()->setFlash('success', 'Nomor Surat Berhasil di simpan');
        return $this->redirect(['view', 'id' => $model->id]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing P2IntelLkai model.
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
     * Finds the P2IntelLkai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2IntelLkai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = P2IntelLkai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
