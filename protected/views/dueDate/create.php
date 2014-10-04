<?php
$this->breadcrumbs = array(
    'Due Dates' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List DueDate', 'url' => array('index')),
    array('label' => 'Manage DueDate', 'url' => array('admin')),
);
?>

<h2>Enter Due Date for <?php echo $applicant->NameWithTitle; ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model, 'paymentTypesOption'=>$paymentTypesOption)); ?>