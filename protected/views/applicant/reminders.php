<?php
$allData = $dp->getData();
foreach ($allData as $data){
    $this->renderPartial('_reminder', array(
            'data'=>$data,
            'reminder'=>$reminder,
            'scheme'=>$scheme,
        )
    );
}

?>