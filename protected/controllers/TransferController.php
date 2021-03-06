<?php

class TransferController extends Controller {

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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $aid Allotment ID
     * @param integer $tid Transfer ID
     */
    public function actionCreate($aid, $tid) {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new Transfer;
            $model->transfer_date = date(Yii::app()->user->getDateFormat(false), time());

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Transfer'])) {
                $model->attributes = $_POST['Transfer'];
                $model->allotment_id = $aid;
                if (!is_null($tid))
                    $model->transfer_id = $tid;
                if ($model->save())
                    $this->redirect(Yii::app()->user->returnUrl);
            }

            $this->render('create', array(
                'model' => $model,
            ));
        } else {
            $this->accessDenied();
        }
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

            if (isset($_POST['Transfer'])) {
                $model->attributes = $_POST['Transfer'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
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
        } else {
            $this->accessDenied();
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Transfer');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new Transfer('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Transfer']))
                $model->attributes = $_GET['Transfer'];

            $this->render('admin', array(
                'model' => $model,
            ));
        } else {
            $this->accessDenied();
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Transfer::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'transfer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
