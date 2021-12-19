
<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Breadcrumbs;
//use common\widgets\Alert;
//sweetallert
use yii2mod\alert\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it. 
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
            'main-login', ['content' => $content]
    );
} else {
    if (class_exists('backend\assets\AppAsset')) {
//        yiister\gentelella\assets\Asset::register($this);
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }
    ?>

    <?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta charset="<?= Yii::$app->charset ?>" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head> 
        <body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?> " >
            <?php $this->beginBody(); ?>
            <?=
            Alert::widget([])
            ?>
            <div class="container body">

                <div class="main_container">

                    <div class="col-md-3 left_col">
                        <div class="left_col scroll-view">

                            <div class="navbar nav_title" style="border: 0;">
                                <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Sulbagtara IOS</span></a>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                            $empInfo = backend\models\User::findOne(@Yii::$app->user->identity->id);
                            $Photo = $empInfo->getPhoto($empInfo->photo);
                            $ProfileLink = ['/employee/emp-master/view', 'id' => $empInfo->id];
                            ?>
                            <!-- menu prile quick info -->
                            <?php if (!Yii::$app->user->isGuest) : ?>
                                <div class="profile">
                                    <div class="profile_pic">
                                        <img src="<?= $Photo ?>" class="img-circle profile_img" alt="User Image"/>
                                    </div>
                                    <div class="profile_info">

                                        <span>Welcome,</span>
                                        <h2><?= @Yii::$app->user->identity->username ?></h2>
                                    </div>
                                </div>
                            <?php endif ?>

                            <!-- /menu prile quick info -->

                            <br />

                            <!-- sidebar menu -->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <div class="menu_section">
                                    <h3>General</h3>

                                    <?=
                                    \yiister\gentelella\widgets\Menu::widget(
                                            [
                                                "items" => [
                                                    ["label" => "Home", "url" => ["/site/index"], "icon" => "home"],
                                                    [
                                                        "label" => "Admin",
                                                        "url" => "#",
                                                        "icon" => "user",
                                                        "items" => [
                                                            [
                                                                "label" => "User App",
                                                                "url" => ["/user/index"],
                                                            ],
                                                            [
                                                                "label" => "Hak Akses",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "Auth Item",
                                                                        "url" => ["/auth-item/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Auth Item Child",
                                                                        "url" => ["/auth-item-child/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Auth Assignment",
                                                                        "url" => ["/auth-assignment/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                            [
                                                                "label" => "Auto Number",
                                                                "url" => ["/auto-number/index"],
                                                            ],
                                                            [
                                                                "label" => "Pesan Dashboard",
                                                                "url" => ["msg-of-day/index"],
                                                            ],
                                                            [
                                                                "label" => "Notice",
                                                                "url" => ["notice/index"],
                                                            ],
                                                        ],
                                                    ],
                                                    [
                                                        "label" => "Setting Aplikasi",
                                                        "url" => "#",
                                                        "icon" => "plug",
                                                        "items" => [
                                                            [
                                                                "label" => "Modul Umum P2",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "Pejabat Ttd",
                                                                        "url" => ["/setting/p2-pejabat/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Petugas P2",
                                                                        "url" => ["/setting/p2-petugas/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Kategori Objek",
                                                                        "url" => ["/setting/p2-kategori-objek/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Kategori Penugasan",
                                                                        "url" => ["/setting/p2-kategori-penugasan/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                            [
                                                                "label" => "Modul Intelijen",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "Cek Sumber Info",
                                                                        "url" => ["/setting/p2-intel-cek-sumber/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Cek Valid Info",
                                                                        "url" => ["/setting/p2-intel-cek-valid/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Kategori LPPI",
                                                                        "url" => ["/setting/p2-intel-lppi-kategori/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Kategori Sumber Info",
                                                                        "url" => ["/setting/p2-intel-lppi-sumberinfo/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Media",
                                                                        "url" => ["/setting/p2-intel-lppi-media/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                            [
                                                                "label" => "Data Kantor",
                                                                "url" => ["/setting/db-kantor/index"],
                                                            ],
                                                        ],
                                                    ],
                                                    [
                                                        "label" => "Berkas P2",
                                                        "url" => "#",
                                                        "icon" => "file-o",
                                                        "items" => [

                                                            [
                                                                "label" => "Intelijen",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "STPI",
                                                                        "url" => ["/p2/p2-intel-stpi/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LPTI",
                                                                        "url" => ["/p2/p2-intel-lpti/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LPPI",
                                                                        "url" => ["/p2/p2-intel-lppi/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LKAI",
                                                                        "url" => ["/p2/p2-intel-lkai/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "NHI",
                                                                        "url" => ["/p2/p2-intel-nhi/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "NI",
                                                                        "url" => ["/p2/p2-intel-ni/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "PSA",
                                                                        "url" => ["/p2/p2-intel-psa/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "NP",
                                                                        "url" => ["/p2/p2-intel-np/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                            [
                                                                "label" => "Penindakan",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "LI 1",
                                                                        "url" => ["/p2/p2-indak-li/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LAPP",
                                                                        "url" => ["/p2/p2-indak-lapp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "NPI",
                                                                        "url" => ["/p2/p2-indak-npi/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "MPP",
                                                                        "url" => ["/p2/p2-indak-mpp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "SBP",
                                                                        "url" => ["/p2/p2-indak-sbp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LPTP",
                                                                        "url" => ["/p2/p2-indak-lptp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LPHP",
                                                                        "url" => ["/p2/p2-indak-lphp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LP",
                                                                        "url" => ["/p2/p2-indak-lp/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                            [
                                                                "label" => "Penyidikan",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "LP Perkara",
                                                                        "url" => ["/p2/p2-sidik-lpp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LP Formal",
                                                                        "url" => ["/p2/p2-sidik-lpf/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LP-1",
                                                                        "url" => ["/p2/p2-sidik-lp1/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "SPLIT",
                                                                        "url" => ["/p2/p2-sidik-split/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LHP",
                                                                        "url" => ["/p2/p2-sidik-lhp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "LRP",
                                                                        "url" => ["/p2/p2-sidik-lrp/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                            [
                                                                "label" => "Berita Acara",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "BA Bukti Penegahan",
                                                                        "url" => ["babp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Penolakan SBP",
                                                                        "url" => ["batolaksbp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Penolakan TTD BA Tolak SBP",
                                                                        "url" => ["batolakttd/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Pemeriksaan",
                                                                        "url" => ["bariksa/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Membawa Sarkut/Brg",
                                                                        "url" => ["babawasarkutbrg/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Penyegelan",
                                                                        "url" => ["basegel/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Buka Segel",
                                                                        "url" => ["babukasegel/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Serah Terima Brg",
                                                                        "url" => ["bastbrg/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Pemeriksaan Badan",
                                                                        "url" => ["bariksabadan/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Uji Pendahuluan",
                                                                        "url" => ["baujidahulu/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Pengambilan Contoh",
                                                                        "url" => ["baambilcontoh/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Pengambilan Dokumentasi Brg",
                                                                        "url" => ["baambildokbrg/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "BA Penitipan",
                                                                        "url" => ["batitip/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
//                                                    [
//                                                        "label" => "Cyber Crawling",
//                                                        "url" => "#",
//                                                        "icon" => "search",
//                                                        "items" => [
//                                                            [
//                                                                "label" => "Cek Resi",
//                                                                "url" => ["cekresi/index"],
//                                                            ],
//                                                            [
//                                                                "label" => "Atensi",
//                                                                "url" => "#",
//                                                                "items" => [
//                                                                    [
//                                                                        "label" => "Add Atensi",
//                                                                        "url" => ["auth-item/index"],
//                                                                    ],
//                                                                    [
//                                                                        "label" => "NI-Narkotik",
//                                                                        "url" => ["nin/index"],
//                                                                    ],
//                                                                    [
//                                                                        "label" => "NHI-Narkotik",
//                                                                        "url" => ["nhin/index"],
//                                                                    ],
//                                                                ],
//                                                            ],
//                                                        ],
//                                                    ],
                                                    [
                                                        "label" => "Profilling",
                                                        "url" => "#",
                                                        "icon" => "search",
                                                        "items" => [
                                                            [
                                                                "label" => "Objek Pengawasan",
                                                                "url" => ["objekpengawasan/index"],
                                                            ],
                                                            [
                                                                "label" => "Profil",
                                                                "url" => "#",
                                                                "items" => [
                                                                    [
                                                                        "label" => "Kawasan Pabean/TPS",
                                                                        "url" => ["/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Pelabuhan Udara/Laut Non KP",
                                                                        "url" => ["nin/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Pelabuhan Tradisional",
                                                                        "url" => ["peltradisional/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "TPP",
                                                                        "url" => ["tpp/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Kawasan Berikat",
                                                                        "url" => ["kb/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Gudang Berikat",
                                                                        "url" => ["gb/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "PLB",
                                                                        "url" => ["plb/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "TBB",
                                                                        "url" => ["tbb/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Pabrik MMEA",
                                                                        "url" => ["pabrikmmea/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Pabrik HT",
                                                                        "url" => ["pabrikht/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Pabrik EA",
                                                                        "url" => ["pabrikea/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "TPE",
                                                                        "url" => ["tpe/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Tempat Penyimpanan",
                                                                        "url" => ["tempatpenyimpanan/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Importir",
                                                                        "url" => ["importir/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Eksportir",
                                                                        "url" => ["eksportir/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Distributor/Agen",
                                                                        "url" => ["distributoragen/index"],
                                                                    ],
                                                                    [
                                                                        "label" => "Tempat Lainnya",
                                                                        "url" => ["tempatlainnya/index"],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
//                                                    [
//                                                        "label" => "E-CD",
//                                                        "url" => "#",
//                                                        "icon" => "search",
//                                                        "items" => [
//                                                            [
//                                                                "label" => "Master CD",
//                                                                "url" => ["ecd/index"],
//                                                            ],
//                                                            [
//                                                                "label" => "Atensi",
//                                                                "url" => "#",
//                                                                "items" => [
//                                                                    [
//                                                                        "label" => "Add Atensi",
//                                                                        "url" => ["ecdatensi/index"],
//                                                                    ],
//                                                                ],
//                                                            ],
//                                                        ],
//                                                    ],
                                                ],
                                            ]
                                    )
                                    ?>
                                </div>

                            </div>
                            <!-- /sidebar menu -->

                            <!-- /menu footer buttons -->
                            <div class="sidebar-footer hidden-small">
                                <a data-toggle="tooltip" data-placement="top" title="Settings">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Lock">
                                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Logout">
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                </a>
                            </div>
                            <!-- /menu footer buttons -->
                        </div>
                    </div>

                    <!-- top navigation -->
                    <div class="top_nav">

                        <div class="nav_menu">
                            <nav class="" role="navigation">
                                <div class="nav toggle">
                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                </div>

                                <ul class="nav navbar-nav navbar-right">                                    
                                    <li class="">

                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <?= @Yii::$app->user->identity->username ?>                                            
                                            <span class=" fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-left">
                                            <li>
                                                <div class="row" style="">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">User information</h3>
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
                                                                                    <tr>
                                                                                        <td>Sejak:</td> 
                                                                                        <td><?php echo @Yii::$app->user->identity->created_at ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>IP:</td> 
                                                                                        <td id='ipaddress'><?php echo Yii::$app->getRequest()->getUserIP() ?> </td>
                                                                                    </tr>  
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel-footer">
                                                                    <div class="row">
                                                                        <div class="col-xs-3">
                                                                            <?= Html::a('Profil', ['/user/profil', 'id' => Yii::$app->user->id], ['class' => 'btn btn-sm btn-warning ']) ?>
                                                                        </div>
                                                                        <div class="col-xs-3">
                                                                            <?= Html::a('Log out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-sm btn-danger']) ?>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </li>                                
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <!-- /top navigation -->

                    <!-- page content -->
                    <div class="right_col" role="main">

                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>

                        <?= $content ?>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /page content -->
                    <!-- footer content -->
                    <footer>
                        <div class="pull-right">
                            Sulbagtara Intelligence Operation Support System  <a href="#" rel="nofollow" target="_blank">@Tim IT Sulbagtara-2022</a><br />

                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>

            </div>

            <div id="custom_notifications" class="custom-notifications dsp_none">
                <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
                </ul>
                <div class="clearfix"></div>
                <div id="notif-group" class="tabbed_notifications"></div>
            </div>
            <!-- /footer content -->
            <?php $this->endBody(); ?>
        </body>
    </html>
    <?php $this->endPage(); ?>
<?php } ?>