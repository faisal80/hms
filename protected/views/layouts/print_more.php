<?php /* @var $this Controller */ ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet">
<?php $this->beginContent('//layouts/main');
	 echo $content;
$this->endContent(); ?>