<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Domicilio')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'FechaNacimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione Fecha Nacimiento ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
		    'todayHighlight' => false
        ]
    ]);?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
