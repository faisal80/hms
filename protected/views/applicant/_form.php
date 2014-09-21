<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'applicant-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'app_no',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
            
        <?php echo $form->typeAheadGroup($model,'title',array(
            'widgetOptions'=>array(
                'options'=>array(
                    'hint' => true,
                    'highlight' => true,
                    'minLength' => 1
                ),
                'datasets'=>array(
                    'source'=>array(
                        'Mr.',
                        'Mrs.',
                        'Ms.',
                        'Miss',
                        'Dr.',
                    ) 
                )
            )   
        )); ?>

	<?php echo $form->textFieldGroup($model,'name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'fname',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'nic',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>15)))); ?>

	<?php echo $form->datePickerGroup($model,'dob',array(
            'widgetOptions'=>array(
                'options'=>array(
                    'format'=>  Yii::app()->user->getDateFormat(true),
                    'autoclose'=> true,
                    ),
                'htmlOptions'=>array(
                    'class'=>'span5'
                    )
                ), 
            'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
            'append'=>'Click on Month/Year to select a different Month/Year.'
            )
        ); ?>

	<?php echo $form->textFieldGroup($model,'contact_1',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'contact_2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'postal_address',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'permanent_address',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->typeAheadGroup($model,'occupation_status',array(
            'widgetOptions'=>array(
                'options'=>array(
                    'hint' => true,
                    'highlight' => true,
                    'minLength' => 1
                ),
                'datasets'=>array(
                    'source'=>array(
                        'Government Service',
                        'Private Service',
                        'Business',
                        'Self Employed',
                    ) 
                )
            )
        )); ?>

	<?php echo $form->textFieldGroup($model,'employer',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'nominee',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'relationship',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'nominee_fname',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'nominee_nic',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>15)))); ?>

	

<div class="form-actions text-center">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
