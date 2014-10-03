<?php
$this->breadcrumbs = array(
    'Allotments' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Allotment', 'url' => array('index')),
    array('label' => 'Manage Allotment', 'url' => array('admin')),
);
?>

<h2>Create Allotment for <?php echo $applicant->NameWithTitle; ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model, 'applicant' => $applicant)); ?>