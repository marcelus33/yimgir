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
 * @property string $mac_add
 * @property string $iva_simplificado
 * @property integer $cruge_user_id
 *
 * The followings are the available model relations:
 * @property Clientes $idClientes
 * @property CrugeUser $crugeUser
 * @property MisionesDiplomaticas $idMisionesDiplomaticas
 * @property Timbrados $idTimbrado
 * @property TiposRegistros $idTipoRegistro
 * @property TiposComprobantes $idTiposComprobantes
 * 
 */
class Comprobantes extends CActiveRecord
{	

	
	/**
	 * @return string the associated database table name
	 */

	public $mac_add = "7C-E9-D3-27-E4-1D";//"7C-E9-D3-27-E4-1D";
	const this_year = '2019';
	public $ourLimit = 5;
	

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
		return array( //id_comprobantes, cruge_user_id
			array('cruge_user_id, id_clientes, id_tipos_comprobantes, id_tipo_registro,  fecha_expedicion, numero_comprobante, total_importe, iva_simplificado', 'required'), //id_timbrado,
			array('cruge_user_id, id_clientes, id_tipos_comprobantes, id_tipo_registro, id_timbrado, id_misiones_diplomaticas, importe_iva_5, importe_iva_10, importe_exenta, total_importe', 'numerical', 'integerOnly'=>true),
			array('mac_add', 'isMac'),
			array('ourLimit', 'usersCant'),
			array('fecha_expedicion', 'isYear', 'year'=>self::this_year),
			array('numero_comprobante, importe_iva_5, importe_iva_10, importe_exenta, total_importe', 'length', 'max'=>20),
			array('ircp, iva_general, iva_simplificado', 'length', 'max'=>1),//
			array('id_tipos_comprobantes+numero_comprobante+id_timbrado', 'application.extensions.uniqueMultiColumnValidator',
					'on'=>'insert','message'=>'La factura ya se encuentra cargada, favor verificar'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_clientes, id_tipos_comprobantes, id_tipo_registro, id_timbrado, id_misiones_diplomaticas, fecha_expedicion, numero_comprobante, importe_iva_5, importe_iva_10, importe_exenta, total_importe, ircp, iva_general, iva_simplificado', 'safe', 'on'=>'search'),
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
			// 'crugeUser' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_id'),
			'idCrugeUser' => array(self::BELONGS_TO, 'Cruge_User', 'iduser'),
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
			'id_comprobantes' => 'ID Comprobante',
			'id_clientes' => 'Cliente',
			'id_tipos_comprobantes' => 'Tipo de Comprobante',
			'id_tipo_registro' => 'Tipo de Registro',
			'id_timbrado' => 'Timbrado',
			'id_misiones_diplomaticas' => 'Misiones Diplomaticas',
			'fecha_expedicion' => 'Fecha de Expedicion',
			'numero_comprobante' => 'Numero de Comprobante',
			'importe_iva_5' => 'Importe IVA 5',
			'importe_iva_10' => 'Importe IVA 10',
			'importe_exenta' => 'Importe Exenta',
			'total_importe' => 'Total Importe',
			'ircp' => 'IRPC',
			'iva_general' => 'IVA General',
			'iva_simplificado' => 'IVA Simplificado',
			'cruge_user_id' => 'Cruge User',
			// 'iduser' => 'Usuario',
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
		// $criteria->compare('id_clientes',$this->id_clientes);
		// $criteria->compare('id_tipos_comprobantes',$this->id_tipos_comprobantes);
		// $criteria->compare('id_tipo_registro',$this->id_tipo_registro);
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
		$criteria->compare('cruge_user_id',$this->cruge_user_id, true);

		$criteria->with=array('idClientes', 'idTipoRegistro', 'idTiposComprobantes');
		$criteria->addSearchCondition('idClientes.numero_identificacion', (string)$this->id_clientes, true);
		$criteria->addSearchCondition('idTipoRegistro.tipo_registro', (string)$this->id_tipo_registro, true);
		$criteria->addSearchCondition('idTiposComprobantes.tipo_comprobante', (string)$this->id_tipos_comprobantes, true);

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

	public function getMac ()
	{
		$cmd = exec ('getmac');
        $result = explode(" ", $cmd, 2);
        //print_r($result); 
        return $result[0];
	}

	public function isMac($mac)
	{
		$device_mac = $this->getMac();

		if($device_mac != $this->$mac)
			$this->addError($mac, 'Este dispositivo no cuenta con permiso del sistema');
	}


	public function isYear($fecha_expedicion, $year)
	{	
		
		$date1 = $this->cambiarFecha($this->$fecha_expedicion);
		$date2 = $this->cambiarFecha('31-12-'.$year['year']);

		if ($date1)
			if( $date1 > $date2 )
				$this->addError($fecha_expedicion, 'El Comprobante se encuentra fuera del período de licencia');
	}

	public function cambiarFecha($originalDate)
	{	
		$newDate = date("Y-m-d", strtotime($originalDate));
		return $newDate;
	}
	
	public function getUsersCount ()
	{
		$results = Cruge_User::model()->findAll();
		return count ( $results );
	}

	public function usersCant ($ourLimit)
	{
		$usersCount = $this->getUsersCount();

		if( $usersCount > $this->$ourLimit )
				$this->addError($ourLimit, 'Tiene mas Usuarios registrados que los permitidos');

	}

	public function getTipoDeRegistro ($model)
	{
		return $model->idTipoRegistro->tipo_registro;
	}
}
