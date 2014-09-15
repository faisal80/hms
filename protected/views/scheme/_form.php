<?php
/* @var $this SchemeController */
/* @var $model Scheme */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'scheme-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'draw_date',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'penalty',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'occurence',array('span'=>5,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'installment_interval',array('span'=>5,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'account',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'bank',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'create_user',array('span'=>5,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'create_time',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'update_user',array('span'=>5,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'update_time',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->