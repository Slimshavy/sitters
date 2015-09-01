<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model, 'password_repeat'); ?>
            <?php echo $form->passwordField($model, 'password_repeat', array('size'=>60,'maxlength'=>128));?>
            <?php echo $form->error($model, 'password_repeat'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usertypeid'); ?>
		<?php echo $form->textField($model,'usertypeid'); ?>
		<?php echo $form->error($model,'usertypeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'useraddress'); ?>
		<?php echo $form->textField($model,'useraddress',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'useraddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userunit'); ?>
		<?php echo $form->textField($model,'userunit',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'userunit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usercity'); ?>
		<?php echo $form->textField($model,'usercity',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'usercity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userstate'); ?>
		<?php echo $form->textField($model,'userstate',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'userstate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userzip'); ?>
		<?php echo $form->textField($model,'userzip',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'userzip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cellphone'); ?>
		<?php echo $form->textField($model,'cellphone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cellphone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'homephone'); ?>
		<?php echo $form->textField($model,'homephone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'homephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'babysittingsince'); ?>
		<?php echo $form->textField($model,'babysittingsince'); ?>
		<?php echo $form->error($model,'babysittingsince'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registrationdate'); ?>
		<?php echo $form->textField($model,'registrationdate'); ?>
		<?php echo $form->error($model,'registrationdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profilephotopath'); ?>
		<?php echo $form->textField($model,'profilephotopath',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'profilephotopath'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->