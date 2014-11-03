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

<h2>Create Payment Type for <?php echo $cat_name; ?> category</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>