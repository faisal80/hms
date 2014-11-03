<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'payment-type-form',
//    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
//    'clientOptions' => array(
//        'validateOnSubmit' => true,
//        'validateOnChange' => true,
//        'validateOnType' => true
//    ),
    'type' => 'horizontal',
    'focus' =>array($model,'payment_type'),
));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
// echo $form->dropDownListGroup($model,'category_id',array(
//        'widgetOptions'=>array(
//            'htmlOptions'=>array(
//                'class'=>'span5',
//                'maxlength'=>10
//                ),
//            'data'=>  Category::getCategoryOptions(),
//            )
//        )
//    ); 
?>

<?php echo $form->textFieldGroup($model, 'payment_type', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100)))); ?>

<?php echo $form->textFieldGroup($model, 'amount', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<div class="form-actions text-center">
<?php
 $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); 
        echo ' | '. CHtml::link('Cancel', Yii::app()->user->returnUrl);
?>
</div>

<?php $this->endWidget(); ?>
