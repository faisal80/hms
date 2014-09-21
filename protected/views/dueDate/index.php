<?php
$this->breadcrumbs=array(
	'Due Dates',
);

$this->menu=array(
array('label'=>'Create DueDate','url'=>array('create')),
array('label'=>'Manage DueDate','url'=>array('admin')),
);
?>

<h1>Due Dates</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
