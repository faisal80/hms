<?php
$this->breadcrumbs=array(
	'Allotments',
);

$this->menu=array(
array('label'=>'Create Allotment','url'=>array('create')),
array('label'=>'Manage Allotment','url'=>array('admin')),
);
?>

<h1>Allotments</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
