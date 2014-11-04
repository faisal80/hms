<?php

foreach ($dp as $data){
    $this->renderPartial('_reminder', array(
            'data'=>$data,
            'reminder'=>$reminder,
            //'scheme'=>$scheme,
        )
    );
}

?>