<?php
$this->breadcrumbs=array(
	'Scheme Assignments'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List SchemeAssignment','url'=>array('index')),
array('label'=>'Create SchemeAssignment','url'=>array('create')),
array('label'=>'Update SchemeAssignment','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete SchemeAssignment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SchemeAssignment','url'=>array('admin')),
);
?>

<h1>View SchemeAssignment #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'user_id',
		'scheme_id',
		'create_user',
		'create_time',
		'update_user',
		'update_time',
),
)); ?>
