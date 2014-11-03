<?php

foreach ($applicants as $applicant){
    $this->renderPartial('_reminder', array(
            'applicant'=>$applicant,
            'reminder'=>$reminder,
            'installment'=>$installment,
            'scheme'=>$scheme,
        )
    );
}

?>