<?php
$allData = $dp->getData();
foreach ($allData as $data){
    echo '<div class="print_container" style="page-break-after: always;">';
    $applicant = Applicant::model()->findByPk($data['aid']);
    $this->renderPartial('_reminder', array(
            'data'=>$data,
            'allotment'=>$applicant->getAllotment(),
            'reminder'=>$reminder,
            'scheme'=>$scheme,
        )
    );
    echo '</div>';
}

?>