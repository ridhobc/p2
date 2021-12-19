<?php

namespace backend\modules\p2\controllers;

use backend\modules\p2\models\P2IntelNp;
use backend\modules\p2\models\P2IntelNpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * P2IntelNpController implements the CRUD actions for P2IntelNp model.
 */
class P2IntelNpController extends Controller
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
     * Lists all P2IntelNp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new P2IntelNpSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single P2IntelNp model.
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
     * Creates a new P2IntelNp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new P2IntelNp();

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
     * Updates an existing P2IntelNp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'berhasil disimpan');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    //ambil no np
    public function actionAmbilNoNp($id) {
        $model = $this->findModel($id);

        //buat surat
        $surat = new \backend\modules\p2\models\P2IntelNpNosurat();
        $surat->tgl_np = date('Y-m-d');
        $surat->np_id = $id;
        $surat->save();

        $nomorsurat = \backend\modules\p2\models\P2IntelNpNosurat::find()
                ->where(['np_id' => $id])
                ->one();

        $nomorsuratambil = substr($nomorsurat->no_np, 0, 3);
        $nomorsurat->no_np_nomor = $nomorsuratambil;
        $nomorsurat->save();


        $model->no_np = $nomorsuratambil;
        $model->tgl_np = $nomorsurat->tgl_np;
        $model->save();


        \Yii::$app->getSession()->setFlash('success', 'Nomor Surat Berhasil di simpan');
        return $this->redirect(['view', 'id' => $model->id]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    /**
     * Deletes an existing P2IntelNp model.
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
     * Finds the P2IntelNp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2IntelNp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = P2IntelNp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
