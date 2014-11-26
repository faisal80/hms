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
    array('label' => 'Transfer', 'url' => array('/transfer/create', 'aid'=>$callottee->id, 'tid'=>$callottee->_transfer_id)),
);
?>
<div class="text-right">
    <?php
    $firstID = $model->getFirstId();
    $prevID = $model->getPreviousId();
    $nextID = $model->getNextId();
    $lastID = $model->getLastId();

    if ($firstID !== null && $prevID !== null) {
        echo CHtml::link('First', array('allotment/view', 'id' => $firstID));
    } else {
        echo 'First';
    }

    echo ' | ';

    if ($prevID !== null) {
        echo CHtml::link('Previous', array('allotment/view', 'id' => $prevID));
    } else {
        echo 'Previous';
    }

    echo ' | ';

    if ($nextID !== null) {
        echo CHtml::link('Next', array('allotment/view', 'id' => $nextID));
    } else {
        echo 'Next';
    }

    echo ' | ';

    if ($lastID !== null && $nextID !== null) {
        echo CHtml::link('Last', array('allotment/view', 'id' => $lastID));
    } else {
        echo 'Last';
    }
    ?>
</div>

<h2>View Allotment #<?php echo $model->id; ?></h2>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'applicant.name',
        'scheme.name',
        'category.fullcategory',
        'plot_no',
        'street_no',
        'sector',
        'phase',
        'date',
        'order_no',
    ),
));
?>


<?php
$this->beginWidget('booster.widgets.TbPanel', array(
    'title' => 'Transfers Record',
    'headerIcon' => 'th-list',
    'context' => 'primary',
    'padContent' => false,
    'headerHtmlOptions' => array('class' => 'small'),
    'htmlOptions' => array('class' => 'bootstrap-widget-table'),
//    'headerButtons' => array(
//        array(
//            'class' => 'booster.widgets.TbButton',
//            'label' => 'Enter Allotment',
//            'buttonType' => 'link',
//            'url' => array('allotment/create', 'app_id' => $model->id),
//            'context' => 'success',
//            'size' => 'extra_small',
//        ),
//    ),
));

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'transfers-grid',
    'dataProvider' => $transfers,
//    'filter' => $model,
    'type' => 'striped hover condensed',
//    'hideHeader' => true,
    'template' => '{items}',
    'columns' => array(
        'id',
        'transferred_to'=>array(
            'name'=> 'transfer_to.name',
            'header'=>'Transferred to',
        ),
        'deed_no',
        'transfer_date',

//        array(
//            'class' => 'booster.widgets.TbButtonColumn',
////            'htmlOptions' => array('nowrap' => 'nowrap'),
//            'template' => '{update} {delete}',
//            'updateButtonUrl' => 'Yii::app()->createUrl("transfer/update", array("id"=>$data->id))',
//            'deleteButtonUrl' => 'Yii::app()->createUrl("transfer/delete", array("id"=>$data->id))',
//        ),
    ),
));

$this->endWidget();

?>