<?php
$this->breadcrumbs=array(
	'Scheme Assignments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List SchemeAssignment','url'=>array('index')),
	array('label'=>'Create SchemeAssignment','url'=>array('create')),
	array('label'=>'View SchemeAssignment','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage SchemeAssignment','url'=>array('admin')),
	);
	?>

	<h1>Update SchemeAssignment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>