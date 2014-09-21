<?php
$this->breadcrumbs = array(
    'Allotments' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Allotment', 'url' => array('index')),
    array('label' => 'Create Allotment', 'url' => array('create')),
    array('label' => 'Update Allotment', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Allotment', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Allotment', 'url' => array('admin')),
);
?>

<h1>View Allotment #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'applicant.name',
        'scheme.name',
        'category.category',
        'plot_no',
        'street_no',
        'sector',
        'phase',
        'date',
        'order_no',
    ),
));
?>
