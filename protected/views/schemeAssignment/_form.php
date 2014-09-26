<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'scheme-assignment-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListGroup($model,'user_id',array(
        'widgetOptions'=>array(
            'htmlOptions'=>array('class'=>'span5'),
            'data'=>User::getUserOptions(),
            )
        )); ?>

	<?php echo $form->dropDownListGroup($model,'scheme_id',array(
        'widgetOptions'=>array(
            'htmlOptions'=>array('class'=>'span5'),
            'data' => Scheme::getSchemeOptions(),
            )
        )); ?>

<div class="form-actions text-center">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
