<?php

namespace backend\modules\pegawai\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\pegawai\models\DbPegawaiMasterNew;

/**
 * DbPegawaiMasterNewSearch represents the model behind the search form about `backend\modules\pegawai\models\DbPegawaiMasterNew`.
 */
class DbPegawaiMasterNewSearch extends DbPegawaiMasterNew
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'KdEselon'], 'integer'],
            [['NipLama', 'TmtEselon', 'TmtCpns', 'TmtPangkat', 'Nip', 'KdKantor', 'NmJenisJabatan', 'UraianJabatan', 'KdPangkat', 'MkGolTahun', 'MkGolBulan', 'KdJenisJabatan', 'NmPegawai', 'NmUnitOrganisasi', 'KdUnitOrganisasi', 'Peringkat', 'NmLembagaPendidikan', 'NmJenisAgama', 'UraianPangkat', 'NmJenisKelamin', 'UrlFoto', 'NmStatusPegawai', 'KdStatusPegawai', 'TglLahir', 'FlCuti', 'FlDiklat', 'FlHukuman', 'FlTugasBelajar', 'LokasiLahir', 'NmPendidikanAkhir', 'TmtJabatan', 'KdUnitOrganisasiInduk', 'NoNrp', 'NmJabatanGrade', 'NmPendidikanAwal', 'TglIjazahAwal', 'TglIjazahAkhir', 'GelarDepan', 'GelarBelakang', 'NmPegawaiSk', 'NoKarpeg', 'NPWP', 'KdPendidikanAkhir', 'KdPendidikanAwal', 'KdStatusPegawaiGroup', 'TmtPNS', 'Esl2', 'Esl3', 'Esl4', 'Esl5', 'NoIjazahAkhir', 'NoIjazahAwal', 'NoSkJabatan', 'NoSkPangkat', 'TglSkJabatan', 'TglSkPangkat'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DbPegawaiMasterNew::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'TmtEselon' => $this->TmtEselon,
            'TmtCpns' => $this->TmtCpns,
            'TmtPangkat' => $this->TmtPangkat,
            'TglLahir' => $this->TglLahir,
            'KdEselon' => $this->KdEselon,
            'TmtJabatan' => $this->TmtJabatan,
            'TglIjazahAwal' => $this->TglIjazahAwal,
            'TglIjazahAkhir' => $this->TglIjazahAkhir,
            'TmtPNS' => $this->TmtPNS,
            'TglSkJabatan' => $this->TglSkJabatan,
            'TglSkPangkat' => $this->TglSkPangkat,
        ]);

        $query->andFilterWhere(['like', 'NipLama', $this->NipLama])
            ->andFilterWhere(['like', 'Nip', $this->Nip])
            ->andFilterWhere(['like', 'KdKantor', $this->KdKantor])
            ->andFilterWhere(['like', 'NmJenisJabatan', $this->NmJenisJabatan])
            ->andFilterWhere(['like', 'UraianJabatan', $this->UraianJabatan])
            ->andFilterWhere(['like', 'KdPangkat', $this->KdPangkat])
            ->andFilterWhere(['like', 'MkGolTahun', $this->MkGolTahun])
            ->andFilterWhere(['like', 'MkGolBulan', $this->MkGolBulan])
            ->andFilterWhere(['like', 'KdJenisJabatan', $this->KdJenisJabatan])
            ->andFilterWhere(['like', 'NmPegawai', $this->NmPegawai])
            ->andFilterWhere(['like', 'NmUnitOrganisasi', $this->NmUnitOrganisasi])
            ->andFilterWhere(['like', 'KdUnitOrganisasi', $this->KdUnitOrganisasi])
            ->andFilterWhere(['like', 'Peringkat', $this->Peringkat])
            ->andFilterWhere(['like', 'NmLembagaPendidikan', $this->NmLembagaPendidikan])
            ->andFilterWhere(['like', 'NmJenisAgama', $this->NmJenisAgama])
            ->andFilterWhere(['like', 'UraianPangkat', $this->UraianPangkat])
            ->andFilterWhere(['like', 'NmJenisKelamin', $this->NmJenisKelamin])
            ->andFilterWhere(['like', 'UrlFoto', $this->UrlFoto])
            ->andFilterWhere(['like', 'NmStatusPegawai', $this->NmStatusPegawai])
            ->andFilterWhere(['like', 'KdStatusPegawai', $this->KdStatusPegawai])
            ->andFilterWhere(['like', 'FlCuti', $this->FlCuti])
            ->andFilterWhere(['like', 'FlDiklat', $this->FlDiklat])
            ->andFilterWhere(['like', 'FlHukuman', $this->FlHukuman])
            ->andFilterWhere(['like', 'FlTugasBelajar', $this->FlTugasBelajar])
            ->andFilterWhere(['like', 'LokasiLahir', $this->LokasiLahir])
            ->andFilterWhere(['like', 'NmPendidikanAkhir', $this->NmPendidikanAkhir])
            ->andFilterWhere(['like', 'KdUnitOrganisasiInduk', $this->KdUnitOrganisasiInduk])
            ->andFilterWhere(['like', 'NoNrp', $this->NoNrp])
            ->andFilterWhere(['like', 'NmJabatanGrade', $this->NmJabatanGrade])
            ->andFilterWhere(['like', 'NmPendidikanAwal', $this->NmPendidikanAwal])
            ->andFilterWhere(['like', 'GelarDepan', $this->GelarDepan])
            ->andFilterWhere(['like', 'GelarBelakang', $this->GelarBelakang])
            ->andFilterWhere(['like', 'NmPegawaiSk', $this->NmPegawaiSk])
            ->andFilterWhere(['like', 'NoKarpeg', $this->NoKarpeg])
            ->andFilterWhere(['like', 'NPWP', $this->NPWP])
            ->andFilterWhere(['like', 'KdPendidikanAkhir', $this->KdPendidikanAkhir])
            ->andFilterWhere(['like', 'KdPendidikanAwal', $this->KdPendidikanAwal])
            ->andFilterWhere(['like', 'KdStatusPegawaiGroup', $this->KdStatusPegawaiGroup])
            ->andFilterWhere(['like', 'Esl2', $this->Esl2])
            ->andFilterWhere(['like', 'Esl3', $this->Esl3])
            ->andFilterWhere(['like', 'Esl4', $this->Esl4])
            ->andFilterWhere(['like', 'Esl5', $this->Esl5])
            ->andFilterWhere(['like', 'NoIjazahAkhir', $this->NoIjazahAkhir])
            ->andFilterWhere(['like', 'NoIjazahAwal', $this->NoIjazahAwal])
            ->andFilterWhere(['like', 'NoSkJabatan', $this->NoSkJabatan])
            ->andFilterWhere(['like', 'NoSkPangkat', $this->NoSkPangkat]);

        return $dataProvider;
    }
}
