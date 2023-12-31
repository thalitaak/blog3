<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Post $model */

$this->registerCss('.comentsection {
    background-color: #e6e6e6;
    padding: 20px;
    border-radius: 10px;
}');

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($model->titulo) ?></h1>
    <div style="text-align:center"><img style="margin: 20px;height: 300px; width: 60%; object-fit: cover;" src="<?= $model->imagem?>"></img></div>

    <?= $model->conteudo ?>

    <br><br>

    <div class="comentsection">
        <h3>Comentários:</h3>

            <?php
            $comentarios = $model->comentarios;

            foreach ($comentarios as $comentario) {

                echo '<b>' . $comentario->nome .'</b>' . '<br>';
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
</div>