<?php

$allData = $dp->getData();
if (empty($allData)) {
    $user = Yii::app()->getComponent('user');
    $user->setFlash(
            'error', "<strong>Not Found!</strong> <a href=\"reminders\"> Click here to go back </a>"
    );
}
$this->widget('booster.widgets.TbAlert', array(
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'events' => array(),
    'htmlOptions' => array(),
    'userComponentId' => 'user',
    'alerts' => array(// configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'),
        'info', // you don't need to specify full config
        'warning' => array('closeText' => false),
        'error' => array('closeText' => false)
    ),
));

//     $this->widget('ext.mPrint.mPrint', array(
//          'title' => 'title',          //the title of the document. Defaults to the HTML title
//          'tooltip' => 'Print',        //tooltip message of the print icon. Defaults to 'print'
//          'text' => 'Print',   //text which will appear beside the print icon. Defaults to NULL
//          'element' => '.print_container',        //the element to be printed.
//          'exceptions' => array(       //the element/s which will be ignored
//              '.summary',
//              '.search-form'
//          ),
//          'publishCss' => false,       //publish the CSS for the whole page?
//          //'visible' => Yii::app()->user->checkAccess('print'),  //should this be visible to the current user?
//          'alt' => 'print',       //text which will appear if image can't be loaded
//          'debug' => false,            //enable the debugger to see what you will get
//          'id' => 'print-div',         //id of the print lin
//          'htmlOptions'=>array(
//              'class'=>'btn btn-primary',
//          )
//      ));

foreach ($allData as $data) {
    echo '<div class="print_container visible-print-block" >';
    $applicant = Applicant::model()->findByPk($data['aid']);
    $this->renderPartial('_reminder', array(
        'data' => $data,
        'allotment' => $applicant->getAllotment(),
        'reminder' => $reminder,
            )
    );
    echo '</div>';
}
?>