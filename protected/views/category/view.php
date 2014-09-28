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
//		(Yii::app()->user->name === 'admin')?'create_user':null,
//		'create_time',
//		'update_user',
//		'update_time',
    ),
));

$this->beginWidget('booster.widgets.TbPanel', array(
    'title' => 'Payment Types',
    'headerIcon' => 'th-list',
    'padContent' => false,
    'headerHtmlOptions' => array('class' => 'small'),
    'htmlOptions' => array('class' => 'bootstrap-widget-table'),
    'headerButtons' => array(
        array(
            'class' => 'booster.widgets.TbButtonGroup',
            'context' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'extra_small',
            'buttons' => array(array(
                    'label' => 'Add Payment Type',
//                    array('label' => 'Other Actions', 'url' => '#'), // this makes it split :)
//                    'items' => $this->menu,
                    'url' => '#myModal',
                    'htmlOptions' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#myModal',
                    )
                ))
        ),
    )
));

$this->widget('booster.widgets.TbExtendedGridView', array(
    'id' => 'payment_types-grid',
    'dataProvider' => $payment_types,
//    'filter' => $model,
    'type' => 'striped',
    'template' => '{items}{extendedSummary}',
    'columns' => array(
        'id',
        'payment_type', // => array(
//            'name' => 'payment_type',
//            'footer' => 'Total Amount',
//            'htmlOptions'=>array('class'=>'text-right'),
//        ),
        'amount' => array(
//            'type' => 'number',
            'name' => 'amount',
//            'class' => 'booster.widgets.TbTotalSumColumn',
            'htmlOptions' => array('class' => 'text-right'),
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'htmlOptions' => array('nowrap' => 'nowrap'),
        ),
    ),
    'extendedSummary' => array(
//        'title' => 'Total Amount',
        'columns' => array(
            'amount' => array(
                'label' => 'Total Amount',
                'class' => 'TbSumOperation',
//                'type' => 'number',
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
<?php
$this->beginWidget('booster.widgets.TbModal', array('id' => 'myModal')
);
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Add new Payment Type</h4>
</div>

<div class="modal-body">
    <p><?php echo $this->renderPartial('/paymentType/_form', array('model'=>$payment_type)); ?></p>
</div>

<div class="modal-footer">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'primary',
        'label' => 'Save',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
