<?php

namespace backend\modules\pos\controllers;

use Yii;
use backend\modules\pos\models\PosMaster;
use backend\modules\pos\models\PosMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\httpclient\Client;

/**
 * PosMasterController implements the CRUD actions for PosMaster model.
 */
class PosMasterController extends Controller {

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
     * Lists all PosMaster models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new \backend\modules\pos\models\PosRekamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMonitoring() {
        $searchModel = new \backend\modules\pos\models\PosMonitoringSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('monitoring', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTerima() {//status surat 2
        $searchModel = new \backend\modules\pos\models\PosTerimaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('terima', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPickup() {//status surat 3
        $searchModel = new \backend\modules\pos\models\PosPickupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('pickup', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTerkirim() {//status surat 4
        $searchModel = new \backend\modules\pos\models\PosTerkirimSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('terkirim', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSelesai() {//status surat 5
        $searchModel = new \backend\modules\pos\models\PosSelesaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('selesai', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProkirim($id) {
        $cek = PosMaster::find()->where(['id' => $id])->count();
        $model = PosMaster::findOne($id);
        $model->status_srt = "2";
        $model->tgl_kirim = date('Y-m-d');
        $model->no_telp_pic = Yii::$app->user->identity->phone;
        $model->save();

        \Yii::$app->getSession()->setFlash('success', 'Berhasil');
        return $this->redirect(['index']);
    }

    public function actionProterima($id) {
        $cek = PosMaster::find()->where(['id' => $id])->count();
        $model = PosMaster::findOne($id);
        $model->status_srt = "3";
        $model->tgl_terima = date('Y-m-d');
        $model->save();

        \Yii::$app->getSession()->setFlash('success', 'Berhasil');
        return $this->redirect(['terima']);
    }

    public function actionPropickup($id) {
        $cek = PosMaster::find()->where(['id' => $id])->count();
        $model = PosMaster::findOne($id);
        $model->status_srt = "4";
        $model->tgl_pickup = date('Y-m-d');
        $model->save();

        \Yii::$app->getSession()->setFlash('success', 'Berhasil');
        return $this->redirect(['pickup']);
    }

    /**
     * Displays a single PosMaster model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionViewKirim($id) {
        return $this->render('view-kirim', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PosMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new \backend\modules\pos\models\PosRekam();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->save();
            if ($model->save()) {
                $model = PosMaster::findOne($model->id);

                $modeltujuan = \backend\modules\pos\models\PosTujuan::find()->where([
                            'id' => $model->tujuan_id
                        ])->one();
                if ($modeltujuan->kota_tujuan_id == '267') {
                    $service = "CTC";
                } else {
                    $service = $model->jen_service;
                }

                $model->nip_ptgs_kirim = Yii::$app->user->identity->nip; //nip petugas kirim
                $model->no_telp_pic = Yii::$app->user->identity->phone; //nip petugas kirim
                $model->status_srt = 1; //status surat 0=rekam
                $model->kota_asal = 267; //267= kota manado     
                $model->tgl_kirim = date('Y-m-d'); //267= kota manado     
                $model->kota_tujuan = $modeltujuan->kota_tujuan_id; //267= kota manado

                $model->berat_satuan = 1000; //267= kota manado
                $model->courir = "jne"; //267= kota manado
                $model->jen_service = $service; //267= kota manado
                $model->tahun = date('Y'); //Tahun Rekam
                $model->save();
                \Yii::$app->getSession()->setFlash('success', 'Berhasil simpan');
                return $this->redirect(['index', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PosMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->save();
            if ($model->save()) {
                $model = PosMaster::findOne($model->id);

                $modeltujuan = \backend\modules\pos\models\PosTujuan::find()->where([
                            'id' => $model->tujuan_id
                        ])->one();
                if ($modeltujuan->kota_tujuan_id == '267') {
                    $service = "CTC";
                } else {
                    $service = $model->jen_service;
                }
                $model->kota_tujuan = $modeltujuan->kota_tujuan_id; //267= kota manado
                $model->berat_satuan = 1000; //267= kota manado
                $model->jen_service = $service; //267= kota manado

                $model->save();
                \Yii::$app->getSession()->setFlash('success', 'Berhasil simpan');
                return $this->redirect(['index', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionResi($id) {
        $model = \backend\modules\pos\models\PosResi::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->no_resi == '') {
                
            } else {
                $model->status_srt = 5;
                $model->save();
            }

            return $this->redirect(['view-kirim', 'id' => $model->id]);
        } else {
            return $this->render('resi', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PosMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteadmin($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['terkirim']);
    }

    public function actionCekResi() {
        $model = new \yii\base\DynamicModel([
            'resi',
            'expedisi'
        ]);
        $model->addRule(['resi','expedisi'], 'required');

        if ($model->load(Yii::$app->request->post())) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS =>  "waybill=" . $model->resi . "&courier=". $model->expedisi ."",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: 5002b77f70695a9eb2030131cc56bf37"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
//            if ($err) {
//                echo "cURL Error #:" . $err;
//            } else {
//                echo $response;
//            }
        }
        return $this->render('cek-resi', [
                    'model' => $model,
                    'response' => $response,
        ]);
    }

    public function actionGetProvince($id = 0) {
        $client = new \yii\httpclient\Client();
        $addUrl = ($id > 0) ? 'id=' . $id : '';
        $response = $client->createRequest()
                ->setFormat(Client::FORMAT_JSON)
                ->setMethod('get')
                ->setUrl('http://api.rajaongkir.com/starter/province?' . $addUrl)
                ->addHeaders([
                    'key' => '5002b77f70695a9eb2030131cc56bf37',
                ])
                ->send();
        if ($response->isOk) {
            $content = \yii\helpers\Json::decode($response->content);
// $content['rajaongkir']['query']
// $content['rajaongkir']['status']
            $results = $content['rajaongkir']['results'];
            if ($id > 0) {
                if (count($results) > 0) {
                    echo $results['province_id'] . ' - ';
                    echo $results['province'] . '<br>';
                } else {
                    echo "blank";
                }
            } else {
                foreach ($results as $provinces) {
                    Yii::$app->db->createCommand()->insert('pos_propinsi', [
                        'id' => $provinces['province_id'],
                        'name' => $provinces['province']
                    ])->execute();
                    echo $provinces['province_id'] . " - " . $provinces['province'] . "<br>";
                }
            }
        } else {
            $content = \PHPUnit\Util\Json::decode($response->content);
            echo $content['rajaongkir']['status']['description'];
        }
    }

    public function actionGetCity($id = 0, $province = 0) {
        $client = new Client();
        $addUrl = ($id > 0) ? 'id=' . $id . '&' : '';
        $addUrl.=($province > 0) ? 'province=' . $province : '';
        $response = $client->createRequest()
                ->setFormat(Client::FORMAT_JSON)
                ->setMethod('get')
                ->setUrl('http://api.rajaongkir.com/starter/city?' . $addUrl)
                ->addHeaders([
                    'key' => '5002b77f70695a9eb2030131cc56bf37',
                ])
                ->send();
        if ($response->isOk) {
            $content = \yii\helpers\Json::decode($response->content);
// $content['rajaongkir']['query']
// $content['rajaongkir']['status']
            $results = $content['rajaongkir']['results'];
            if ($id > 0) {
                if (count($results) > 0) {

                    echo "<h1>" . $results['province_id'] . " - " . $results['province'] . "</h1>";
                    echo $results['city_id'] . " - " . $results['city_name'] . " - " . $results['type'] . " - " . $results['postal_code'] . "<br>";
                } else {
                    echo 'blank';
                }
            } else {
                if (count($results) > 0) {
                    $last_province = 0;
                    foreach ($results as $cities) {
                        Yii::$app->db->createCommand()->insert('pos_propinsi_kota', [
                            'id' => $cities['city_id'],
                            'propinsi_id' => $cities['province_id'],
                            'name' => $cities['city_name'],
                            'type' => strtolower($cities['type']),
                            'postal_code' => $cities['postal_code']
                        ])->execute();
                        if ($last_province != $cities['province_id']) {
                            echo "<h1>" . $cities['province_id'] . " - " . $cities['province'] . "</h1>";
                            $last_province = $cities['province_id'];
                        }
                        echo $cities['city_id'] . " - " . $cities['city_name'] . " - " . $cities['type'] . " - " . $cities['postal_code'] . "<br>";
                    }
                } else {
                    echo 'blank';
                }
            }
        } else {
            $content = \Yii\helpers\Json::decode($response->content);
            echo $content['rajaongkir']['status']['description'];
        }
    }

    public function actionCekOngkir() {
        $model = new \yii\base\DynamicModel([
            'origin', 'destination', 'weight', 'courier',
        ]);
        $model->addRule(['origin', 'destination', 'weight', 'courier',], 'required');
        $model->addRule(['weight'], 'integer');
        $model->addRule(['courier'], 'in', ['range' => ['jne', 'pos', 'tiki']]);
        $results = [];
        if ($model->load(Yii::$app->request->post())) {

            $client = new Client();
            $response = $client->createRequest()
                    ->setMethod('post')
                    ->setUrl('http://api.rajaongkir.com/basic/cost')
                    ->addHeaders([
                        'key' => '5002b77f70695a9eb2030131cc56bf37',
                    ])
                    ->setData([
                        'origin' => $model->origin,
                        'destination' => $model->destination,
                        'weight' => $model->weight,
                        'courier' => $model->courier,
                    ])
                    ->send();
            if ($response->isOk) {
                $results = json_decode($response->content);
            } else {
                
            }
        }
        return $this->render('cek-ongkir', [
                    'model' => $model,
                    'results' => $results,
        ]);
    }

    public function actionCekOngkirBid($id) {
        $modelcek = PosMaster::findOne($id);
        if ($modelcek->kota_tujuan == 267) {
            $service = 'CTC';
        } else {
            $service = "OKE";
        }
        $modelcek->jen_service = $service;
        $modelcek->save();
        $model = PosMaster::findOne($modelcek->id);
        $client = new Client();
        $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('http://api.rajaongkir.com/basic/cost')
                ->addHeaders([
                    'key' => '5002b77f70695a9eb2030131cc56bf37',
                ])
                ->setData([
                    'origin' => $model->kota_asal,
                    'destination' => $model->kota_tujuan,
                    'weight' => $model->berat_satuan,
                    'courier' => $model->courir,
                ])
                ->send();
        if ($response->isOk) {
            $results = json_decode($response->content);
            if (!empty($results)) {
                foreach ($results as $result) {
                    foreach ($result->results[0]->costs as $costs) {//                           
                        if ($costs->service == $model->jen_service) {//jika dia kirim ke mnado
                            $model->etd = $costs->cost[0]->etd; //etd                            
                            $model->jen_service = $costs->service; //je_service
                            $model->type_kirim = $costs->description; //je_service
                            $model->harga_kirim_satuan_rp = $costs->cost[0]->value; //je_service
                            $model->ket = "-";
                        } else {
                            
                        }
                    }
                }
            }
        } else {
            
        }
        $model->save();
        return $this->redirect(['view-kirim', 'id' => $id]);
    }

    public function actionCekTerkirimBid($id) {
        $model = PosMaster::findOne($id);
        if ($model->no_resi == '') {
            \Yii::$app->getSession()->setFlash('danger', 'Nomor Resi belum diisi');
            return $this->redirect(['view-kirim', 'id' => $id]);
        } else {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/basic/waybill",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "waybill=" . $model->no_resi . "&courier=jne",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: 5002b77f70695a9eb2030131cc56bf37"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
//            echo $response;

            $data = json_decode($response, true);
            if ($data) {
                if ($data['rajaongkir']['status']['code'] == '200') {
                    for ($i = 2; $i < count($data['rajaongkir']); $i++) {

                        if ($data['rajaongkir']['result']['delivery_status']['status'] == "DELIVERED") {
                            $model->status_srt = 6;
                            $model->tgl_resi = $data['rajaongkir']['result']['summary']['waybill_date'];
                            $model->tgl_selesai = $data['rajaongkir']['result']['delivery_status']['pod_date'];
                            $model->penerima = $data['rajaongkir']['result']['delivery_status']['pod_receiver'];
                            $model->ket = $data['rajaongkir']['result']['delivery_status']['status'];
                            $model->save();
                        } else {
                            $model->ket = "belum terkirim";
                            $model->save();
                        }
                    }
                } else {
                    $model->ket = $data['rajaongkir']['status']['description'];
                    $model->save();
                }
            }
//            return $this->redirect(['view-kirim', 'id' => $id]);
            return $this->render('view-kirim', [
                        'model' => $this->findModel($id),
                        'response' => $response,
                        'id' => $id,
            ]);
        }
    }

    public function actionCetakTandaTerima() {
        $searchModel = new PosMasterSearch([
            'status_srt' => 3,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
// matikan paging, artinya cetak semua baris
        $dataProvider->setPagination(false);
// create reader for excel 2007 keatas, 2003 kebawah pake Excel5
        $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
// template excel 
        $template = \Yii::getAlias('@common') . DIRECTORY_SEPARATOR . 'file' .
                DIRECTORY_SEPARATOR . 'template' .
                DIRECTORY_SEPARATOR . 'a.xlsx';
        $objPHPExcel = $objReader->load($template);
        $objPHPExcel->setActiveSheetIndex(0);
        $activeSheet = $objPHPExcel->getActiveSheet();
// tulis judul tabel
        $activeSheet->setCellValue('A1', 'DAFTAR PENGANTAR KIRIMAN SURAT ');
        $baseRow = 6; // baris ke 4
        $i = 0;

        foreach ($dataProvider->getModels() as $data) {
            $row = $baseRow + $i;
            if ($i <> 0)
                $activeSheet->insertNewRowBefore($row, 1);
            $activeSheet->setCellValue('A' . $row, $i + 1)
                    ->setCellValue('B' . $row, $data->no_srt)
                    ->setCellValue('C' . $row, $data->tujuanunit->nm_tujuan)
                    ->setCellValue('D' . $row, $data->kotatujuan->name)
                    ->setCellValue('E' . $row, $data->jen_service)
                    ->setCellValue('F' . $row, $data->no_telp_pic)
            ;
            $i++;
        }
// Redirect output to a clientâ€™s web browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="cetak_tanda_terima_#' . date('Ymd') . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function actionViewKirimDetail($id) {

        $model = PosMaster::findOne($id);
        if ($model->no_resi == '') {
            \Yii::$app->getSession()->setFlash('danger', 'Nomor Resi belum diisi');
            return $this->redirect(['view-kirim', 'id' => $id]);
        } else {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/basic/waybill",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "waybill=" . $model->no_resi . "&courier=jne",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: 5002b77f70695a9eb2030131cc56bf37"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
//            echo $response;

            $data = json_decode($response, true);
            if ($data) {
                if ($data['rajaongkir']['status']['code'] == '200') {
                    for ($i = 2; $i < count($data['rajaongkir']); $i++) {

                        if ($data['rajaongkir']['result']['delivery_status']['status'] == "DELIVERED") {
                            $model->status_srt = 6;
                            $model->tgl_resi = $data['rajaongkir']['result']['summary']['waybill_date'];
                            $model->tgl_selesai = $data['rajaongkir']['result']['delivery_status']['pod_date'];
                            $model->penerima = $data['rajaongkir']['result']['delivery_status']['pod_receiver'];
                            $model->ket = $data['rajaongkir']['result']['delivery_status']['status'];
                            $model->save();
                        } else {
                            $model->ket = "belum terkirim";
                            $model->save();
                        }
                    }
                } else {
                    $model->ket = $data['rajaongkir']['status']['description'];
                    $model->save();
                }
            }
//            return $this->redirect(['view-kirim', 'id' => $id]);
            return $this->render('view-kirim-detail', [
                        'model' => $this->findModel($id),
                        'response' => $response,
                        'id' => $id,
            ]);
        }
    }

    public function actionCekResiAll() {
        $searchModel = new \backend\modules\pos\models\PosMonitoringSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modellist = "SELECT * FROM pos_master WHERE status_srt='5' ";
        $posList = PosMaster::findBySql($modellist)->all();
        if (!empty($posList)) {
            foreach ($posList as $el => $k) :
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.rajaongkir.com/basic/waybill",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "waybill=" . $k->no_resi . "&courier=jne",
                    CURLOPT_HTTPHEADER => array(
                        "content-type: application/x-www-form-urlencoded",
                        "key: 5002b77f70695a9eb2030131cc56bf37"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
//            echo $response;

                $data = json_decode($response, true);
                if ($data) {
                    if ($data['rajaongkir']['status']['code'] == '200') {
                        for ($i = 2; $i < count($data['rajaongkir']); $i++) {

                            if ($data['rajaongkir']['result']['delivery_status']['status'] == "DELIVERED") {
                                $k->status_srt = 6;
                                $k->tgl_resi = $data['rajaongkir']['result']['summary']['waybill_date'];
                                $k->tgl_selesai = $data['rajaongkir']['result']['delivery_status']['pod_date'];
                                $k->penerima = $data['rajaongkir']['result']['delivery_status']['pod_receiver'];
                                $k->ket = $data['rajaongkir']['result']['delivery_status']['status'];
                                $k->save();
                            } else {
                                $k->ket = "belum terkirim";
                                $k->save();
                            }
                        }
                    } else {
                        $k->ket = $data['rajaongkir']['status']['description'];
                        $k->save();
                    }
                }
            endforeach;
            \Yii::$app->getSession()->setFlash('success', 'berhasil update surat yang terkirim');
            return $this->render('monitoring', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else {
            \Yii::$app->getSession()->setFlash('danger', 'Tidak surat yang perlu di cek');
            return $this->render('monitoring', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Finds the PosMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PosMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PosMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
