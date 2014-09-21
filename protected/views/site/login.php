<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'type'=>'horizontal',
    'htmlOptions' => array('class' => 'well col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block'), // for inset effect
)); ?>

    <legend>Login</legend>
	<fieldset>

	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>        

    <?php echo $form->checkboxGroup($model,'rememberMe'); ?>



	<div class="form-actions text-center">
		<?php $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => 'Login',
        )); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
