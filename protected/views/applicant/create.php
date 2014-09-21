<?php
$this->breadcrumbs=array(
	'Applicants'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Applicant','url'=>array('index')),
array('label'=>'Manage Applicant','url'=>array('admin')),
);
?>

<h1>Create Applicant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>