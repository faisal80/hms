<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet">
<?php
$allData = $dp->getData();
foreach ($allData as $data){
    echo '<div class="print_container" style="page-break-after: always;">';
    $this->renderPartial('_reminder', array(
            'data'=>$data,
            'reminder'=>$reminder,
            'scheme'=>$scheme,
        )
    );
    echo '</div>';
}

?>