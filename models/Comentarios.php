<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property int|null $idpost
 * @property string|null $nome
 * @property string|null $email
 * @property string|null $comentario
 * @property string $data
 *
 * @property Post $idpost0
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpost'], 'integer'],
            [['comentario'], 'string'],
            [['data'], 'safe'],
            [['nome'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 100],
            [['idpost'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['idpost' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idpost' => 'Idpost',
            'nome' => 'Nome',
            'email' => 'Email',
            'comentario' => 'Comentario',
            'data' => 'Data',
        ];
    }

    /**
     * Gets query for [[Idpost0]].
     *
     * @return \yii\db\ActiveQuery|PostQuery
     */
    public function getIdpost0()
    {
        return $this->hasOne(Post::class, ['id' => 'idpost']);
    }

    /**
     * {@inheritdoc}
     * @return ComentariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComentariosQuery(get_called_class());
    }
}
