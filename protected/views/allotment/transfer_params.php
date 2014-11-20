<div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-lg-offset-2">
<?php echo CHtml::beginForm('findAllotment', 'post', array(
    'class'=>'form-horizontal', 
    'role'=>'form'
)); ?>
 
    <legend>Please Select Options</legend>
        
    <div class="form-group">
        <?php echo CHtml::label('Plot No.', 'plot_no', array('class'=>'control-label col-sm-3 col-md-3 col-lg-3')); ?>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <?php echo CHtml::textField('plot_no','', array('class'=>'form-control')); ?>
        </div>
    </div>
 
    <div class="form-group">
        <?php echo CHtml::label('Street No.','street_no', array('class'=>'control-label col-sm-3 col-md-3 col-lg-3')); ?>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <?php echo CHtml::textField('street_no', '', array('class'=>'form-control')) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?php echo CHtml::label('Sector','sector', array('class'=>'control-label col-sm-3 col-md-3 col-lg-3')); ?>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <?php echo CHtml::textField('sector','', array('class'=>'form-control')) ?>
        </div>
    </div>
    
     <div class="form-group">
        <?php echo CHtml::label('Phase','phase', array('class'=>'control-label col-sm-3 col-md-3 col-lg-3')); ?>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <?php echo CHtml::textField('phase','', array('class'=>'form-control')) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-4">
        <?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
        </div>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->