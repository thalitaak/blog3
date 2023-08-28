<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'action' => ['blog/search'], // Defina a ação do formulário para o método de busca apropriado no controlador
    'method' => 'get',
]); ?>

<?= $form->field($searchModel, 'searchQuery')->textInput(['placeholder' => 'Digite sua pesquisa...'])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>