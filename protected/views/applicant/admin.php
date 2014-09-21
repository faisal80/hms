<?php
$this->breadcrumbs = array(
    'Applicants' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Applicant', 'url' => array('index')),
    array('label' => 'Create Applicant', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('applicant-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Applicants</h1>

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
    'id' => 'applicant-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type' => 'striped hover condensed',
    'columns' => array(
        'id',
        'app_no',
        'title',
        'name',
        'fname',
        'nic',
//        'dob',
//        'contact_1',
//        'contact_2',
//        'postal_address',
//        'permanent_address',
//        'occupation_status',
//        'employer',
//        'nominee',
//        'relationship',
//        'nominee_fname',
//        'nominee_nic',
        /*        'create_user',
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
