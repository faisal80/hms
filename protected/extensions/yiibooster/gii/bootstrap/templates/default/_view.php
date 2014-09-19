<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<div class="well well-sm">
    <dl class="dl-horizontal">
	<?php
	echo "\t<dt><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</dt>\n";
	echo "\t\t<dd><?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}),array('view','id'=>\$data->{$this->tableSchema->primaryKey})); ?></dd>\n\n";
	$count = 0;
	foreach ($this->tableSchema->columns as $column) {
		if ($column->isPrimaryKey) {
			continue;
		}
		if (++$count == 7) {
			echo "\t\t<?php /*\n";
		}
		echo "\t\t<dt><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</dt>\n";
		echo "\t\t<dd><?php echo CHtml::encode(\$data->{$column->name}); ?></dd>\n\n";
	}
	if ($count >= 7) {
		echo "\t*/ ?>\n";
	}
	?>
    </dl>
</div>