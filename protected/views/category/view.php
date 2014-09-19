<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Category','url'=>array('index')),
array('label'=>'Create Category','url'=>array('create')),
array('label'=>'Update Category','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Category','url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'category',
		'plot_size',
		'corner'=>array(
            'type'=>'boolean',
            'name'=>'corner',
        ),
		'scheme.name',
//		(Yii::app()->user->name === 'admin')?'create_user':null,
//		'create_time',
//		'update_user',
//		'update_time',
),
)); ?>
