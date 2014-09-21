<?php
$this->breadcrumbs=array(
	'Due Dates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DueDate','url'=>array('index')),
	array('label'=>'Create DueDate','url'=>array('create')),
	array('label'=>'View DueDate','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DueDate','url'=>array('admin')),
	);
	?>

	<h1>Update DueDate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>