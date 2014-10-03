<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
    array('label' => 'Update Category', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Category', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Category', 'url' => array('admin')),
);
?>
<div class="text-right">
    <?php
    $firstID = $model->getFirstId();
    $prevID = $model->getPreviousId();
    $nextID = $model->getNextId();
    $lastID = $model->getLastId();

    if ($firstID !== null && $prevID !== null) {
        echo CHtml::link('First', array('category/view', 'id' => $firstID));
    } else {
        echo 'First';
    }

    echo ' | ';

    if ($prevID !== null) {
        echo CHtml::link('Previous', array('category/view', 'id' => $prevID));
    } else {
        echo 'Previous';
    }

    echo ' | ';

    if ($nextID !== null) {
        echo CHtml::link('Next', array('category/view', 'id' => $nextID));
    } else {
        echo 'Next';
    }

    echo ' | ';

    if ($lastID !== null && $nextID !== null) {
        echo CHtml::link('Last', array('category/view', 'id' => $lastID));
    } else {
        echo 'Last';
    }
    ?>
</div>
<h2>View Category #<?php echo $model->id; ?></h2>


<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'category',
        'plot_size',
        'corner' => array(
            'type' => 'boolean',
            'name' => 'corner',
        ),
        'scheme.name',
    ),
));

$this->beginWidget('booster.widgets.TbPanel', array(
    'title' => 'Payment Types',
    'headerIcon' => 'th-list',
    'padContent' => false,
//    'headerHtmlOptions' => array('class' => 'small'),
    'htmlOptions' => array('class' => 'bootstrap-widget-table'),
    'headerButtons' => array(
        array(
            'class' => 'booster.widgets.TbButton',
            'label' => 'Add Payment Type',
            'buttonType'=>'link',
            'url' => array('paymentType/create', 'cat_id' => $model->id),
            'context' => 'primary',
            'size' => 'extra_small',
        ),
    ),
));

$this->widget('booster.widgets.TbExtendedGridView', array(
    'id' => 'payment_types-grid',
    'dataProvider' => $payment_types,
//    'filter' => $model,
    'type' => 'striped',
    'template' => '{items}{extendedSummary}',
    'columns' => array(
        'id',
        'payment_type',
        'amount' => array(
            'headerHtmlOptions' => array('class' => 'text-right'),
            'name' => 'amount',
            'htmlOptions' => array('class' => 'text-right'),
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'template' => '{update} {delete}',
//            'viewButtonUrl'  =>'Yii::app()->createUrl("paymentType/view", array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("paymentType/update", array("id"=>$data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("paymentType/delete", array("id"=>$data->id))',
        ),
    ),
    'extendedSummary' => array(
        'columns' => array(
            'amount' => array(
                'label' => 'Total Amount',
                'class' => 'TbSumOperation',
            )
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right text-center',
        'style' => 'width:300px'
    ),
));

$this->endWidget();
?>