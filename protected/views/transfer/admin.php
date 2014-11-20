<?php
$this->breadcrumbs=array(
	'Transfers'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Transfer','url'=>array('index')),
array('label'=>'Create Transfer','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('transfer-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Transfers</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'transfer-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'type'=>'striped',
'columns'=>array(
		'id',
		'allotment'=>array(
            'header'=>'Allotment',
            'value'=>'"Plot No. " .$data->allotment->plot_no . 
                      " Street No. ".$data->allotment->street_no .
                      (empty($data->allotment->sector)?" ":" Sector ".$data->allotment->sector) . 
                      (empty($data->allotment->phase)?" ":" Phase ".$data->allotment->phase) . 
                      $data->allotment->category->fullCategory',
        ),
		'transfer_from'=>array(
            'header'=>'Transferred From',
            'value'=>'$data->transfer_id == null? 
                $data->allotment->applicant->name:
                $data->transfer_from->transfer_to->name',
        ),
		'transfer_to'=>array(
            'header'=>'Transferred To',
            'name'=> 'transfer_to.name',
        ),
		'transfer_date',
		'deed_no',
		/*
		'create_user',
		'create_time',
		'update_user',
		'update_time',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions' => array('nowrap'=>'nowrap'),
),
),
)); ?>
