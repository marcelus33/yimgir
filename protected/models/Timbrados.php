<?php

/**
 * Este es el modelo para la tabla"timbrados".
 *
 * The followings are the available columns in table 'timbrados':
 * @property integer $id_timbrado
 * @property integer $id_clientes
 * @property integer $numero_timbrado
 *
 * The followings are the available model relations:
 * @property Comprobantes[] $comprobantes
 * @property Clientes $idClientes
 */
class Timbrados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'timbrados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_clientes, numero_timbrado', 'required'),
			array('id_clientes, numero_timbrado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_timbrado, id_clientes, numero_timbrado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comprobantes' => array(self::HAS_MANY, 'Comprobantes', 'id_timbrado'),
			'idClientes' => array(self::BELONGS_TO, 'Clientes', 'id_clientes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_timbrado' => 'ID Timbrado',
			'id_clientes' => 'Numero Identificacion',
			'numero_timbrado' => 'Numero Timbrado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_timbrado',$this->id_timbrado);
		$criteria->compare('id_clientes',$this->id_clientes);
		$criteria->compare('numero_timbrado',$this->numero_timbrado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Timbrados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
