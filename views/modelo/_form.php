<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modelo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modelo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
