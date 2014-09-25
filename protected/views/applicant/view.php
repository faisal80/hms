<?php
$this->breadcrumbs = array(
    'Applicants' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Applicant', 'url' => array('index')),
    array('label' => 'Create Applicant', 'url' => array('create')),
    array('label' => 'Update Applicant', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Applicant', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Applicant', 'url' => array('admin')),
);
?>

<h1>View Applicant #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'app_no',
//		'title',
        'name' => array(
            'name' => 'name',
            'value' => $model->NameWithTitle,
        ),
        'fname',
        'nic',
        'dob',
        'contact_1',
        'contact_2',
        'postal_address',
        'permanent_address',
        'occupation_status',
        'employer',
        'nominee',
        'relationship',
        'nominee_fname',
        'nominee_nic',
//		'create_user',
//		'create_time',
//		'update_user',
//		'update_time',
    ),
));

$this->beginWidget('booster.widgets.TbPanel', array(
    'title' => 'Allotments',
    'headerIcon' => 'th-list',
    'padContent' => false,
    'htmlOptions' => array('class' => 'bootstrap-widget-table')
    )
);

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'allotments-grid',
    'dataProvider' => $allotments,
//    'filter' => $model,
    'type' => 'striped hover condensed',
//    'hideHeader' => true,
    'template'=>'{items}',
    'columns' => array(
        'id',
        'plot_no',
        'street_no',
        'sector',
        'phase',
        'date',
        'order_no',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
//            'htmlOptions' => array('nowrap' => 'nowrap'),
            'template' => '{view}',
            'viewButtonUrl' => 'Yii::app()->createUrl("allotment/view", array("id"=>$data->id))',
        ),
    ),
));

$this->endWidget();
?>
