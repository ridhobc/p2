<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_pegawai_master_new".
 *
 * @property integer $id
 * @property string $NipLama
 * @property string $TmtEselon
 * @property string $TmtCpns
 * @property string $TmtPangkat
 * @property string $Nip
 * @property string $KdKantor
 * @property string $NmJenisJabatan
 * @property string $UraianJabatan
 * @property string $KdPangkat
 * @property string $MkGolTahun
 * @property string $MkGolBulan
 * @property string $KdJenisJabatan
 * @property string $NmPegawai
 * @property string $NmUnitOrganisasi
 * @property string $KdUnitOrganisasi
 * @property string $Peringkat
 * @property string $NmLembagaPendidikan
 * @property string $NmJenisAgama
 * @property string $UraianPangkat
 * @property string $NmJenisKelamin
 * @property string $UrlFoto
 * @property string $NmStatusPegawai
 * @property string $KdStatusPegawai
 * @property string $TglLahir
 * @property string $FlCuti
 * @property string $FlDiklat
 * @property string $FlHukuman
 * @property string $FlTugasBelajar
 * @property string $LokasiLahir
 * @property integer $KdEselon
 * @property string $NmPendidikanAkhir
 * @property string $TmtJabatan
 * @property string $KdUnitOrganisasiInduk
 * @property string $NoNrp
 * @property string $NmJabatanGrade
 * @property string $NmPendidikanAwal
 * @property string $TglIjazahAwal
 * @property string $TglIjazahAkhir
 * @property string $GelarDepan
 * @property string $GelarBelakang
 * @property string $NmPegawaiSk
 * @property string $NoKarpeg
 * @property string $NPWP
 * @property string $KdPendidikanAkhir
 * @property string $KdPendidikanAwal
 * @property string $KdStatusPegawaiGroup
 * @property string $TmtPNS
 * @property string $Esl2
 * @property string $Esl3
 * @property string $Esl4
 * @property string $Esl5
 * @property string $NoIjazahAkhir
 * @property string $NoIjazahAwal
 * @property string $NoSkJabatan
 * @property string $NoSkPangkat
 * @property string $TglSkJabatan
 * @property string $TglSkPangkat
 * @property string $umur
 */
class Pangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_pegawai_master_new';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['TmtEselon', 'TmtCpns', 'TmtPangkat', 'TglLahir', 'TmtJabatan', 'TglIjazahAwal', 'TglIjazahAkhir', 'TmtPNS', 'TglSkJabatan', 'TglSkPangkat'], 'safe'],
//            [['KdEselon'], 'integer'],
//            [['NipLama', 'NmJenisKelamin', 'NoNrp', 'GelarDepan', 'GelarBelakang', 'NoKarpeg', 'KdPendidikanAkhir', 'KdPendidikanAwal'], 'string', 'max' => 10],
//            [['Nip', 'KdKantor', 'KdUnitOrganisasi', 'NmJenisAgama', 'NmStatusPegawai', 'KdUnitOrganisasiInduk', 'NPWP'], 'string', 'max' => 20],
//            [['NmJenisJabatan', 'NmPegawai', 'NmLembagaPendidikan', 'UraianPangkat', 'NmPendidikanAkhir', 'NmPendidikanAwal', 'NoIjazahAkhir', 'NoIjazahAwal', 'NoSkJabatan', 'NoSkPangkat'], 'string', 'max' => 100],
//            [['UraianJabatan', 'NmUnitOrganisasi', 'NmJabatanGrade', 'NmPegawaiSk', 'Esl2', 'Esl3', 'Esl4', 'Esl5'], 'string', 'max' => 200],
//            [['KdPangkat', 'MkGolTahun', 'MkGolBulan', 'KdJenisJabatan'], 'string', 'max' => 6],
//            [['Peringkat', 'FlCuti', 'FlDiklat', 'FlHukuman', 'FlTugasBelajar'], 'string', 'max' => 2],
//            [['UrlFoto'], 'string', 'max' => 150],
//            [['KdStatusPegawai'], 'string', 'max' => 5],
//            [['LokasiLahir'], 'string', 'max' => 45],
//            [['KdStatusPegawaiGroup', 'umur'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'NipLama' => 'Nip Lama',
            'TmtEselon' => 'Tmt Eselon',
            'TmtCpns' => 'Tmt Cpns',
            'TmtPangkat' => 'Tmt Pangkat',
            'Nip' => 'Nip',
            'KdKantor' => 'Kd Kantor',
            'NmJenisJabatan' => 'Nm Jenis Jabatan',
            'UraianJabatan' => 'Uraian Jabatan',
            'KdPangkat' => 'Kd Pangkat',
            'MkGolTahun' => 'Mk Gol Tahun',
            'MkGolBulan' => 'Mk Gol Bulan',
            'KdJenisJabatan' => 'Kd Jenis Jabatan',
            'NmPegawai' => 'Nm Pegawai',
            'NmUnitOrganisasi' => 'Nm Unit Organisasi',
            'KdUnitOrganisasi' => 'Kd Unit Organisasi',
            'Peringkat' => 'Peringkat',
            'NmLembagaPendidikan' => 'Nm Lembaga Pendidikan',
            'NmJenisAgama' => 'Nm Jenis Agama',
            'UraianPangkat' => 'Uraian Pangkat',
            'NmJenisKelamin' => 'Nm Jenis Kelamin',
            'UrlFoto' => 'Url Foto',
            'NmStatusPegawai' => 'Nm Status Pegawai',
            'KdStatusPegawai' => 'Kd Status Pegawai',
            'TglLahir' => 'Tgl Lahir',
            'FlCuti' => 'Fl Cuti',
            'FlDiklat' => 'Fl Diklat',
            'FlHukuman' => 'Fl Hukuman',
            'FlTugasBelajar' => 'Fl Tugas Belajar',
            'LokasiLahir' => 'Lokasi Lahir',
            'KdEselon' => 'Kd Eselon',
            'NmPendidikanAkhir' => 'Nm Pendidikan Akhir',
            'TmtJabatan' => 'Tmt Jabatan',
            'KdUnitOrganisasiInduk' => 'Kd Unit Organisasi Induk',
            'NoNrp' => 'No Nrp',
            'NmJabatanGrade' => 'Nm Jabatan Grade',
            'NmPendidikanAwal' => 'Nm Pendidikan Awal',
            'TglIjazahAwal' => 'Tgl Ijazah Awal',
            'TglIjazahAkhir' => 'Tgl Ijazah Akhir',
            'GelarDepan' => 'Gelar Depan',
            'GelarBelakang' => 'Gelar Belakang',
            'NmPegawaiSk' => 'Nm Pegawai Sk',
            'NoKarpeg' => 'No Karpeg',
            'NPWP' => 'Npwp',
            'KdPendidikanAkhir' => 'Kd Pendidikan Akhir',
            'KdPendidikanAwal' => 'Kd Pendidikan Awal',
            'KdStatusPegawaiGroup' => 'Kd Status Pegawai Group',
            'TmtPNS' => 'Tmt Pns',
            'Esl2' => 'Esl2',
            'Esl3' => 'Esl3',
            'Esl4' => 'Esl4',
            'Esl5' => 'Esl5',
            'NoIjazahAkhir' => 'No Ijazah Akhir',
            'NoIjazahAwal' => 'No Ijazah Awal',
            'NoSkJabatan' => 'No Sk Jabatan',
            'NoSkPangkat' => 'No Sk Pangkat',
            'TglSkJabatan' => 'Tgl Sk Jabatan',
            'TglSkPangkat' => 'Tgl Sk Pangkat',
            'umur' => 'Umur',
        ];
    }
    public function getKantor() {
        return $this->hasOne(DbKantor::className(), ['kd_kantor' => 'KdKantor']);
    }
}
