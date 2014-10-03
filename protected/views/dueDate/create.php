<?php
$this->breadcrumbs=array(
	'Due Dates'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DueDate','url'=>array('index')),
array('label'=>'Manage DueDate','url'=>array('admin')),
);
?>

<h1>Enter Due Date</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>