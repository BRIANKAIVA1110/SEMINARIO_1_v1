<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Articulo;
use app\models\Cliente;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ClienteId')
    ->dropdownList(ArrayHelper::map(Cliente::find(), 'ClienteId', 'Nombre'),['prompt'=>'Selecciona un Articulo']);?>

    <?= $form->field($model, 'ArticuloId')
    ->dropdownList(ArrayHelper::map(Articulo::find(), 'ArticuloId', 'Descripcion'),['prompt'=>'Selecciona un Articulo']);?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Vender', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
