<?php
$this->breadcrumbs = array(
    'Allotments' => array('index'),
    'Find',
);

?>

<h2>Allotments found</h2>


<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'allotments-grid',
    'dataProvider' => $allotments,
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
