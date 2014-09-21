<?php
$this->breadcrumbs=array(
	'Payment Details',
);

$this->menu=array(
array('label'=>'Create PaymentDetail','url'=>array('create')),
array('label'=>'Manage PaymentDetail','url'=>array('admin')),
);
?>

<h1>Payment Details</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
