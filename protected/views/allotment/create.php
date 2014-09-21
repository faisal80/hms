<?php
$this->breadcrumbs=array(
	'Allotments'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Allotment','url'=>array('index')),
array('label'=>'Manage Allotment','url'=>array('admin')),
);
?>

<h1>Create Allotment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>