<?php

class AllotmentController extends Controller {

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
//            'rights',       //added by rights module
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
                'actions' => array('index', 'view', 'find', 'viewTransferSheet'),
                'users' => array('@'),
//                'roles' => array('Authenticated'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
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
        Yii::app()->user->setReturnUrl($this->createUrl('view', array('id'=>$id)));
        $model = $this->loadModel($id);
        $transfers = new CActiveDataProvider('Transfer', array(
            'criteria' => array(
                'condition' => 'allotment_id=:aid',
                'params' => array(':aid' => $id),
            )
        ));

        $this->render('view', array(
            'model' => $model,
            'callottee' => $model->currentAllottee,
            'transfers' => $transfers,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($app_id) {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new Allotment;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Allotment'])) {
                $model->attributes = $_POST['Allotment'];
                $model->applicant_id = $app_id;
                if ($model->save())
                    $this->redirect(Yii::app()->user->returnUrl);
            }

            $this->render('create', array(
                'model' => $model,
                'applicant' => Applicant::model()->findByPk($app_id),
            ));
        } else {
            $this->accessDenied();
        }
    }

    public function actionFind() {
        if (isset($_POST['plot_no']) && isset($_POST['street_no']) ) {
            $criteria = new CDbCriteria();
            $criteria->compare('plot_no',$_POST['plot_no']);
            $criteria->compare('street_no', $_POST['street_no']);
            if (isset($_POST['sector']))
                $criteria->compare ('sector', $_POST['sector'], true);
            if (isset($_POST['phase']))
                $criteria->compare ('phase', $_POST['phase'], true);
            $allotments = Allotment::model()->findAll($criteria);
            if (empty($allotments)) {
                $user = Yii::app()->getComponent('user');
                $user->setFlash('error', '<strong>Plot No. '.$_POST['plot_no'] . ' not Found!</strong>');
                $this->render('transfer_params');
            } else {
                $allotments = new CArrayDataProvider($allotments);
                $this->render('allotments', array(
                    'allotments'=>$allotments,
                ));
            }
        } else {
            $this->render('transfer_params');
        }
    }

    public function actionViewTransferSheet($id){
        $model = $this->loadModel($id);
        $transfers = $model->last_2_transfers;
        $this->layout = 'print_one';
        $this->render('transfer_sheet', array(
            'allotment' => $model,
            'transfers' => $transfers,
        ));
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id, array('owner' => $model->create_user))) {

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

            if (isset($_POST['Allotment'])) {
                $model->attributes = $_POST['Allotment'];
                if ($model->save())
                    $this->redirect(Yii::app()->user->returnUrl);
            }

            $this->render('update', array(
                'model' => $model,
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
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
        $dataProvider = new CActiveDataProvider('Allotment');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new Allotment('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Allotment']))
                $model->attributes = $_GET['Allotment'];

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
        $model = Allotment::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'allotment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
