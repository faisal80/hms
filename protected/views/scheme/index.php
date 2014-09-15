<?php
/* @var $this SchemeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Schemes',
);

$this->menu=array(
	array('label'=>'Create Scheme','url'=>array('create')),
	array('label'=>'Manage Scheme','url'=>array('admin')),
);
?>

<h1>Schemes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>