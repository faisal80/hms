<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main');

echo '<div class="clearfix"> </div>';
$this->widget('booster.widgets.TbPanel', array(
        'title' => substr($this->pageTitle, strpos($this->pageTitle, '-')+1),
        'headerIcon' => 'home',
//        'context' => 'info',
        'headerButtons' => array(
            array(
                'class' => 'booster.widgets.TbButtonGroup',
                'context' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'extra_small',
                'buttons' => array( array(
                    'label' => 'Actions',
//                    array('label' => 'Other Actions', 'url' => '#'), // this makes it split :)
                    'items' => $this->menu,
                ))
            ),
        ),
        'content'=>$content,
    )
);

$this->endContent(); ?>