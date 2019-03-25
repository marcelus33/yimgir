<?php

/**
 * Este es el modelo para la tabla"clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id_clientes
 * @property integer $id_documentos_identificacion
 * @property string $numero_identificacion
 * @property integer $dv
 * @property string $nombre_razon_social
 * @property string $direccion
 * @property string $telefono
 *
 * The followings are the available model relations:
 * @property Comprobantes[] $comprobantes
 * @property DocumentosIdentificacion $idDocumentosIdentificacion
 * @property Timbrados[] $timbradoses
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_documentos_identificacion, numero_identificacion, dv, nombre_razon_social', 'required'),
			array('id_documentos_identificacion, dv', 'numerical', 'integerOnly'=>true),
			array('numero_identificacion', 'length', 'max'=>30),
			array('nombre_razon_social', 'length', 'max'=>250),
			array('direccion', 'length', 'max'=>100),
			array('telefono', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_clientes, id_documentos_identificacion, numero_identificacion, dv, nombre_razon_social, direccion, telefono', 'safe', 'on'=>'search'),
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
			'comprobantes' => array(self::HAS_MANY, 'Comprobantes', 'id_clientes'),
			'idDocumentosIdentificacion' => array(self::BELONGS_TO, 'DocumentosIdentificacion', 'id_documentos_identificacion'),
			'timbradoses' => array(self::HAS_MANY, 'Timbrados', 'id_clientes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_clientes' => 'ID Cliente',
			'id_documentos_identificacion' => 'Documento de Identificacion Tipo',
			'numero_identificacion' => 'Numero Identificacion',
			'dv' => 'DV',
			'nombre_razon_social' => 'Nombre o Razon Social',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
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

		$criteria->compare('id_clientes',$this->id_clientes);
		$criteria->compare('id_documentos_identificacion',$this->id_documentos_identificacion);
		$criteria->compare('numero_identificacion',$this->numero_identificacion,true);
		$criteria->compare('dv',$this->dv);
		$criteria->compare('nombre_razon_social',$this->nombre_razon_social,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
