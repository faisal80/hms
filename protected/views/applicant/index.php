<?php
$this->breadcrumbs=array(
	'Applicants',
);

$this->menu=array(
array('label'=>'Create Applicant','url'=>array('create')),
array('label'=>'Manage Applicant','url'=>array('admin')),
);
?>

<h1>Applicants</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
