<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

        <?php echo CHtml::image('/images/profilepictures/'.$data->profilephotopath, $data->firstname.' '.$data->lastname); ?>
            
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usertypeid')); ?>:</b>
	<?php echo CHtml::encode($data->usertypeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('useraddress')); ?>:</b>
	<?php echo CHtml::encode($data->useraddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userunit')); ?>:</b>
	<?php echo CHtml::encode($data->userunit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usercity')); ?>:</b>
	<?php echo CHtml::encode($data->usercity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userstate')); ?>:</b>
	<?php echo CHtml::encode($data->userstate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userzip')); ?>:</b>
	<?php echo CHtml::encode($data->userzip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cellphone')); ?>:</b>
	<?php echo CHtml::encode($data->cellphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homephone')); ?>:</b>
	<?php echo CHtml::encode($data->homephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('babysittingsince')); ?>:</b>
	<?php echo CHtml::encode($data->babysittingsince); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registrationdate')); ?>:</b>
	<?php echo CHtml::encode($data->registrationdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profilephotopath')); ?>:</b>
	<?php echo CHtml::encode($data->profilephotopath); ?>
	<br />

	*/ ?>

</div>