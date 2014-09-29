<div class="well well-sm">
    <dl class="dl-horizontal">
		<dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
		<dd><?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->user->username); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('scheme_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->scheme->name); ?></dd>

    </dl>
</div>