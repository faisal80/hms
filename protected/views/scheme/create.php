<?php
/* @var $this SchemeController */
/* @var $model Scheme */
?>

<?php
$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Scheme', 'url'=>array('index')),
	array('label'=>'Manage Scheme', 'url'=>array('admin')),
);
?>

<h1>Create Scheme</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>