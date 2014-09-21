<?php
$this->breadcrumbs=array(
	'Due Dates'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DueDate','url'=>array('index')),
array('label'=>'Create DueDate','url'=>array('create')),
array('label'=>'Update DueDate','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DueDate','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DueDate','url'=>array('admin')),
);
?>

<h1>View DueDate #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'applicant.name',
		'date',
		'payment_type.payment_type',
		'scheme.name',
),
)); ?>
