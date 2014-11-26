<div class="well well-sm">
    <dl class="dl-horizontal">
		<dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
		<dd><?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('allotment')); ?>:</dt>
		<dd><?php echo CHtml::encode('Plot No. ' .$data->allotment->plot_no . 
                                     ' Street No. '.$data->allotment->street_no .
                                     (empty($data->allotment->sector)?' ':' Sector '.$data->allotment->sector) . 
                                     (empty($data->allotment->phase)?' ':' Phase '.$data->allotment->phase. ' ') . 
                                     $data->allotment->category->fullCategory); ?></dd>

		<dt><?php echo CHtml::encode('Transferred From'); ?>:</dt>
		<dd><?php echo CHtml::encode(($data->transfer_id == null? 
                $data->allotment->applicant->name:
                $data->transfer_from->applicant->name)); ?></dd>

		<dt><?php echo CHtml::encode('Transferred To'); ?>:</dt>
		<dd><?php echo CHtml::encode($data->transfer_to->name); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('transfer_date')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->transfer_date); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('deed_no')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->deed_no); ?></dd>

		<?php /*
		<dt><?php echo CHtml::encode($data->getAttributeLabel('create_user')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->create_user); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->create_time); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('update_user')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->update_user); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->update_time); ?></dd>

	*/ ?>
    </dl>
</div>