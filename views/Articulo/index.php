<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Articulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ArticuloId',
            // 'ModeloId',
            [
                'attribute' => 'ModeloDescripcion',//solo es una key
                'label'=> 'Modelo',
                'value' => 'modelo.Descripcion',//valor de modelo
                
            ],
            // 'ColorId',
            [
                'attribute' => 'ColorDescripcion',//solo es una key
                'label'=>'Color',
                'value' => 'color.Descripcion'//valor de modelo
            ],
            'Descripcion',
            'CodigoBarras',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
