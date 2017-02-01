<?php
namespace fgh151\review\models;

use yii\db\ActiveRecord;

/**
 * Class Review
 * @package fgh151\review\models
 * @property integer $userId
 * @property integer $itemId
 * @property integer $vote
 * @property string $name
 * @property string $active
 * @property string $message
 * @property string date
 * @property string $entity
 */

class Review extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%review}}';
    }

    public function rules()
    {
        return [
            [['userId', 'itemId', 'vote'], 'integer'],
            [['itemId', 'name', 'entity'], 'required'],
            [['message', 'active'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'Пользователь',
            'name' => 'Имя',
            'message' => 'Текст',
            'date' => 'Дата',
            'active' => 'Активность',
            'itemId' => 'Продукт',
            'vote' => 'Оценка',
            'entity' => 'entity'
        ];
    }
}