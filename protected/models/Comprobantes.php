<?php

/**
 * Este es el modelo para la tabla"comprobantes".
 *
 * The followings are the available columns in table 'comprobantes':
 * @property integer $id_comprobantes
 * @property integer $id_clientes
 * @property integer $id_tipos_comprobantes
 * @property integer $id_tipo_registro
 * @property integer $id_timbrado
 * @property integer $id_misiones_diplomaticas
 * @property string $fecha_expedicion
 * @property string $numero_comprobante
 * @property integer $importe_iva_5
 * @property integer $importe_iva_10
 * @property integer $importe_exenta
 * @property integer $total_importe
 * @property string $ircp
 * @property string $iva_general
 * @property string $iva_simplificado
 *
 * The followings are the available model relations:
 * @property Clientes $idClientes
 * @property MisionesDiplomaticas $idMisionesDiplomaticas
 * @property Timbrados $idTimbrado
 * @property TiposRegistros $idTipoRegistro
 * @property TiposComprobantes $idTiposComprobantes
 */
class Comprobantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comprobantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_comprobantes, id_clientes, id_tipos_comprobantes, id_tipo_registro, id_timbrado, fecha_expedicion, numero_comprobante, total_importe, iva_simplificado', 'required'),
			array('id_comprobantes, id_clientes, id_tipos_comprobantes, id_tipo_registro, id_timbrado, id_misiones_diplomaticas, importe_iva_5, importe_iva_10, importe_exenta, total_importe', 'numerical', 'integerOnly'=>true),
			array('numero_comprobante', 'length', 'max'=>20),
			array('ircp, iva_general, iva_simplificado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_comprobantes, id_clientes, id_tipos_comprobantes, id_tipo_registro, id_timbrado, id_misiones_diplomaticas, fecha_expedicion, numero_comprobante, importe_iva_5, importe_iva_10, importe_exenta, total_importe, ircp, iva_general, iva_simplificado', 'safe', 'on'=>'search'),
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
			'idClientes' => array(self::BELONGS_TO, 'Clientes', 'id_clientes'),
			'idMisionesDiplomaticas' => array(self::BELONGS_TO, 'MisionesDiplomaticas', 'id_misiones_diplomaticas'),
			'idTimbrado' => array(self::BELONGS_TO, 'Timbrados', 'id_timbrado'),
			'idTipoRegistro' => array(self::BELONGS_TO, 'TiposRegistros', 'id_tipo_registro'),
			'idTiposComprobantes' => array(self::BELONGS_TO, 'TiposComprobantes', 'id_tipos_comprobantes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_comprobantes' => 'Id Comprobantes',
			'id_clientes' => 'Cliente',
			'id_tipos_comprobantes' => 'Tipo de Comprobante',
			'id_tipo_registro' => 'Tipo de Registro',
			'id_timbrado' => 'Timbrado',
			'id_misiones_diplomaticas' => 'Misiones Diplomaticas',
			'fecha_expedicion' => 'Fecha Expedicion',
			'numero_comprobante' => 'Numero Comprobante',
			'importe_iva_5' => 'Importe Iva 5',
			'importe_iva_10' => 'Importe Iva 10',
			'importe_exenta' => 'Importe Exenta',
			'total_importe' => 'Total Importe',
			'ircp' => 'Ircp',
			'iva_general' => 'Iva General',
			'iva_simplificado' => 'Iva Simplificado',
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

		$criteria->compare('id_comprobantes',$this->id_comprobantes);
		$criteria->compare('id_clientes',$this->id_clientes);
		$criteria->compare('id_tipos_comprobantes',$this->id_tipos_comprobantes);
		$criteria->compare('id_tipo_registro',$this->id_tipo_registro);
		$criteria->compare('id_timbrado',$this->id_timbrado);
		$criteria->compare('id_misiones_diplomaticas',$this->id_misiones_diplomaticas);
		$criteria->compare('fecha_expedicion',$this->fecha_expedicion,true);
		$criteria->compare('numero_comprobante',$this->numero_comprobante,true);
		$criteria->compare('importe_iva_5',$this->importe_iva_5);
		$criteria->compare('importe_iva_10',$this->importe_iva_10);
		$criteria->compare('importe_exenta',$this->importe_exenta);
		$criteria->compare('total_importe',$this->total_importe);
		$criteria->compare('ircp',$this->ircp,true);
		$criteria->compare('iva_general',$this->iva_general,true);
		$criteria->compare('iva_simplificado',$this->iva_simplificado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comprobantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
