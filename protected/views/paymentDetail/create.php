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

<h2>Enter Payment Detail for <?php echo $applicant->NameWithTitle; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'paymentTypeOptions'=>$paymentTypeOptions)); ?>