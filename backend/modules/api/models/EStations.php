<?php

namespace backend\modules\api\models;


use \yii\db\ActiveRecord;

/**
 * This is the model class for table "e_stations".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $city
 * @property string|null $address
 * @property int|null $status_open
 */
class EStations extends ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

     /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_stations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['status_open'], 'integer'],
            [['name', 'city', 'address'], 'string', 'max' => 255],
            [['name', 'city', 'address', 'status_open'], 'required'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['name', 'city', 'address', 'status_open'];
        $scenarios['update'] = ['id','name', 'city', 'address', 'status_open'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'city' => 'City',
            'address' => 'Address',
            'status_open' => 'Status Open',
        ];
    }


}
