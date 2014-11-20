<div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-lg-offset-2">
<?php echo CHtml::beginForm('reminders', 'post', array(
    'class'=>'form-horizontal', 
    'role'=>'form'
)); ?>
 
    <legend>Please Select Options</legend>
        
    <div class="form-group">
        <?php echo CHtml::label('Reminder', 'reminder', array('class'=>'control-label col-sm-3 col-md-3 col-lg-3')); ?>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <?php echo CHtml::dropDownList('reminder','', array(
            '1st Reminder'=>'1st Reminder', 
            '2nd Reminder'=>'2nd Reminder', 
            '3rd Reminder'=>'3rd Reminder',
            '4th Reminder'=>'4th Reminder',
            '5th Reminder'=>'5th Reminder',
            '6th Reminder'=>'6th Reminder',
            '7th Reminder'=>'7th Reminder',
            '8th Reminder'=>'8th Reminder',
            '9th Reminder'=>'9th Reminder',
            '10th Reminder'=>'10th Reminder',
        ), array('class'=>'form-control')); ?>
        </div>
    </div>
 
    <div class="form-group">
        <?php echo CHtml::label('Payment Type','payment_type', array('class'=>'control-label col-sm-3 col-md-3 col-lg-3')); ?>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <?php echo CHtml::dropDownList('payment_type','0', PaymentType::getPaymentTypesByText(), array('class'=>'form-control')) ?>
        </div>
    </div>
 
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-4">
        <?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
        </div>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->