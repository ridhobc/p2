<?php

namespace backend\modules\p2\controllers;

use backend\modules\p2\models\P2IntelStpi;
use backend\modules\p2\models\P2IntelStpiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii2mod\alert\Alert;

/**
 * P2IntelStpiController implements the CRUD actions for P2IntelStpi model.
 */
class P2IntelStpiController extends Controller {

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
     * Lists all P2IntelStpi models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new P2IntelStpiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single P2IntelStpi model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new P2IntelStpi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new P2IntelStpi();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->kd_kantor = \Yii::$app->user->identity->kd_kantor;
                $model->tgl_rekam = date('Y-m-d');
                //simpan ke database
                $model->save();
                Yii::$app->session->setFlash('success', 'berhasil direkam');
                return $this->redirect(['view', 'idx' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionView($idx) {
        if (Yii::$app->request->post('hasEditable')) {
            $petugasid = Yii::$app->request->post('editableKey');
            $model = \backend\modules\p2\models\P2IntelStpiPetugas::findOne($petugasid);

            $out = \yii\helpers\Json::encode(['output' => '', 'message' => '']);
            $post = [];
            $posted = current($_POST['P2IntelStpiPetugas']);
            $post['P2IntelStpiPetugas'] = $posted;
            if ($model->load($post)) {
                $model->save();

                $out = \yii\helpers\Json::encode(['output' => $output, 'message' => '']);
            }
            echo $out;
            return;
        }
        return $this->render('view', [
                    'model' => $this->findModel($idx),
                    'idx' => $idx,
        ]);
    }

    public function actionTambahkan($nip, $idx) {
        $cari_petugas = \backend\modules\p2\models\P2IntelStpiPetugas::find()
                ->where(['nip_pegawai' => $nip, 'id_intel_stpi' => $idx])
                ->count();

        if ($cari_petugas > 0) {//jika lebih dari 0 maka ditolak karena sudah pernah diinput
            \Yii::$app->getSession()->setFlash('error', 'Gagal! Nama sudah ada dalam ST');
            return $this->redirect(['view', 'idx' => $idx]);
        } else {
            $model = $this->findModel($idx); //model dari tab_masuk_rek
            $petugas = \backend\modules\setting\models\P2Petugas::find()
                    ->where(['nip_petugas' => $nip])
                    ->one();
            $simpandetail = new \backend\modules\p2\models\P2IntelStpiPetugas([
                'nip_pegawai' => $nip,
                'kd_kantor' => \Yii::$app->user->identity->kd_kantor,
                'id_intel_stpi' => $idx,
                'status_pegawai' => '',
            ]);
            $simpandetail->save();

//            
            if ($simpandetail->save()) {

                \Yii::$app->getSession()->setFlash('info', 'Berhasil ditambahkan');
                return $this->redirect(['view', 'idx' => $model->id]);
            } else {
                echo "tidak tersimpan" . $nip;
            }
        }
    }

    public function actionDeletedetail($id, $nip_pegawai, $idx) {
        $cari_petugas = \backend\modules\p2\models\P2IntelStpiPetugas::find()
                ->where(['nip_pegawai' => $nip_pegawai, 'id_intel_stpi' => $idx])
                ->count();

        if ($cari_petugas > 0) {
            $deletedetail = \backend\modules\p2\models\P2IntelStpiPetugas::find()
                    ->where(['nip_pegawai' => $nip_pegawai, 'id_intel_stpi' => $idx])
                    ->one();

            $deletedetail->delete();

            \Yii::$app->getSession()->setFlash('warning', 'Berhasil dihapus');
            return $this->redirect(['view', 'idx' => $idx]);
        } else {
            echo "tidak terhapus";
            echo "$deletedetail";
        }
    }

    public function actionAmbilNoStpi($id) {
        $model = $this->findModel($id);

        //buat surat
        $surat = new \backend\modules\p2\models\P2IntelStpiNosurat();
        $surat->tgl_stpi = date('Y-m-d');
        $surat->stpi_id = $id;
        $surat->save();

        $nomorsurat = \backend\modules\p2\models\P2IntelStpiNosurat::find()
                ->where(['stpi_id' => $id])
                ->one();

        $nomorsuratambil = substr($nomorsurat->no_stpi, 0, 3);
        $nomorsurat->no_surat_nomor = $nomorsuratambil;
        $nomorsurat->save();


        $model->no_stpi = $nomorsuratambil;
        $model->tgl_stpi = $nomorsurat->tgl_stpi;
        $model->save();


        \Yii::$app->getSession()->setFlash('success', 'Nomor Surat Berhasil di simpan');
        return $this->redirect(['view', 'idx' => $model->id]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing P2IntelStpi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('warning', 'Data berhasil diubah');
            return $this->redirect(['view', 'idx' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionLpti($id) {
        $model = $this->findModel($id);
        $modellpti = new \backend\modules\p2\models\P2IntelLpti();

         if ($this->request->isPost) {
            if ($modellpti->load(Yii::$app->request->post())) {
                $modellpti->kd_kantor = \Yii::$app->user->identity->kd_kantor;
                $modellpti->stpi_id = $model->id;
                //simpan ke database
                $model->save();
                Yii::$app->session->setFlash('success', 'berhasil direkam');
                return $this->redirect(['view-lpti', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('lpti', [
                    'model' => $model,
                    'modellpti' => $modellpti,
        ]);
    }
    
    public function actionViewLpti($id) {
        $model = $this->findModel($id);
        $modellpti = \backend\modules\p2\models\P2IntelLpti::find()
                    ->where([
                        'stpi_id' => $model->id, //status aktif
                    ])
                    ->one();
        return $this->render('view-lpti', [
                    'model' => $this->findModel($id),
                    'modellpti' => $modellpti,
        ]);
    }

    /**
     * Deletes an existing P2IntelStpi model.
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
     * Finds the P2IntelStpi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return P2IntelStpi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = P2IntelStpi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
