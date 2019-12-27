<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\SearchPlotAndSession */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plot And Sessions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plot-and-session-index">

    <p>
        <?= Html::a('Create Plot And Session', ['plot-and-session/create', 'IdGames' => $searchModel->IdGames], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'IdGames',
            'plot',
            'session',
            'createdAt',
            //'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
