<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nueva Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'VentaId',
            [
                'attribute' => 'clienteDescripcion',//solo es una key
                'label'=> 'Cliente',
                'value' => 'cliente.nombre',//valor de modelo
                
            ],
            [
                'attribute' => 'articuloDescripcion',//solo es una key
                'label'=> 'Articulo',
                'value' => 'articulo.Descripcion',//valor de modelo 
            ],
            'Cantidad',
            'Total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
