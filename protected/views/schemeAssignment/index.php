<?php
$this->breadcrumbs=array(
	'Scheme Assignments',
);

$this->menu=array(
array('label'=>'Create SchemeAssignment','url'=>array('create')),
array('label'=>'Manage SchemeAssignment','url'=>array('admin')),
);
?>

<h2>Scheme Assignments</h2>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
