<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-suitcase "></i> <?php echo Yii::t('app', 'Cek Resi Kirim'); ?></h3>
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
        <div class="row">
            <div class="col-xs-6 col-lg-4">
                <div class="box box-solid box-info col-xs-6 col-lg-6 no-padding">
                    <div class="box-header with-border">
                        <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Silahkan klik  Cek Resi untuk mengetahui status kirim terakhir'); ?></h4>
                    </div>
                    <div class="box-body">


                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'resi')->textInput() ?>
                            </div> 
                            <div class="col-md-6">
                    <?php
                    $expedisi = [
                        'jne' => 'JNE',
                        'jnt' => 'JNT',
                        'tiki' => 'TIKI',
                        'pos' => 'POS',
                        'wahana' => 'wahana',
                        'sap' => 'SAP',
                        'sicepat' => 'SICEPAT',
                        'jet' => 'JET',
                        'dse' => 'DSE',
                        'first' => 'FIRST',
                        'ninja' => 'NINJA',
                        'lion' => 'LION PARCEL',
                        'idl' => 'IDL',
                        'rex' => 'REX',
                        'ide' => 'IDE',
                        'sentral' => 'SENTRAL',
                        'anteraja' => 'ANTERAJA'
                    ];
                    ?>
                    <?php
                    echo $form->field($model, 'expedisi')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $expedisi,
                        'options' => [
                            'placeholder' => 'Pilih Expedisi...',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>
                </div>  
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-xs-6">
                                <?=
                                Html::submitButton('Cek Resi', [
                                    'class' => 'btn btn-success'
                                ])
                                ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-lg-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-truck"></i> Hasil Pengecekan

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body container-items"><!-- widgetContainer --><div class="row">
                            <div class="form-group">            

                                <div class="col-sm-12">                                    
                                    <table class="table table-hover">                                        
                                        <?php
//                                        if (in_array('curl', get_loaded_extensions())) {
//                                            echo "cURL is installed on this server";
//                                        } else {
//                                            echo "cURL is not installed on this server";
//                                        }
//                                        echo $response;
                                        $data = json_decode($response, true);
                                        if ($data['rajaongkir']['status']['code'] == '200') {
                                            if ($data) {
                                                for ($i = 2; $i < count($data['rajaongkir']); $i++) {
                                                    ?> 
                                                    <tr>
                                                        <td>Resi</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['waybill_number']; ?> / <?= $data['rajaongkir']['result']['summary']['waybill_date']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Asal</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['shipper_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td><td>:</td><td><?= $data['rajaongkir']['result']['details']['shipper_address1']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td><td>:</td><td><?= $data['rajaongkir']['result']['details']['shipper_address2']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td><td>:</td><td><?= $data['rajaongkir']['result']['details']['shipper_address3']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td><td>:</td><td><?= $data['rajaongkir']['result']['details']['shipper_city']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota Asal</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['origin']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tujuan</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['receiver_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota Asal</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['destination']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Service</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['service_code']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['status']; ?> :
                                                        <?= $data['rajaongkir']['result']['delivery_status']['pod_receiver']; ?>
                                                            <?= $data['rajaongkir']['result']['delivery_status']['pod_date']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
//                                            
                                            }
                                        } else {
                                            echo $data['rajaongkir']['status']['description'];
                                        }
                                        ?>
                                    </table>
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No</th>
                                            <th>Deskripsi</th>
                                            <th>Tgl</th>
                                            <th>Waktu</th>
                                            <th>Kota</th>
                                        </tr>
                                        <?php
                                        $data = json_decode($response, true);
                                        if ($data['rajaongkir']['status']['code'] == '200') {
                                            if ($data) {
//                                            
                                                for ($i = 0; $i < count($data['rajaongkir']['result']['manifest']); $i++) {
                                                    ?> 
                                                    <tr>
                                                        <td><?= $i + 1; ?></td>
                                                        <td><?= $data['rajaongkir']['result']['manifest'][$i]['manifest_description']; ?></td>
                                                        <td><?= $data['rajaongkir']['result']['manifest'][$i]['manifest_date']; ?></td>
                                                        <td><?= $data['rajaongkir']['result']['manifest'][$i]['manifest_time']; ?></td>
                                                        <td><?= $data['rajaongkir']['result']['manifest'][$i]['city_name']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            echo $data['rajaongkir']['status']['description'];
                                        }
                                        ?>
                                    </table>


                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>  
    </div>
    <?php ActiveForm::end(); ?>
</div>
</div>

<?php
//{
//   "rajaongkir":{
//      "query":{
//         "waybill":"SOCAG00183235715",
//         "courier":"jne"
//      },
//      "status":{
//         "code":200,
//         "description":"OK"
//      },
//      "result":{
//         "delivered":true,
//         "summary":{
//            "courier_code":"jne",
//            "courier_name":"Jalur Nugraha Ekakurir (JNE)",
//            "waybill_number":"SOCAG00183235715",
//            "service_code":"OKE",
//            "waybill_date":"2015-03-03",
//            "shipper_name":"IRMA F",
//            "receiver_name":"RISKA VIVI",
//            "origin":"WONOGIRI,KAB.WONOGIRI",
//            "destination":"PALEMBANG",
//            "status":"DELIVERED"
//         },
//         "details":{
//            "waybill_number":"SOCAG00183235715",
//            "waybill_date":"2015-03-03",
//            "waybill_time":"13:23",
//            "weight":"1",
//            "origin":"WONOGIRI,KAB.WONOGIRI",
//            "destination":"PALEMBANG",
//            "shippper_name":"IRMA F",
//            "shipper_address1":"WONOGIRI",
//            "shipper_address2":null,
//            "shipper_address3":null,
//            "shipper_city":"WONOGIRI",
//            "receiver_name":"RISKA VIVI",
//            "receiver_address1":"PERUMAHAN BUKIT SEJAHTERA",
//            "receiver_address2":"AF 05 RT 074\/022",
//            "receiver_address3":"PALEMBANG",
//            "receiver_city":"PALEMBANG"
//         },
//         "delivery_status":{
//            "status":"DELIVERED",
//            "pod_receiver":"RISKA",
//            "pod_date":"2015-03-05",
//            "pod_time":"13:22"
//         },
//         "manifest":[
//            {
//               "manifest_code":"1",
//               "manifest_description":"Manifested",
//               "manifest_date":"2015-03-04",
//               "manifest_time":"03:41",
//               "city_name":"SOLO"
//            },
//            {
//               "manifest_code":"2",
//               "manifest_description":"On Transit",
//               "manifest_date":"2015-03-04",
//               "manifest_time":"15:44",
//               "city_name":"JAKARTA"
//            },
//            {
//               "manifest_code":"3",
//               "manifest_description":"Received On Destination",
//               "manifest_date":"2015-03-05",
//               "manifest_time":"08:57",
//               "city_name":"PALEMBANG"
//            }
//         ]
//      }
//   }
//}
?>