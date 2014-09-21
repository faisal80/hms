<?php
$this->breadcrumbs = array(
    'Payment Details' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List PaymentDetail', 'url' => array('index')),
    array('label' => 'Create PaymentDetail', 'url' => array('create')),
    array('label' => 'Update PaymentDetail', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete PaymentDetail', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage PaymentDetail', 'url' => array('admin')),
);
?>

<h1>View PaymentDetail #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'applicant.name',
        'date',
        'payment_type.payment_type',
        'remarks',
        'amount'=>array(
            'type'=>'number',
            'name'=>'amount',
//            'value' =>'number_format($data->amount)',
        ),
        'allotment'=>array(
            'allotment_id',
//            'type'=>'raw',
            'label'=>'Allotment',
            'value'=>$model->allotment->category->plot_size . ' ('. $model->allotment->category->category. ')',
        ),
    ),
));
?>
