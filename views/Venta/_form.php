<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Articulo;
use app\models\Cliente;
use yii\helpers\ArrayHelper;
use app\models\Precio;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ClienteId')
    ->dropdownList(ArrayHelper::map(Cliente::find()
    ->all(), 'ClienteId',function($model) {
        return $model['Nombre'].'-'.$model['Apellido'];
    }),['prompt'=>'Selecciona un Cliente']);?>

    <?= $form->field($model, 'ArticuloId')
    ->dropdownList(ArrayHelper::map(Articulo::find()
    ->leftJoin('precio','articulo.articuloId = precio.articuloId')
    ->where('precio.Precio is not null')
    ->all(), 'ArticuloId', 'Descripcion'),['onChange'=>'CalcularPrecioTotal()','prompt'=>'Selecciona un Articulo']);?>

    <?= $form->field($model, 'Cantidad')->textInput(['onChange'=>'CalcularPrecioTotal()']) ?>

    <?= $form->field($model, 'Precio')->textInput(['placeholder' => 'Precio Articulo','disabled' => 'disabled']) ?>

    <?= $form->field($model, 'Total')->textInput(['placeholder' => 'Total Final','disabled' => 'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton('Vender', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<script>    
    function CalcularPrecioTotal()
    {
        var selectedArt = document.getElementById("venta-articuloid");
        var articuloId = selectedArt.options[selectedArt.selectedIndex].value;
        if(articuloId!=0 || articuloId!=undefined)
            var cantidad = document.getElementById("venta-cantidad").value;
            document.getElementById("venta-total").value= cantidad*50;

    }
</script>
