<?php
$this->breadcrumbs = array(
    'Allotments' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Allotment', 'url' => array('index')),
    array('label' => 'Create Allotment', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('allotment-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Allotments</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'allotment-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type' => 'striped',
    'columns' => array(
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
        /*          'create_user',
          'create_time',
          'update_user',
          'update_time',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'htmlOptions' => array('nowrap' => 'nowrap'),
        ),
    ),
));
?>
