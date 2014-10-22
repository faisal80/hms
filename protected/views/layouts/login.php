<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.png">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <!-- Custom styles for this page -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">
            <div class="page-header text-center">
                <h1><?php echo Yii::app()->name;  ?> <br /><small>1.0</small></h1>
            </div>
            <?php echo $content; ?>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>
