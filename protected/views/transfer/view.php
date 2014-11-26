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
		'allotment'=>array(
            'label'=>'Allotment',
            'value'=>"Plot No. " .$model->allotment->plot_no . 
                      " Street No. ".$model->allotment->street_no .
                      (empty($model->allotment->sector)?" ":" Sector ".$model->allotment->sector) . 
                      (empty($model->allotment->phase)?" ":" Phase ".$model->allotment->phase) . 
                      $model->allotment->category->fullCategory,
        ),
		'transfer_from'=>array(
            'label'=>'Transferred From',
            'value'=>$model->transfer_id === null? 
                $model->allotment->applicant->name:
                $model->transfer_from->transfer_to->name,
        ),
		'transfer_to'=>array(
            'label'=>'Transferred To',
            'name'=> 'transfer_to.name',
        ),
		'transfer_date',
		'deed_no',
),
)); ?>
