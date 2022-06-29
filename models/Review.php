<?php
namespace fgh151\review\models;

use yii\db\ActiveRecord;

/**
 * Class Review
 * @package fgh151\review\models
 * @property integer $user_id
 * @property integer $item_id
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
            [['user_id', 'item_id', 'vote'], 'integer'],
            [['item_id', 'name', 'entity'], 'required'],
            [['message'], 'string'],
            [['active'], 'default', 'value' => false],
            [['active'], 'boolean'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'name' => 'Имя',
            'message' => 'Текст',
            'date' => 'Дата',
            'active' => 'Активность',
            'item_id' => 'Продукт',
            'vote' => 'Оценка',
            'entity' => 'entity'
        ];
    }
}