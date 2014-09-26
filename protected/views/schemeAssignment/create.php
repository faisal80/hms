<?php
$this->breadcrumbs=array(
	'Scheme Assignments'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List SchemeAssignment','url'=>array('index')),
array('label'=>'Manage SchemeAssignment','url'=>array('admin')),
);
?>

<h2>Assign Scheme to User</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>