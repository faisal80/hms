<?php
$this->breadcrumbs=array(
	'Applicants'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Applicant','url'=>array('index')),
	array('label'=>'Create Applicant','url'=>array('create')),
	array('label'=>'View Applicant','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Applicant','url'=>array('admin')),
	);
	?>

	<h1>Update Applicant <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>