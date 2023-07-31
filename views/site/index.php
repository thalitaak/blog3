<?php

/** @var yii\web\View $this */
use app\models\Post;


$this->title = 'Blog';
?>
<div class="site-index">


    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">

            <?php $posts = Post::find()->all();

            foreach ($posts as $post) {

                $titulo = $post->titulo;
                $conteudo = $post->conteudo;
                $imagem = $post->imagem;
                $id = $post->id; 
                $resumo = $this->context->actionResumo($conteudo, 200); ?>
                
                <div class="col-lg-4 mb-3">
                    <div class="card card-sm d-grid" style="width: 18rem; min-height: 300px;">
                        <img src="<?=$imagem?>" class="card-img-top" alt="imagemcapa">
                        <div class="card-body flex-fill">
                            <h5 class="card-title"><?=$titulo?></h5>
                            <p class="card-text"><?=$resumo?></p>
                            <a href="index.php?r=post/leitura&id=<?=$id?>" class="btn btn-primary">Continue lendo</a>
                        </div>
                    </div>
                </div>
            <?php 
            } ?>

        </div>
    </div>
</div>
