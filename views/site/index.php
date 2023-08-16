<?php

/** @var yii\web\View $this */
use app\models\Post;


$this->title = 'Blog';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4" style="font-style: bold;">Aqui é o nome do blog</h1>

        <p class="lead">Uma descrição sobre o blog.</p>
    </div>

    <div class="body-content">

        <!-- <div id="carouselExampleAutoplaying" class="carousel slide h-auto" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img style="width: 100%; height: 400px; object-fit: cover;" src="img/img1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img style="width: 100%;height: 400px; object-fit: cover;" src="img/img2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img style="width: 100%; height: 400px; object-fit: cover;" src="img/img3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div> -->

        <div class="row" style="margin-top: 20px; padding-left: 10px; padding-right: 10px;">

            <?php $posts = Post::find()->all();

            foreach ($posts as $post) {

                $titulo = $post->titulo;
                $conteudo = $post->conteudo;
                $imagem = $post->imagem;
                $id = $post->id; 
                $resumo = $this->context->actionResumo($conteudo, 200); ?>
                
                <div class="col-lg-4 mb-3">
                    <div class="card card-sm d-grid" style="width: 20rem; min-height: 300px;">
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
