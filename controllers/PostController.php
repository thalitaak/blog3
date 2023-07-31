<?php

namespace app\controllers;

use app\models\Post;

use app\models\comentarios;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);



        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionLeitura($id)
    {

        $model = $this->findModel($id);

        $comentarioNovo = new comentarios();

        return $this->render('leitura', [
            'model' => $model, 'comentarioNovo' => $comentarioNovo
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);

        $comentarioNovo = new comentarios();

        return $this->render('view', [
            'model' => $model, 'comentarioNovo' => $comentarioNovo
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUploadImage () 
    {
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se um arquivo de imagem foi enviado
            if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
                // Define o diretório de destino para salvar a imagem
                $diretorioDestino = "uploads/";

                // Gera um nome único para o arquivo de imagem
                $nomeArquivo = uniqid() . "_" . $_FILES["imagem"]["name"];

                // Move o arquivo temporário para o diretório de destino
                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorioDestino . $nomeArquivo)) {
                    // O arquivo de imagem foi enviado com sucesso

                    // Agora você pode salvar o caminho da imagem no banco de dados ou fazer qualquer outra manipulação necessária
                    
                    // Exemplo de como salvar o caminho da imagem em uma variável
                    $camImagem = $diretorioDestino . $nomeArquivo;
                    $sql = "INSERT INTO post(titulo, imagem, iduser, conteudo) VALUES ('$titulo', '$camImagem', '$iduser', '$conteudo');";
                    $resultado = $conn->query($sql);
                    // Agora você pode usar a variável $caminhoImagem para fazer o que precisa no banco de dados
                } else {
                    // Ocorreu um erro ao mover o arquivo
                    echo "Erro ao enviar a imagem.";
                }
            }
        }
    }

}
