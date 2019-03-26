<?php

/**
 * Este es el modelo para la tabla"tipos_comprobantes".
 *
 * The followings are the available columns in table 'tipos_comprobantes':
 * @property integer $id_tipos_comprobantes
 * @property integer $id_tipos_registros_tc
 * @property string $tipo_comprobante
 *
 * The followings are the available model relations:
 * @property Comprobantes[] $comprobantes
 * @property TiposRegistrosTc $idTiposRegistrosTc
 */
class TiposComprobantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipos_comprobantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipos_registros_tc, tipo_comprobante', 'required'),
			array('id_tipos_registros_tc', 'numerical', 'integerOnly'=>true),
			array('tipo_comprobante', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipos_comprobantes, id_tipos_registros_tc, tipo_comprobante', 'safe', 'on'=>'search'),
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
			'comprobantes' => array(self::HAS_MANY, 'Comprobantes', 'id_tipos_comprobantes'),
			'idTiposRegistrosTc' => array(self::BELONGS_TO, 'TiposRegistrosTc', 'id_tipos_registros_tc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipos_comprobantes' => 'ID Tipo de Comprobante',
			'id_tipos_registros_tc' => 'Tipos de Registro',
			'tipo_comprobante' => 'Tipo de Comprobante',
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

		$criteria->compare('id_tipos_comprobantes',$this->id_tipos_comprobantes);
		$criteria->compare('id_tipos_registros_tc',$this->id_tipos_registros_tc);
		$criteria->compare('tipo_comprobante',$this->tipo_comprobante,true);

		$criteria->with=array('idTiposRegistrosTc');
		$criteria->addSearchCondition('idTiposRegistrosTc.tipo_registro_tc',$this->id_tipos_registros_tc);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TiposComprobantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
