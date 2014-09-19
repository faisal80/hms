<?php
$this->breadcrumbs=array(
	'Payment Types',
);

$this->menu=array(
array('label'=>'Create PaymentType','url'=>array('create')),
array('label'=>'Manage PaymentType','url'=>array('admin')),
);
?>

<h1>Payment Types</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
