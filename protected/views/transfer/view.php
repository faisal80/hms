<?php
$this->breadcrumbs=array(
	'Transfers'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Transfer','url'=>array('index')),
array('label'=>'Create Transfer','url'=>array('create')),
array('label'=>'Update Transfer','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Transfer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Transfer','url'=>array('admin')),
);
?>

<h1>View Transfer #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'allotment_id',
		'transfer_date',
		'transfer_id',
		'applicant_id',
		'deed_no',
		'create_user',
		'create_time',
		'update_user',
		'update_time',
),
)); ?>
