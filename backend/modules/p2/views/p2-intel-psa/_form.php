<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-4 col-sm-4 ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Info Petugas Perekam</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                        $empInfo = backend\models\User::findOne(@Yii::$app->user->identity->id);
                        $Photo = $empInfo->getPhoto($empInfo->photo);
                        ?>
                        <img src="<?= $Photo ?>" class="img-thumbnail img img-responsive" alt="User Image"/>

                    </div> 
                    <div class="col-xs-8">
                        <strong><span id="nama" style="max-width:214px;"><?php echo strtoupper(@Yii::$app->user->identity->name) ?></span></strong><br>
                        <table class="table table-condensed table-responsive table-user-information">
                            <tbody> 
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo @Yii::$app->user->identity->email ?></td>
                                </tr>
                                <tr>
                                    <td>NIP:</td>
                                    <td><?php echo @Yii::$app->user->identity->nip ?></td>
                                </tr>
                                <tr class='sr-only'>
                                    <td>Jabatan:</td>
                                    <td  id='jabatan'><?php echo @Yii::$app->user->identity->jabatan ?></td>
                                </tr> 
                                <tr>
                                    <td>Kantor:</td>
                                    <td  id='kantorasal'><?php echo @Yii::$app->user->identity->kd_kantor ?></td>
                                </tr> 


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-8 col-sm-8 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Post Seizure Analysis</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-6">                       
                         <?= $form->field($model, 'atas_pelanggaran_psa')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'oleh_pelanggaran_psa')->textarea(['rows' => 6])  ?>
                        
                    </div>                    

                </div>
                <div class="row">                
                    <div class="col-md-12">

                        <?= $form->field($model, 'kronologi_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>
                <div class="row">                
                    <div class="col-md-12">

                        <?= $form->field($model, 'modus_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>
                <div class="row">                
                    <div class="col-md-12">

                        <?= $form->field($model, 'indikator_resiko_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>
                <div class="row">                
                    <div class="col-md-12">

                        <?= $form->field($model, 'pihak_terkait_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>
                <div class="row">                
                    <div class="col-md-12">

                        <?= $form->field($model, 'analisa_peraturan_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>
                <div class="row">                
                    <div class="col-md-12">

                        <?= $form->field($model, 'signifikansi_penindakan_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>
                <div class="row">                
                    <div class="col-md-12">

                        <?= $form->field($model, 'proses_penanganan_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>
                <div class="row">                
                    <div class="col-md-12">
                        <?= $form->field($model, 'kesimpulan_rekomendasi_psa')->textarea(['rows' => 6])  ?>
                    </div>                    
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>


