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
//    'type'=>'horizontal',
    'focus'=>array($model, 'username'),
    'htmlOptions' => array('class' => 'form-login'),
)); ?>

    <legend>Login</legend>
	<fieldset>

	<?php echo $form->textFieldGroup($model,'username',array(
        'label'=>false,
        'widgetOptions'=>array(
            'htmlOptions'=>array(
//                'class'=>'span5',
                'maxlength'=>10
                )
            )
        )
    ); ?>

	<?php echo $form->passwordFieldGroup($model,'password',array('label'=>false, 'widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>        




	<div class="form-actions text-center">
		<?php $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'size' => 'large',
            'label' => 'Login',
            'htmlOptions'=>array(
                'class'=>'btn-block',
            ),
        )); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
