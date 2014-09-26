<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.png">
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php 
        echo CHtml::openTag('div', array('class' => 'bs-navbar-top-example navbar navbar-inverse navbar-fixed-top'));
        $this->widget('booster.widgets.TbNavbar', array(
            'brand' => Yii::app()->name,
            'brandOptions' => array('style' => 'width:auto;margin-left: 0px; font-family: "Arial Narrow", Arial, sans-serif;'),
            'fixed' => 'top',
            'fluid' => true,
            'collapse' => true,
            'type' => 'inverse',
            'htmlOptions' => array('style' => 'position:absolute'),
            'items' => array( 
                array(
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'encodeLabel'=>false,
                    'items' => array(
                        array('label'=>'Applicants', 'url'=>array('/applicant')),
                        array('label'=>'Categories', 'url'=>array('/category')),
                        array('label'=>'Schemes', 'url'=>array('/scheme')),
                        array('label'=>'Users', 'url'=>array('/user'), 'visible'=>(Yii::app()->user->isAdmin()), 'items'=>array(
                            array('label'=>'Create', 'url'=>array('/user/create')),
                            array('label'=>'List', 'url'=>array('/user/admin')),
                            array('label'=>'Rights', 'url'=>array('/rights')),
                        )),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'<span class="glyphicon glyphicon-user"></span> '.Yii::app()->user->name, 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                            array('label'=>'Change Password', 'url'=>array('/user/changepwd')),
                            array('label'=>'Logout', 'url'=>array('/site/logout')),
                        )),
                    ),
    			),
            ),
        )); 
        echo CHtml::closeTag('div'); 
    ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?php
            $this->widget('booster.widgets.TbMenu', array(
                    'type' => 'list',
                    'htmlOptions'=>array('class'=>'nav nav-sidebar'),
                    'encodeLabel'=>false,
                    'items' => array(
                        array('label' => 'List header', 'itemOptions' => array('class' => 'nav-header')),
                        array(
                            'label' => '<span class="glyphicon glyphicon-home"></span> Home',
                            'url' => 'site',
                            'itemOptions' => array('class' => 'active')
                        ),
                        array('label' => 'Library', 'url' => '#'),
                        array('label' => 'Applications', 'url' => '#'),
                        array(
                            'label' => 'Another list header',
                            'itemOptions' => array('class' => 'nav-header')
                        ),
                        array('label' => 'Profile', 'url' => '#'),
                        array('label' => 'Settings', 'url' => '#'),
                        '',
                        array('label' => 'Help', 'url' => '#'),
                    )
                )
            );
            ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            	<?php if(isset($this->breadcrumbs)){
                    $this->widget('booster.widgets.TbBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    )); 
                 }?>
            <?php echo $content; ?>
        </div>
      </div>
    </div>
  </body>
</html>
