<?php
use Yii;
use yii\web\Controller;
use app\models\Usuarios;

class LoginController extends Controller
{
public function actionLogin()
    {
        $model = new Usuarios();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                // Autenticar o usuário e redirecionar para a página inicial ou para a página desejada após o login
            }
        }

        return $this->render('login', ['model' => $model]);
    }
}