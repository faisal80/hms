<?php

class ApplicantController extends Controller {

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
//            'rights',
        );
    }

//    public function allowedActions() {
//        return 'index, view';
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'allotmentOrder', 'reminders'),
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

        Yii::app()->user->setReturnUrl($this->createUrl('view', array('id' => $id)));
        // Query the rows from allotments relating to this applicant
//        $allotmentsDP = new CActiveDataProvider('Allotment', array(
//            'criteria' => array(
//                'condition' => 'applicant_id=:applicantId',
//                'params' => array(':applicantId' => $id),
//            ),
//            'pagination' => array(
//                'pageSize' => 100,
//            ),
//        ));

        $paymentDetailDP = new CActiveDataProvider('PaymentDetail', array(
            'criteria' => array(
                'condition' => 'applicant_id=:applicantId',
                'params' => array(':applicantId' => $id),
            ),
            'pagination' => array('pageSize' => 100),
        ));

        $duedatesDP = new CActiveDataProvider('DueDate', array(
            'criteria' => array(
                'condition' => 'applicant_id=:applicantId',
                'params' => array(':applicantId' => $id),
            ),
            'pagination' => array('pageSize' => 100),
        ));


        $this->render('view', array(
            'model' => $this->loadModel($id),
//            'allotments' => $this->getAllotment(),
            'payment_detail' => $paymentDetailDP,
            'due_dates' => $duedatesDP,
            'penalties' => (empty($duedatesDP->data)) ? new CArrayDataProvider(array()) : $this->penalties($duedatesDP->data[0]->scheme->occurence, $duedatesDP->data[0]->scheme->penalty, $id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new Applicant;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

            if (isset($_POST['Applicant'])) {
                $model->attributes = $_POST['Applicant'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
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

            if (isset($_POST['Applicant'])) {
                $model->attributes = $_POST['Applicant'];
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
        }else {
            $this->accessDenied();
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Applicant');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->user->checkAccess($this->id . '.' . $this->action->id)) {
            $model = new Applicant('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Applicant']))
                $model->attributes = $_GET['Applicant'];

            $this->render('admin', array(
                'model' => $model,
            ));
        } else {
            $this->accessDenied();
        }
    }

    public function actionAllotmentOrder($id) {
        Yii::app()->user->setReturnUrl($this->createUrl('view', array('id' => $id)));
        $this->layout = 'print';
        $allotments = $this->loadModel($id)->getAllotment();
        if (empty($allotments->data[0]->payments_detail)) {
            throw new CHttpException('Please enter payment detail first. ' . CHtml::link('Click here to go Back', Yii::app()->user->returnUrl));
            exit;
        }
        $this->render('_order', array('model' => $allotments->data[0]));
    }

    public function actionReminders($payment_type) {
        //$this->layout = 'print';
        $sql='
            SELECT 
                category.id, 
                category.category, 
                category.plot_size, 
                category.scheme_id, 
                category.corner, 
                applicant.name, 
                applicant.fname,
                applicant.postal_address,
                applicant.contact_1,
                applicant.contact_2,
                due_date.date ddate, 
                payment_type.payment_type, 
                payment_type.amount
                allotment.order_no,
                allotment.date adate,
                allotment.plot_no,
                allotment.street_no,
                allotment.sector,
                allotment.phase
            FROM 
                category
            INNER JOIN 
                (refund 
                 RIGHT JOIN 
                    (allotment 
                     RIGHT JOIN 
                        (applicant 
                         LEFT JOIN 
                            (due_date 
                             INNER JOIN 
                                (payment_type
                                 LEFT JOIN
                                    payment_detail
                                 ON
                                    payment_type.id=payment_detail.payment_type_id)
                             ON 
                                due_date.payment_type_id=payment_type.id)
                         ON 
                            applicant.id=due_date.applicant_id)
                     ON 
                        allotment.applicant_id=applicant.id)
                 ON 
                    allotment.id=refund.allotment_id)
            ON 
                category.id=allotment.category_id
            WHERE
                refund.allotment_id IS NULL
            AND
                payment_detail.payment_type_id IS NULL
            AND
                payment_type.payment_type=\''.$payment_type.'\'';
//        $rawData=Yii::app()->db->createCommand($sql)->queryAll();
        $dp = new CSqlDataProvider($sql, array(
            'pagination'=>array(
                'pageSize'=>99999,
            )
        ));
        $this->render('reminders', array(
            'dp'=>$dp,
            'reminder'=>'1st Reminder',
            'scheme'=>'Jalozai Housing Scheme',
            ));
    }
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Applicant::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'applicant-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function penalties($occurence, $penalty, $app_id) {
        $rawData=Yii::app()->db->createCommand('
            SELECT 
                DATEDIFF(payment_detail.date, due_date.date) AS days, 
                '.(($occurence == 'permonth') ? '((payment_type.amount*' . $penalty . '/100)/30)*DATEDIFF(payment_detail.date, due_date.date) AS penalty' : '(((payment_type.amount*' . $penalty . '/100)/12)/30)*DATEDIFF(payment_detail.date, due_date.date) AS penalty'). ', 
                due_date.date AS ddate,
                due_date.applicant_id AS app_id, 
                payment_detail.payment_type_id,
                payment_detail.amount, 
                payment_detail.date AS pdate, 
                payment_type.payment_type
            FROM 
                (payment_type INNER JOIN due_date ON payment_type.id = due_date.payment_type_id) 
            INNER JOIN 
                payment_detail ON (due_date.applicant_id = payment_detail.applicant_id) AND (payment_type.id = payment_detail.payment_type_id)
            WHERE 
                (DATEDIFF(payment_detail.date, due_date.date)>0) AND (due_date.applicant_id='.$app_id.');'
            )->queryAll();
        
        return new CArrayDataProvider($rawData, array(
            'keyField'=>'payment_type_id',
            'pagination' => array(
                'pageSize' => 200,
            ),
        ));
    }

}
