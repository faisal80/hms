<?php
$this->breadcrumbs=array(
	'Refunds'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Refund','url'=>array('index')),
array('label'=>'Create Refund','url'=>array('create')),
array('label'=>'Update Refund','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Refund','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Refund','url'=>array('admin')),
);
?>

<h1>View Refund #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'applicant.name',
		'allotment.category.plot_size',
		'amount',
		'date',
		'date_applied',
),
)); ?>
