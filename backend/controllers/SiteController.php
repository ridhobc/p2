<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use backend\models\SuratMasuk;
use backend\models\SuratMasukSearch;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {//buat chart
        

        if (\Yii::$app->user->identity->role == 'admin') {
            $this->layout = 'main';
            return $this->render('admin-dashboard', [
                        'searchModelnews' => $searchModelnews,
                        'dataProvidernews' => $dataProvidernews,
                       
            ]);
        
        } else if (\Yii::$app->user->identity->role == 'stafkanwil') {
            $this->layout = 'main';
            return $this->render('user-dashboard', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'searchModelnews' => $searchModelnews,
                        'dataProvidernews' => $dataProvidernews,
                        'agendahariini' => $agendahariini,
                        'agendaall' => $agendaall,
                        'searchModelplh' => $searchModelplh,
                        'dataProviderplh' => $dataProviderplh,
            ]);
        }
    }

    

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
           
            return $this->goHome();
             echo "belum login";
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAddEvent() {
        $model = new Events();

        if ($model->load(Yii::$app->request->post()) || isset($_POST['Events'])) {

            $eventList = Events::find()->where(['LIKE', 'event_start_date', Yii::$app->dateformatter->getDateFormat($_POST['Events']['event_start_date'])])->andwhere(['is_status' => 0])->count();

            if ($eventList > 6) {
                Yii::$app->session->setFlash('maxEvent', "<b><i class='fa fa-warning'></i> Maximum Events Limit Reached, you can not add more event for this day</b>");
                return $this->redirect(['index']);
            }
            $model->attributes = $_POST['Events'];
            $model->event_start_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_start_date']);
            $model->event_end_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_end_date']);
            $model->created_by = Yii::$app->getid->getId();
            $model->created_at = new \yii\db\Expression('NOW()');

            if ($model->save()) {
                if (isset($_GET['return_dashboard']))
                    return $this->redirect(['/dashboard']);
                else
                    return $this->redirect(['/site/index']);
            }
            else {
                return $this->renderAjax('_form', ['model' => $model,]);
            }
        } else {
            return $this->renderAjax('_form', [
                        'model' => $model,
            ]);
        }
    }

    public function actionViewEvents($start = NULL, $end = NULL, $_ = NULL) {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $eventList = Events::find()->where(['is_status' => 0])->all();

        $events = [];

        foreach ($eventList as $event) {
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $event->event_id;
            $Event->title = $event->event_title;
            $Event->description = $event->event_detail;
            $Event->start = $event->event_start_date;
            $Event->end = $event->event_end_date;
//	      $Event->color = (($event->event_type == 1) ? '#00A65A' : (($event->event_type == 2) ? '#00C0EF' : (($event->event_type == 3) ? '#F39C12' : '#074979')));
            $Event->textColor = '#FFF';
            $Event->borderColor = '#000';
//	      $Event->event_type = (($event->event_type == 1) ? 'Holiday' : (($event->event_type == 2) ? 'Important Notice' : (($event->event_type == 3) ? 'Meeting' : 'Messages')));
            $Event->allDay = ($event->event_all_day == 1) ? true : false;
            // $Event->url = $event->event_url;
            $events[] = $Event;
        }
        return $events;
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateEvent($event_id) {
        $model = $this->findModel($event_id);

        if ($model->load(Yii::$app->request->post()) || isset($_POST['Events'])) {

            $model->attributes = $_POST['Events'];
            $model->event_start_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_start_date']);
            $model->event_end_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_end_date']);
            $model->updated_by = Yii::$app->getid->getId();
            $model->updated_at = new \yii\db\Expression('NOW()');

            if ($model->save()) {
                if (isset($_GET['return_dashboard']))
                    return $this->redirect(['/dashboard']);
                else
                    return $this->redirect(['index']);
            }
            else {
                return $this->renderAjax('_form', ['model' => $model,]);
            }
        } else {
            return $this->renderAjax('_form', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEventDelete($e_id) {
        $model = Events::findOne($e_id);
        $model->is_status = 2;
        $model->updated_by = Yii::$app->getid->getId();
        $model->updated_at = new \yii\db\Expression('NOW()');
        $model->save();

        if (isset($_GET['return_dashboard']))
            return $this->redirect(['/dashboard']);
        else
            return $this->redirect(['index']);
    }

    
}
