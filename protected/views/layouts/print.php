<?php /* @var $this Controller */ ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet">
<?php $this->beginContent('//layouts/main');
     echo '<div class="print_container">';
	 echo $content;
     echo '</div>';
$this->endContent(); ?>