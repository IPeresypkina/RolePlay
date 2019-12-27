<?php

use app\modules\admin\models\search\SearchPlotAndSession;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Game */

$this->title = 'Update Game: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';

$searchModel = new SearchPlotAndSession();
$searchModel->IdGames = $model->Id;
$dataProvider = $searchModel->search([]);

?>
<div class="game-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render($model->alias, [
        'model' => $model,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider
    ]) ?>

</div>
