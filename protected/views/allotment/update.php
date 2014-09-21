<?php
$this->breadcrumbs=array(
	'Allotments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Allotment','url'=>array('index')),
	array('label'=>'Create Allotment','url'=>array('create')),
	array('label'=>'View Allotment','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Allotment','url'=>array('admin')),
	);
	?>

	<h1>Update Allotment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>