<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
$this->breadcrumbs = array(
    'User' => array('index'),
    'Change Password',
);
?>
<h1>Change Password</h1>
<?php // if (Yii::app()->user->hasFlash('PasswdChanged')): ?>
<?php $this->widget('booster.widgets.TbAlert', array(
    'fade' => false,
    'closeText' => false, // false equals no close link
    'alerts'=>array('success'),
    
)); ?>
<?php //endif; ?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255,'value'=>'')))); ?>
<?php echo $form->passwordFieldGroup($model,'newpassword',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
<?php echo $form->passwordFieldGroup($model,'newpassword_repeat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

<div class="form-actions text-center">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=> 'Change',
		)); ?>
</div>
<?php $this->endWidget(); ?>
