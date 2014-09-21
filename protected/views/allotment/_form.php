<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'allotment-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListGroup($model, 'applicant_id', array(
    'widgetOptions' => array(
        'htmlOptions' => array(
            'class' => 'span5', 
            'maxlength' => 10
            ),
        'data'=>  Applicant::getApplicantOptions(),
        )
    )
); ?>

<?php echo $form->dropDownListGroup($model, 'scheme_id', array(
    'widgetOptions' => array(
        'htmlOptions' => array(
            'class' => 'span5', 
            'maxlength' => 10
            ),
        'data' => Scheme::getSchemeOptions(), 
        )
    )
); ?>

<?php echo $form->dropDownListGroup($model, 'category_id', array(
    'widgetOptions' => array(
        'htmlOptions' => array(
            'class' => 'span5', 
            'maxlength' => 10
            ),
        'data' => Category::getCategoryOptions(),
        )
    )
); ?>

<?php echo $form->textFieldGroup($model, 'plot_no', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->textFieldGroup($model, 'street_no', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->textFieldGroup($model, 'sector', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->textFieldGroup($model, 'phase', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->datePickerGroup($model, 'date', array(
    'widgetOptions' => array(
        'options' => array(
            'format'=>  Yii::app()->user->getDateFormat(true),
            'autoclose'=> true,
        ), 
        'htmlOptions' => array(
            'class' => 'span5'
            )
        ), 
    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 
    'append' => 'Click on Month/Year to select a different Month/Year.'
    )
); ?>

<?php echo $form->textFieldGroup($model, 'order_no', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<div class="form-actions text-center">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
