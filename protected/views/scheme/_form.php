<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'scheme-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->datePickerGroup($model,'draw_date',array(
            'widgetOptions'=>array(
                
                'options'=>array(
                    'format'=>'dd.mm.yyyy',
                    ),
                'htmlOptions'=>array('class'=>'span5')
                ), 
            'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
            'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php echo $form->textFieldGroup($model,'penalty',array(
            'widgetOptions'=>array(
                'htmlOptions'=>array('class'=>'span4')
                ),
//            'groupOptions'=>array(
//                'class'=>'col-xs-4 pull-left',
//                )
            )
        ); ?>

	<?php echo $form->dropDownListGroup($model,'occurence',array(
            'widgetOptions'=>array(
                'htmlOptions'=>array(
//                    'class'=>'col-xs-5',
                    'maxlength'=>10
                    ),
                'data'=>array(
                    'permonth'=>'Per Month',
                    'peryear'=>'Per Year',
                    ),
                ),
//            'groupOptions' => array(
//                'class' => 'col-xs-4',
//                ),
            ), 
            array('empty'=>'Occurence of Penalty')
        ); ?>

	<?php echo $form->textFieldGroup($model,'installment_interval',array(
            'widgetOptions'=>array(
                'htmlOptions'=>array(
                    'class'=>'span4',
                    'maxlength'=>10
                    )
                ),
//            'groupOptions'=>array(
//                'class'=>'col-xs-4 pull-right'
//                )
            )
        ); ?>

	<?php echo $form->textFieldGroup($model,'account',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'bank',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

 <div class="form-actions text-center">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript('installment',
        '$("#Scheme_installment_interval")
            .tooltip({
                "title":"In months",
                "placement":"bottom"
            })'
        );