<div class="form">
<?php echo CHtml::beginForm('reminders'); ?>
 
    <div class="row">
        <?php echo CHtml::label('Reminder', 'reminder'); ?>
        <?php echo CHtml::dropDownList('reminder','', array('1st Reminder', '2nd Reminder', '3rd Reminder')) ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::label('Payment Type','payment_type'); ?>
        <?php echo CHtml::dropDownList('payment_type','0', array('1st Installment'=>'1', '2nd Installment'=>'2', '3rd Installment'=>'3')) ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->