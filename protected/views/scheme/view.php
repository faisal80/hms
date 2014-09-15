<?php
/* @var $this SchemeController */
/* @var $model Scheme */
?>

<?php
$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Scheme', 'url'=>array('index')),
	array('label'=>'Create Scheme', 'url'=>array('create')),
	array('label'=>'Update Scheme', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Scheme', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Scheme', 'url'=>array('admin')),
);
?>

<h1>View Scheme #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'draw_date',
		'penalty',
		'occurence',
		'installment_interval',
		'account',
		'bank',
		'create_user',
		'create_time',
		'update_user',
		'update_time',
	),
)); ?>