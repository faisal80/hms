<?php
/* @var $this SchemeController */
/* @var $model Scheme */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>10)); ?>

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
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->