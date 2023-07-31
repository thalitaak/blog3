<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\Post $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($model->titulo) ?></h1>

    <?= $model->conteudo ?>

    <br><br>

    <h3>Comentários:</h3>

    <?php
    $comentarios = $model->comentarios;

    foreach ($comentarios as $comentario) {

        echo $comentario->nome . '<br>';
        echo $comentario->data . '<br>';
        echo $comentario->comentario . '<br><br>';
    }
    ?>

<h3>Deixe seu comentário:</h3>

<?php $form = ActiveForm::begin(['action' => ['comentarios/create']]); ?>
        <?= $form->field($comentarioNovo, 'nome')->textInput(['maxlength' => true]) ?>
        <?= $form->field($comentarioNovo, 'comentario')->textarea(['rows' => 4]) ?>
        <?= $form->field($comentarioNovo, 'idpost')->hiddenInput(['value' => $model->id])->label(false) ?>
        <div class="form-group">
            <?= Html::submitButton('Enviar Comentário', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>