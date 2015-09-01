<?php
/* @var $this JobsController */
/* @var $data Jobs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scheduledstarttime')); ?>:</b>
	<?php echo CHtml::encode($data->scheduledstarttime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scheduledendtime')); ?>:</b>
	<?php echo CHtml::encode($data->scheduledendtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actualstarttime')); ?>:</b>
	<?php echo CHtml::encode($data->actualstarttime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actualendtime')); ?>:</b>
	<?php echo CHtml::encode($data->actualendtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentuserid')); ?>:</b>
	<?php echo CHtml::encode($data->parentuserid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('babysitteruserid')); ?>:</b>
	<?php echo CHtml::encode($data->babysitteruserid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('childcount')); ?>:</b>
	<?php echo CHtml::encode($data->childcount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maxchildage')); ?>:</b>
	<?php echo CHtml::encode($data->maxchildage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minchildage')); ?>:</b>
	<?php echo CHtml::encode($data->minchildage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hourlyrate')); ?>:</b>
	<?php echo CHtml::encode($data->hourlyrate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tip')); ?>:</b>
	<?php echo CHtml::encode($data->tip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditcardfee')); ?>:</b>
	<?php echo CHtml::encode($data->creditcardfee); ?>
	<br />

	*/ ?>

</div>