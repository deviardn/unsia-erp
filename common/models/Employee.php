<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $employee_id
 * @property string|null $employee_name
 * @property string|null $position
 * @property string|null $salary
 * @property string|null $hire_date
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hire_date'], 'safe'],
            [['employee_name'], 'string', 'max' => 100],
            [['position'], 'string', 'max' => 45],
            [['salary'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'employee_name' => 'Employee Name',
            'position' => 'Position',
            'salary' => 'Salary',
            'hire_date' => 'Hire Date',
        ];
    }
}
