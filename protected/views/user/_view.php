<div class="well well-sm">
    <dl class="dl-horizontal">
        <dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
        <dd><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></dd>
        
        <dt><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->fullname); ?></dd>
        
        <dt><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->username); ?></dd>
        
        <dt><?php echo CHtml::encode($data->getAttributeLabel('date_format')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->date_format); ?></dd>
    </dl>
</div>