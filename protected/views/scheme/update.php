<?php
$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Scheme','url'=>array('index')),
	array('label'=>'Create Scheme','url'=>array('create')),
	array('label'=>'View Scheme','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Scheme','url'=>array('admin')),
	);
	?>

	<h1>Update Scheme <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>