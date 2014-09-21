<?php
$this->breadcrumbs=array(
	'Payment Details'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PaymentDetail','url'=>array('index')),
array('label'=>'Manage PaymentDetail','url'=>array('admin')),
);
?>

<h1>Create PaymentDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>