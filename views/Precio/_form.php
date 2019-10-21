<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Precio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="precio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ArticuloId')->textInput() ?>

    <?= $form->field($model, 'Precio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
