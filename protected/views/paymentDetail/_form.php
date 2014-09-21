<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'payment-detail-form',
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

<?php echo $form->datePickerGroup($model, 'date', array(
    'widgetOptions' => array(
        'options' => array(
            'format'=>  Yii::app()->user->getDateFormat(true),
            'autoclose'=>true,
        ), 
        'htmlOptions' => array('class' => 'span5')
        ), 
    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 
    'append' => 'Click on Month/Year to select a different Month/Year.'
    )
); ?>

<?php echo $form->dropDownListGroup($model, 'payment_type_id', array(
    'widgetOptions' => array(
        'htmlOptions' => array(
            'class' => 'span5', 
            'maxlength' => 10
            ),
        'data' => PaymentType::getPaymentTypes(),
        )
    )
); ?>

<?php echo $form->textFieldGroup($model, 'remarks', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php echo $form->textFieldGroup($model, 'amount', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->dropDownListGroup($model, 'allotment_id', array(
    'widgetOptions' => array(
        'htmlOptions' => array(
            'class' => 'span5', 
            'maxlength' => 10
            ),
        'data' => Allotment::getAllotmentOptions(),
        )
    )
); ?>

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
