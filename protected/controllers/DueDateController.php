<?php

class DueDateController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'filldds'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($app_id) {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new DueDate;
            $applicant = Applicant::model()->findByPk($app_id);
            /////////////////////////////////////////////////////
            // here check if applicant has already been allotted
            // if yes then use category_id from allotment in due dates
            // if not allotted abort and display to make allotment first.
            //////////////////////////////////////////
            $allotment = $applicant->getAllotments();
            if ($applicant !== null && !empty($allotment->data)) {
                $model->scheme_id = $allotment->data[0]->scheme_id;
            } else {
                throw new CHttpException('Please make allotment first. ' . CHtml::link('Click here to go Back', Yii::app()->user->returnUrl));
                exit;
            }

            $paymentTypes = $allotment->data[0]->category->payment_types;
            $paymentTypesOption = array();
            foreach ($paymentTypes as $paymentType) {
                $paymentTypesOption = $paymentTypesOption + array($paymentType->id => $paymentType->payment_type);
            }

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);    

            if (isset($_POST['DueDate'])) {
                $model->attributes = $_POST['DueDate'];
                $model->applicant_id = $app_id;
                if ($model->save())
                    $this->redirect(Yii::app()->user->returnUrl);
            }

            $this->render('create', array(
                'model' => $model,
                'applicant' => $applicant,
                'paymentTypesOption' => $paymentTypesOption,
            ));
        } else {
            $this->accessDenied();
        }
    }

    /**
     * Fills remaining due dates after date of 1st installment
     * @param integer $app_id   id of the applicant who's dute dates to be filled.
     */
    public function actionFilldds($app_id) {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            // get the applicant
            $applicant = Applicant::model()->findByPk($app_id);
            //get its due dates already entered
            $due_dates = $applicant->due_dates;
            //if the are some due dates in db
            if (!empty($due_dates)) {
                //get the interval of installments set for his scheme.
                $interval = $due_dates[0]->scheme->installment_interval;
                $scheme_id = $due_dates[0]->scheme_id;
            } else {
                throw new CHttpException('Please enter due date of 1st Installment');
                exit;
            }

            if (empty($interval)) {
                throw new CHttpException('Please specify installment interval for this scheme. ' . CHtml::link('Click here to resolve', array('/scheme/update', 'id' => $applicant->allotments[0]->scheme_id)));
                exit;
            }

            //get allotment of this applicant
            $allotments = $applicant->getAllotments();
            //get his payment types for this allotment
            $payment_types = $allotments->data[0]->category->payment_types;
            $IstInstDate = null;
            foreach ($due_dates as $due_date) {
                if (preg_match('/[1Ii][sS][tT]/', $due_date->payment_type->payment_type)) {
                    $IstInstDate = $due_date->date;
                }
            }

            //find out if there is 1st installment date in due dates.
            foreach ($payment_types as $payment_type) {
                // if there is not entry for 1st installment exit
                if ($IstInstDate === null) {
                    throw new CHttpException('Please enter due date for 1st installment');
                    exit;
                } elseif (!preg_match('/[dD][oO][wW][nN]/', $payment_type->payment_type) && !preg_match('/[1Ii][sS][tT]/', $payment_type->payment_type)) { //otherwise make entries for all due dates
                    $dds = new DueDate;
                    $dds->scheme_id = $scheme_id;
                    $dds->applicant_id = $app_id;
                    $dds->payment_type_id = $payment_type->id;
                    $date_to_b_saved = date_create_from_format(Yii::app()->user->getDateFormat(false), $IstInstDate);
                    $date_to_b_saved->add(new DateInterval('P' . $interval . 'M'));
                    $dds->date = $date_to_b_saved->format(Yii::app()->user->getDateFormat(false));
                    $IstInstDate = $date_to_b_saved->format(Yii::app()->user->getDateFormat(false));
                    $dds->save();
                }
            }
            $this->redirect(Yii::app()->user->returnUrl);
        } else {
            $this->accessDenied();
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $app_id) {
        $model = $this->loadModel($id);
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id, array('owner' => $model->create_user))) {

            $applicant = Applicant::model()->findByPk($app_id);
            $allotment = $applicant->getAllotments();
            $paymentTypes = $allotment->data[0]->category->payment_types;
            $paymentTypesOption = array();
            foreach ($paymentTypes as $paymentType) {
                $paymentTypesOption = $paymentTypesOption + array($paymentType->id => $paymentType->payment_type);
            }

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['DueDate'])) {
                $model->attributes = $_POST['DueDate'];
                if ($model->save())
                    $this->redirect(Yii::app()->user->returnUrl);
            }

            $this->render('update', array(
                'model' => $model,
                'paymentTypesOption' => $paymentTypesOption,
            ));
        } else {
            $this->accessDenied();
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id, array('owner' => $this->loadModel($id)->create_user))) {
            if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
                $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                    $this->redirect(isset(Yii::app()->user->returnUrl) ? Yii::app()->user->returnUrl : array('admin'));
            }
            else
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }else {
            $this->accessDenied();
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('DueDate');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new DueDate('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['DueDate']))
                $model->attributes = $_GET['DueDate'];

            $this->render('admin', array(
                'model' => $model,
            ));
        }else {
            $this->accessDenied();
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = DueDate::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'due-date-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
