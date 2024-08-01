<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "finance".
 *
 * @property int $transaction_id
 * @property string|null $transaction_date
 * @property string|null $transaction_type
 * @property float|null $amount
 * @property string|null $description
 */
class Finance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_date'], 'safe'],
            [['amount'], 'number'],
            [['transaction_type'], 'string', 'max' => 1],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => 'Transaction ID',
            'transaction_date' => 'Transaction Date',
            'transaction_type' => 'Transaction Type',
            'amount' => 'Amount',
            'description' => 'Employee',
        ];
    }
}
