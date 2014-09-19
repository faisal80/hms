<?php
$this->breadcrumbs=array(
	'Payment Types'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List PaymentType','url'=>array('index')),
array('label'=>'Create PaymentType','url'=>array('create')),
array('label'=>'Update PaymentType','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete PaymentType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PaymentType','url'=>array('admin')),
);
?>

<h1>View PaymentType #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'category.category',
        'category.plot_size',
        'category.corner'=>array(
            'type'=>'boolean',
            'name'=>'category.corner',
        ),
		'payment_type',
		'amount'=>array(
            'type'=>'raw',
            'label'=>'Amount',
            'value'=>number_format($model->amount),
        ),
//		'create_user',
//		'create_time',
//		'update_user',
//		'update_time',
),
)); ?>
