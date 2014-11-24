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
        'currentOwner' => array(
            'header' => 'Owner',
            'name' => 'currentAllottee.applicant.name',
        ),
        'scheme'=>array(
            'header'=>'Scheme',
            'name'=> 'scheme.name',
        ),
        'category'=>array(
            'header'=>'Category',
            'name'=> 'category.fullCategory',
        ),
        'plot_no'=>array(
            'header'=>'Plot No.',
            'name'=>'plot_no',
        ),
        'street_no'=>array(
            'header'=>'Street No.',
            'name'=>'street_no',
        ),
        'sector'=>array(
            'header'=>'Sector',
            'name'=>'sector',
        ),
        'phase'=>array(
            'header'=>'Phase',
            'name'=>'phase',
        ),
        'date'=>array(
            'header'=>'Allotment Date',
            'name'=>'date',
        ),
        'order_no'=>array(
            'header'=>'Order No.',
            'name'=>'order_no',
        ),
        'type',
        /*          'create_user',
          'create_time',
          'update_user',
          'update_time',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
//            'htmlOptions' => array('nowrap' => 'nowrap'),
            'template'=>'{transfer}',
            'buttons'=>array(
                'transfer'=>array(
                    'url'=>"Yii::app()->createUrl('/transfer/create')",
                    'label'=>false,
                    'options'=>array(
                        'class'=>'glyphicon glyphicon-export',
                        'title'=>'Transfer',
                    ),
                ),
            ),
        ),
    ),
));
?>
