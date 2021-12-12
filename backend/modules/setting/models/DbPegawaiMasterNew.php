<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "db_pegawai_master_new".
 *
 * @property int $id
 * @property string|null $NipLama
 * @property string|null $TmtEselon
 * @property string|null $TmtCpns
 * @property string|null $TmtPangkat
 * @property string|null $Nip
 * @property string|null $KdKantor
 * @property string|null $NmJenisJabatan
 * @property string|null $UraianJabatan
 * @property string|null $KdPangkat
 * @property string|null $MkGolTahun
 * @property string|null $MkGolBulan
 * @property string|null $KdJenisJabatan
 * @property string|null $NmPegawai
 * @property string|null $NmUnitOrganisasi
 * @property string|null $KdUnitOrganisasi
 * @property string|null $Peringkat
 * @property string|null $NmLembagaPendidikan
 * @property string|null $NmJenisAgama
 * @property string|null $UraianPangkat
 * @property string|null $NmJenisKelamin
 * @property string|null $UrlFoto
 * @property string|null $NmStatusPegawai
 * @property string|null $KdStatusPegawai
 * @property string|null $TglLahir
 * @property string|null $FlCuti
 * @property string|null $FlDiklat
 * @property string|null $FlHukuman
 * @property string|null $FlTugasBelajar
 * @property string|null $LokasiLahir
 * @property int|null $KdEselon
 * @property string|null $NmPendidikanAkhir
 * @property string|null $TmtJabatan
 * @property string|null $KdUnitOrganisasiInduk
 * @property string|null $NoNrp
 * @property string|null $NmJabatanGrade
 * @property string|null $NmPendidikanAwal
 * @property string|null $TglIjazahAwal
 * @property string|null $TglIjazahAkhir
 * @property string|null $GelarDepan
 * @property string|null $GelarBelakang
 * @property string|null $NmPegawaiSk
 * @property string|null $NoKarpeg
 * @property string|null $NPWP
 * @property string|null $KdPendidikanAkhir
 * @property string|null $KdPendidikanAwal
 * @property string|null $KdStatusPegawaiGroup
 * @property string|null $TmtPNS
 * @property string|null $Esl2
 * @property string|null $Esl3
 * @property string|null $Esl4
 * @property string|null $Esl5
 * @property string|null $NoIjazahAkhir
 * @property string|null $NoIjazahAwal
 * @property string|null $NoSkJabatan
 * @property string|null $NoSkPangkat
 * @property string|null $TglSkJabatan
 * @property string|null $TglSkPangkat
 * @property string|null $umur
 * @property int|null $pendidikan_id
 * @property string|null $tgl_pangkat_berikutnya
 */
class DbPegawaiMasterNew extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_pegawai_master_new';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TmtEselon', 'TmtCpns', 'TmtPangkat', 'TglLahir', 'TmtJabatan', 'TglIjazahAwal', 'TglIjazahAkhir', 'TmtPNS', 'TglSkJabatan', 'TglSkPangkat', 'tgl_pangkat_berikutnya'], 'safe'],
            [['KdEselon', 'pendidikan_id'], 'integer'],
            [['NipLama', 'NmJenisKelamin', 'NoNrp', 'GelarDepan', 'GelarBelakang', 'NoKarpeg', 'KdPendidikanAkhir', 'KdPendidikanAwal'], 'string', 'max' => 10],
            [['Nip', 'KdKantor', 'KdUnitOrganisasi', 'NmJenisAgama', 'NmStatusPegawai', 'KdUnitOrganisasiInduk', 'NPWP'], 'string', 'max' => 20],
            [['NmJenisJabatan', 'NmPegawai', 'NmLembagaPendidikan', 'UraianPangkat', 'NmPendidikanAkhir', 'NmPendidikanAwal', 'NoIjazahAkhir', 'NoIjazahAwal', 'NoSkJabatan', 'NoSkPangkat'], 'string', 'max' => 100],
            [['UraianJabatan', 'NmUnitOrganisasi', 'NmJabatanGrade', 'NmPegawaiSk', 'Esl2', 'Esl3', 'Esl4', 'Esl5'], 'string', 'max' => 200],
            [['KdPangkat', 'MkGolTahun', 'MkGolBulan', 'KdJenisJabatan'], 'string', 'max' => 6],
            [['Peringkat', 'FlCuti', 'FlDiklat', 'FlHukuman', 'FlTugasBelajar'], 'string', 'max' => 2],
            [['UrlFoto'], 'string', 'max' => 150],
            [['KdStatusPegawai'], 'string', 'max' => 5],
            [['LokasiLahir'], 'string', 'max' => 45],
            [['KdStatusPegawaiGroup', 'umur'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
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
            'pendidikan_id' => 'Pendidikan ID',
            'tgl_pangkat_berikutnya' => 'Tgl Pangkat Berikutnya',
        ];
    }
}
