<?php

namespace backend\modules\pegawai\controllers;

use Yii;
use backend\modules\pegawai\models\DbPegawaiMasterNew;
use backend\modules\pegawai\models\DbPegawaiMasterNewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SettingController implements the CRUD actions for DbPegawaiMasterNew model.
 */
class SettingController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
    public function actionIndex() {
        $searchModel = new DbPegawaiMasterNewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DbPegawaiMasterNew model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionViewPegawai($id) {
        return $this->render('view-pegawai', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DbPegawaiMasterNew model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
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
    public function actionUpdate($id) {
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
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpload() {
        $model = new DbPegawaiMasterNew();
        $searchModel = new DbPegawaiMasterNewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('upload', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCekApi($nip) {

        return $this->render('cek-api', [
                  'nip' => $nip,
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

            function umur($tgl_lahir, $delimiter = '-') {
                list($hari, $bulan, $tahun) = explode($delimiter, $tgl_lahir);
                $selisih_hari = date('d') - $hari;
                $selisih_bulan = date('m') - $bulan;
                $selisih_tahun = date('Y') - $tahun;
                if ($selisih_hari < 0 || $selisih_bulan < 0) {
                    $selisih_tahun--;
                }
                return $selisih_tahun;
            }

            function naik($tgl) {
                $arr = explode('-', $tgl);
                $newDate1 = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
                $tahundepan = mktime(0, 0, 0, $arr[1], $arr[0], $arr[2] + 4);
                $tampil = date("Y-m-d", $tahundepan);
                return $tampil;
            }

            while (!empty($sheetData[$row]['F'])) {
                // get data via row dan colom
                $NipLama = $sheetData[$row]['A'];
                $TmtEselon = ubahTgl($sheetData[$row]['B']);
                $TmtCpns = ubahTgl($sheetData[$row]['C']);
                $TmtPangkat = ubahTgl($sheetData[$row]['D']);
                $Nip = $sheetData[$row]['E'];
                $KdKantor = $sheetData[$row]['F'];
                $NmJenisJabatan = $sheetData[$row]['G'];
                $UraianJabatan = $sheetData[$row]['H'];
                $KdPangkat = $sheetData[$row]['I'];
                $MkGolTahun = $sheetData[$row]['J'];
                $MkGolBulan = $sheetData[$row]['K'];
                $KdJenisJabatan = $sheetData[$row]['L'];
                $NmPegawai = $sheetData[$row]['M'];
                $NmUnitOrganisasi = $sheetData[$row]['N'];
                $KdUnitOrganisasi = $sheetData[$row]['O'];
                $Peringkat = $sheetData[$row]['P'];
                $NmLembagaPendidikan = $sheetData[$row]['Q'];
                $NmJenisAgama = $sheetData[$row]['R'];
                $UraianPangkat = $sheetData[$row]['S'];
                $NmJenisKelamin = $sheetData[$row]['T'];
                $UrlFoto = $sheetData[$row]['U'];
                $NmStatusPegawai = $sheetData[$row]['V'];
                $KdStatusPegawai = $sheetData[$row]['W'];
                $TglLahir = ubahTgl($sheetData[$row]['X']);
                $FlCuti = $sheetData[$row]['Y'];
                $FlDiklat = $sheetData[$row]['Z'];
                $FlHukuman = $sheetData[$row]['AA'];
                $FlTugasBelajar = $sheetData[$row]['AB'];
                $LokasiLahir = $sheetData[$row]['AC'];
                $KdEselon = $sheetData[$row]['AD'];
                $NmPendidikanAkhir = $sheetData[$row]['AE'];
                $TmtJabatan = ubahTgl($sheetData[$row]['AF']);
                $KdUnitOrganisasiInduk = $sheetData[$row]['AG'];
                $NoNrp = $sheetData[$row]['AH'];
                $NmJabatanGrade = $sheetData[$row]['AI'];
                $NmPendidikanAwal = $sheetData[$row]['AJ'];
                $TglIjazahAwal = ubahTgl($sheetData[$row]['AK']);
                $TglIjazahAkhir = ubahTgl($sheetData[$row]['AL']);
                $GelarDepan = $sheetData[$row]['AM'];
                $GelarBelakang = $sheetData[$row]['AN'];
                $NmPegawaiSk = $sheetData[$row]['AO'];
                $NoKarpeg = $sheetData[$row]['AP'];
                $NPWP = $sheetData[$row]['AQ'];
                $KdPendidikanAkhir = $sheetData[$row]['AR'];
                $KdPendidikanAwal = $sheetData[$row]['AS'];
                $KdStatusPegawaiGroup = $sheetData[$row]['AT'];
                $TmtPNS = ubahTgl($sheetData[$row]['AU']);
                $Esl2 = $sheetData[$row]['AV'];
                $Esl3 = $sheetData[$row]['AW'];
                $Esl4 = $sheetData[$row]['AX'];
                $Esl5 = $sheetData[$row]['AY'];
                $NoIjazahAkhir = $sheetData[$row]['AZ'];
                $NoIjazahAwal = $sheetData[$row]['BA'];
                $NoSkJabatan = $sheetData[$row]['BB'];
                $NoSkPangkat = $sheetData[$row]['BC'];
                $TglSkJabatan = ubahTgl($sheetData[$row]['BD']);
                $TglSkPangkat = ubahTgl($sheetData[$row]['BE']);
                //cek nama nip
                //cek data klu ada
                $count = DbPegawaiMasterNew::find()
                        ->where(['Nip' => $Nip])
                        ->count();
                if ($count > 0) {
                    // update database
                    $modelupdate = DbPegawaiMasterNew::findOne(['Nip' => $Nip]);
                    $modelupdate->NipLama = $NipLama;
                    $modelupdate->TmtEselon = $TmtEselon;
                    $modelupdate->TmtCpns = $TmtCpns;
                    $modelupdate->TmtPangkat = $TmtPangkat;

                    $modelupdate->KdKantor = $KdKantor;
                    $modelupdate->NmJenisJabatan = $NmJenisJabatan;
                    $modelupdate->UraianJabatan = $UraianJabatan;
                    $modelupdate->KdPangkat = $KdPangkat;
                    $modelupdate->MkGolTahun = $MkGolTahun;
                    $modelupdate->MkGolBulan = $MkGolBulan;
                    $modelupdate->KdJenisJabatan = $KdJenisJabatan;
                    $modelupdate->NmPegawai = $NmPegawai;
                    $modelupdate->NmUnitOrganisasi = $NmUnitOrganisasi;
                    $modelupdate->KdUnitOrganisasi = $KdUnitOrganisasi;
                    $modelupdate->Peringkat = $Peringkat;
                    $modelupdate->NmLembagaPendidikan = $NmLembagaPendidikan;
                    $modelupdate->NmJenisAgama = $NmJenisAgama;
                    $modelupdate->UraianPangkat = $UraianPangkat;
                    $modelupdate->NmJenisKelamin = $NmJenisKelamin;
                    $modelupdate->UrlFoto = $UrlFoto;
                    $modelupdate->NmStatusPegawai = $NmStatusPegawai;
                    $modelupdate->KdStatusPegawai = $KdStatusPegawai;
                    $modelupdate->Peringkat = $Peringkat;
                    $modelupdate->FlCuti = $FlCuti;
                    $modelupdate->FlDiklat = $FlDiklat;
                    $modelupdate->FlHukuman = $FlHukuman;
                    $modelupdate->FlTugasBelajar = $FlTugasBelajar;
                    $modelupdate->KdEselon = $KdEselon;
                    $modelupdate->NmPendidikanAkhir = $NmPendidikanAkhir;
                    $modelupdate->TmtJabatan = $TmtJabatan;
                    $modelupdate->KdUnitOrganisasiInduk = $KdUnitOrganisasiInduk;
                    $modelupdate->NoNrp = $NoNrp;
                    $modelupdate->NmJabatanGrade = $NmJabatanGrade;
                    $modelupdate->NmPendidikanAwal = $NmPendidikanAwal;
                    $modelupdate->TglIjazahAwal = $TglIjazahAwal;
                    $modelupdate->TglIjazahAwal = $TglIjazahAwal;
                    $modelupdate->GelarDepan = $GelarDepan;
                    $modelupdate->GelarBelakang = $GelarBelakang;
                    $modelupdate->NmPegawaiSk = $NmPegawaiSk;
                    $modelupdate->NoKarpeg = $NoKarpeg;
                    $modelupdate->NPWP = $NPWP;
                    $modelupdate->KdPendidikanAkhir = $KdPendidikanAkhir;
                    $modelupdate->KdPendidikanAwal = $KdPendidikanAwal;
                    $modelupdate->TmtPNS = $TmtPNS;
                    $modelupdate->Esl2 = $Esl2;
                    $modelupdate->Esl3 = $Esl3;
                    $modelupdate->Esl4 = $Esl4;
                    $modelupdate->Esl5 = $Esl5;
                    $modelupdate->NoIjazahAkhir = $NoIjazahAkhir;
                    $modelupdate->NoIjazahAwal = $NoIjazahAwal;
                    $modelupdate->NoSkJabatan = $NoSkJabatan;
                    $modelupdate->NoSkPangkat = $NoSkPangkat;
                    $modelupdate->TglSkJabatan = $TglSkJabatan;
                    $modelupdate->TglSkPangkat = $TglSkPangkat;
                    $modelupdate->TglIjazahAkhir = $TglIjazahAkhir;

                    $modelupdate->umur = umur($sheetData[$row]['X']);
                    $modelupdate->pendidikan_id = substr($KdPendidikanAkhir, 0, 2);
                    $modelupdate->tgl_pangkat_berikutnya = naik($sheetData[$row]['D']);
                    $modelupdate->save();
                    $i++;
                    $row = $i + $baseRow;
                } else {
                    // save database
                    $model = new DbPegawaiMasterNew([
                        'NipLama' => $NipLama,
                        'TmtEselon' => $TmtEselon,
                        'TmtCpns' => $TmtCpns,
                        'TmtPangkat' => $TmtPangkat,
                        'Nip' => $Nip,
                        'KdKantor' => $KdKantor,
                        'NmJenisJabatan' => $NmJenisJabatan,
                        'UraianJabatan' => $UraianJabatan,
                        'KdPangkat' => $KdPangkat,
                        'MkGolTahun' => $MkGolTahun,
                        'MkGolBulan' => $MkGolBulan,
                        'KdJenisJabatan' => $KdJenisJabatan,
                        'NmPegawai' => $NmPegawai,
                        'NmUnitOrganisasi' => $NmUnitOrganisasi,
                        'KdUnitOrganisasi' => $KdUnitOrganisasi,
                        'Peringkat' => $Peringkat,
                        'NmLembagaPendidikan' => $NmLembagaPendidikan,
                        'NmJenisAgama' => $NmJenisAgama,
                        'UraianPangkat' => $UraianPangkat,
                        'NmJenisKelamin' => $NmJenisKelamin,
                        'UrlFoto' => $UrlFoto,
                        'NmStatusPegawai' => $NmStatusPegawai,
                        'KdStatusPegawai' => $KdStatusPegawai,
                        'TglLahir' => $TglLahir,
                        'FlCuti' => $FlCuti,
                        'FlDiklat' => $FlDiklat,
                        'FlHukuman' => $FlHukuman,
                        'FlTugasBelajar' => $FlTugasBelajar,
                        'LokasiLahir' => $LokasiLahir,
                        'KdEselon' => $KdEselon,
                        'NmPendidikanAkhir' => $NmPendidikanAkhir,
                        'TmtJabatan' => $TmtJabatan,
                        'KdUnitOrganisasiInduk' => $KdUnitOrganisasiInduk,
                        'NoNrp' => $NoNrp,
                        'NmJabatanGrade' => $NmJabatanGrade,
                        'NmPendidikanAwal' => $NmPendidikanAwal,
                        'TglIjazahAwal' => $TglIjazahAwal,
                        'TglIjazahAkhir' => $TglIjazahAkhir,
                        'GelarDepan' => $GelarDepan,
                        'GelarBelakang' => $GelarBelakang,
                        'NmPegawaiSk' => $NmPegawaiSk,
                        'NoKarpeg' => $NoKarpeg,
                        'NPWP' => $NPWP,
                        'KdPendidikanAkhir' => $KdPendidikanAkhir,
                        'KdPendidikanAwal' => $KdPendidikanAwal,
                        'KdStatusPegawaiGroup' => $KdStatusPegawaiGroup,
                        'TmtPNS' => $TmtPNS,
                        'Esl2' => $Esl2,
                        'Esl3' => $Esl3,
                        'Esl4' => $Esl4,
                        'Esl5' => $Esl5,
                        'NoIjazahAkhir' => $NoIjazahAkhir,
                        'NoIjazahAwal' => $NoIjazahAwal,
                        'NoSkJabatan' => $NoSkJabatan,
                        'NoSkPangkat' => $NoSkPangkat,
                        'TglSkJabatan' => $TglSkJabatan,
                        'TglSkPangkat' => $TglSkPangkat,
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
     * Finds the DbPegawaiMasterNew model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DbPegawaiMasterNew the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DbPegawaiMasterNew::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
