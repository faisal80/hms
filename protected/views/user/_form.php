<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'fullname',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->passwordFieldGroup($model,'password_repeat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->dropDownListGroup($model,'date_format',array(
            'widgetOptions'=>array(
                'htmlOptions'=>array(
                    'class'=>'span5',
                    'maxlength'=>10
                    ),
                'data'=>array(
                    'd.m.Y'=>'dd.mm.yyyy',
                    'd/m/Y'=>'dd/mm/yyyy',
                    'd-m-Y'=>'dd-mm-yyyy',
                )
                )
            )
        ); ?>

<div class="form-actions text-center">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
