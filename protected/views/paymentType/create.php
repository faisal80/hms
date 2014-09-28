<?php
$this->breadcrumbs=array(
	'Payment Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PaymentType','url'=>array('index')),
array('label'=>'Manage PaymentType','url'=>array('admin')),
);
?>

<h1>Create Payment Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>