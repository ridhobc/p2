<?php

namespace backend\modules\pegawai\controllers;

use yii\web\Controller;
use Yii;
/**
 * Default controller for the `pegawai` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($year = '') {
        if (empty($year))
           
        $year = date('');
       
//---------------------------------------------------------------------------------------------------------------------------------------//
        $sex = "SELECT h.nm_kelamin,h.id
,(select count(p.id )  from db_pegawai_master_new p where p.NmJenisKelamin=h.nm_kelamin  ) as total
 from db_jen_kel h ";
        $rawsex= Yii::$app->db->createCommand($sex)->queryAll();
        $main_datasex = [];
        foreach ($rawsex as $datasex) {
            $main_datasexall[] = [
                'name' => $datasex['nm_kelamin'],
                'y' => $datasex['total'] * 1,
                'drilldown' => $datasex['id']
            ];
        }
        $mainsex = json_encode($main_datasexall);  
        
        $sekolah = "SELECT h.nm_sekolah,h.kd_jen_sekolah
,(select count(p.id )  from db_pegawai_master_new p where p.pendidikan_id=h.kd_jen_sekolah  ) as total
 from db_jen_sekolah h ";
        $rawsekolah= Yii::$app->db->createCommand($sekolah)->queryAll();
        $main_datasekolah = [];
        foreach ($rawsekolah as $datasekolah) {
            $main_datasekolah[] = [
                'name' => $datasekolah['nm_sekolah'],
                'y' => $datasekolah['total'] * 1,
                'drilldown' => $datasekolah['id']
            ];
        }
        $mainsekolah = json_encode($main_datasekolah);  

        $Legendsex = (new \yii\db\Query())
                ->select(["CONCAT(u.nm_kelamin) AS 'nama'",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.NmJenisKelamin=u.nm_kelamin  ) as total",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.NmJenisKelamin='PRIA'  ) as pria",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.NmJenisKelamin='WANITA'  ) as wanita"
                    ])
                ->from('db_jen_kel u')

                ->all();
        
        $Legendsexperkantor = (new \yii\db\Query())
                ->select(["CONCAT(u.nm_kantor) AS 'nama'",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and p.NmJenisKelamin='PRIA'   ) as totalpria",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and p.NmJenisKelamin='WANITA'   ) as totalwanita",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor    ) as totalall",
                    ])
                ->from('db_kantor u')
                ->all();
        
        $Legendsexperkantormilennial = (new \yii\db\Query())
                ->select(["CONCAT(u.nm_kantor) AS 'nama'",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and (umur between '54' and '60')   ) as baby",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and (umur between '39' and '53')   ) as genx",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and (umur between '28' and '38')   ) as geny",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and (umur between '18' and '27')   ) as genz",
                    
                    ])
                ->from('db_kantor u')
                ->all();
        
        $LegendSekolahperkantor = (new \yii\db\Query())
                ->select(["CONCAT(u.nm_kantor) AS 'nama'",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and p.pendidikan_id=20  ) as smp",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and p.pendidikan_id=30  ) as sma",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and p.pendidikan_id=31  ) as d1",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and (p.pendidikan_id=41 or p.pendidikan_id=42) ) as d3",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and (p.pendidikan_id=45 or p.pendidikan_id=50)  ) as s1",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and p.pendidikan_id=60  ) as s2",
                    "(select COUNT(DISTINCT p.id ) from db_pegawai_master_new p where p.KdKantor=u.kd_kantor and p.pendidikan_id=70  ) as s3",
                    
                    ])
                ->from('db_kantor u')

                ->all();
        //--------------------------------------------------------------------------------------------------------//        
       
        return $this->render('index', [

                    'mainsex' => $mainsex,
            'mainsekolah' => $mainsekolah,
            'Legendsex' => $Legendsex,
            'Legendsexperkantor' => $Legendsexperkantor,
             'Legendsexperkantormilennial' => $Legendsexperkantormilennial,
            'LegendSekolahperkantor'=>$LegendSekolahperkantor,
                    
        ]);
    }
}
