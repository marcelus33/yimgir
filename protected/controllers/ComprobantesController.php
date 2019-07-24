<?php

class ComprobantesController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
    return array(
        'accessControl',
        array('CrugeAccessControlFilter'),    
     // perform access control for CRUD operations
    );
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{

Yii::app()->user->loginUrl = array("/cruge/ui/login");

return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','buscarClientes','CambiarComboBox','ObtenerTimbrados', 
'Compra', 'Venta', 'reportesComp', 'reportesAjax', 'reportesAjaxPdf' ,'excelReport','ventaUpdate','compraUpdate'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{   //--*********ESTE YA NO ESTAMOS USANDO, PASAMOS A ACTIONS DE COMPRA Y VENTA*********--//
    $model=new Comprobantes;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Comprobantes']))
    {   
        $model->attributes=$_POST['Comprobantes'];

        //modificamos la fecha antes de guardar, ya que en la vista estaba d-m-Y y en la bd es Y-m-d
        $model->fecha_expedicion = $this->cambiarFecha($model->fecha_expedicion);
        //se sacan los puntos de los inputs por el js del separador de miles que los agregó
        $model->importe_iva_5 = $this->sacarPuntos($model->importe_iva_5);
        $model->importe_iva_10 = $this->sacarPuntos($model->importe_iva_10);
        $model->importe_exenta = $this->sacarPuntos($model->importe_exenta);
        $model->total_importe = $this->sacarPuntos($model->total_importe);
       
    
        if($model->save())
            $this->redirect(array('view','id'=>$model->id_comprobantes));
    }

    $this->render('create',array(
    'model'=>$model,
    ));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{   //--*********ESTE YA NO ESTAMOS USANDO, PASAMOS A ACTIONS DE COMPRA Y VENTA*********--//
    $model=$this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Comprobantes']))
    {
        $model->attributes=$_POST['Comprobantes'];

        //modificamos la fecha antes de guardar, ya que en la vista estaba d-m-Y y en la bd es Y-m-d
        $model->fecha_expedicion = $this->cambiarFecha($model->fecha_expedicion);
        //se sacan los puntos de los inputs por el js del separador de miles que los agregó
        $model->importe_iva_5 = $this->sacarPuntos($model->importe_iva_5);
        $model->importe_iva_10 = $this->sacarPuntos($model->importe_iva_10);
        $model->importe_exenta = $this->sacarPuntos($model->importe_exenta);
        $model->total_importe = $this->sacarPuntos($model->total_importe);

        if($model->save())
            $this->redirect(array('view','id'=>$model->id_comprobantes));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
    $dataProvider=new CActiveDataProvider('Comprobantes');
    $this->render('index',array(
    'dataProvider'=>$dataProvider,
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
    $model=new Comprobantes('search');
    $model->unsetAttributes();  // clear any default values 
  
   
    if(isset($_GET['Comprobantes'])) {
     $model->attributes=$_GET['Comprobantes'];
     $model->id_clientes2 = strtoupper($_GET['Comprobantes']['id_clientes2']);
    }

    $this->render('admin',array(
    'model'=>$model,
    ));
}

    public function sacarPuntos($nro)
	{	
		$newNro = str_replace(".", "", $nro);
		return $newNro;
    }

    public function cambiarFecha($originalDate)
	{	
		$newDate = date("Y-m-d", strtotime($originalDate));
		return $newDate;
    }

    public function reverseFecha($originalDate)
	{	
		$newDate = date("d/m/Y", strtotime($originalDate));
		return $newDate;
    }
    
    public function actionBuscarClientes()
    {   //esta funcion se repite en TimbradorController, por lo que lo ideal seria crear
        //otro controlador para funciones globales reutilizables, observacion a tener en cuenta (DRY)

        if(isset($_POST['numero_identificacion']) && ($_POST['numero_identificacion']!==''))
        {
            $numero_identificacion = $_POST['numero_identificacion'];
                    
            $criteria = new CDbCriteria;
            $criteria->condition = 'numero_identificacion=:nro_id'; 
            $criteria->params = array(':nro_id'=>$numero_identificacion);

            $result = Clientes::model()->find($criteria);
            //Ya obtenemos los valores que necesitamos
            $id_cliente = $result['id_clientes'];
            $nombre_razon_social = $result['nombre_razon_social'];
            $dv = $result['dv'];
            
            
            // if ($result) //preguntamos si obtuvo algo la consulta en si
                
            $array = array($nombre_razon_social, $dv, $id_cliente);

            echo CJSON::encode($array);

        } 

    }

    public function actionCambiarComboBox()
    {  

        if( isset( $_POST['tipoDeRegistro'] ) && ( $_POST['tipoDeRegistro']!=='') )
        {
            $tipoDeRegistro = $_POST['tipoDeRegistro'];
            //aqui obtenemos el id tipo de registro de la vista de comprobantes
            //recordamos que 1= Compra, 2= Venta, 3= Compra/Venta (ambos)
            
            $criteria = new CDbCriteria;
            $criteria->condition = 'id_tipos_registros_tc=:tipoRegistro OR id_tipos_registros_tc=3 ';
            //preguntamos si es igual al tipo de registro enviado Y/O 3 porque 3 eran AMBOS 
            $criteria->params = array(':tipoRegistro'=>$tipoDeRegistro);

            $results = TiposComprobantes::model()->findAll($criteria);             
            
            echo CJSON::encode($results);

        } 

    }

    public function actionObtenerTimbrados()
    {  
        //hay que avisar cuando no tiene timbrados, y cuando el igual user=cliente
        if( isset( $_POST['tipoDeRegistro'] ) && ( $_POST['tipoDeRegistro']!=='') )
        {
            $tipoDeRegistro = (integer)$_POST['tipoDeRegistro']; //recordamos que 1= Compra, 2= Venta
            $searchItem =  $_POST['searchItem']; //1: cedula ingresada, 2: user_id del form
            $id_user = (integer)$_POST['iduser'];
            $user = Cruge_User::model()->findByPK($id_user);
            $numero_ruc = $_POST['numeroRuc']; //guardamos ruc que se ingresa porque en Ventas sirve para comparar
            $flag = 99; //99 = everything alright, bandera que utilizamos para ver que error salen de los ifs

            if ( $tipoDeRegistro == 1)
             {
                $numero_documento_search =  $searchItem;
             }
            else {           
                    if($tipoDeRegistro == 2)
                    {
                        if ($user)
                        {
                            $numero_documento_search = $user->numero_identificacion_irpc; //para poder tener el ruc asociado al user
                        } else $flag = 1; //error de encontrar usuario
                    } else  $flag = 2; //error de tipo de registro
                                          
                }
            
            //con el numero de documento buscamos al cliente para poder tener su ID
            if($numero_documento_search)
            {
                $cliente = Clientes::model()->findByAttributes(array('numero_identificacion'=>$numero_documento_search));

                if ($cliente)
                {
                    $id_cliente = $cliente->id_clientes;
                    $criteriaTimbrado = new CDbCriteria;
                    $criteriaTimbrado->condition = 'id_clientes=:idClientes';
                    $criteriaTimbrado->params = array(':idClientes'=>$id_cliente);

                    if ( $tipoDeRegistro == 1)
                    {   //con el ID del cliente buscamos ahora sus timbrados, viendo primero que no sea igual al ruc del user
                        if($user->numero_identificacion_irpc == $cliente->numero_identificacion)
                        {
                            $criteriaTimbrado = null;
                            $flag = 5;  //error de ser iguales cliente y usuario
                        } //else 
                    } else {
                                if ( $tipoDeRegistro == 2 )
                                {
                                    $clienteVenta = Clientes::model()->findByAttributes(array('numero_identificacion'=>$numero_ruc));
                                    if($clienteVenta)
                                    {
                                        if($user->numero_identificacion_irpc == $clienteVenta->numero_identificacion)
                                        {
                                            $criteriaTimbrado = null;
                                            $flag = 5;  //error de ser iguales cliente y usuario  
                                        } //else
                                    } else $flag = 3; //error de encontrar cliente de Venta                    
                                } 
                            }

                        
                    if ( ($criteriaTimbrado) && ($flag == 99) )
                    {   $results = Timbrados::model()->porID()->findAll($criteriaTimbrado);
                        echo CJSON::encode($results);
                    } else { echo $flag; } 

                } else $flag = 3; //error de encontrar cliente
                

            } else $flag = 4; //error de numero de documento
               

        } else{ $flag = 0;  
                echo $flag;} //error al enviarse datos al ajax

    }

    public function actionCompra()
    {
        $model=new Comprobantes;
        $id_registro = 1;
        $flagTimbrado= 1;
        $contribuyente = "Proveedor";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Comprobantes']))
        {   
            $model->attributes=$_POST['Comprobantes'];

            //modificamos la fecha antes de guardar, ya que en la vista estaba d-m-Y y en la bd es Y-m-d
            $model->fecha_expedicion = $this->cambiarFecha($model->fecha_expedicion);
            //se sacan los puntos de los inputs por el js del separador de miles que los agregó
            $model->importe_iva_5 = $this->sacarPuntos($model->importe_iva_5);
            $model->importe_iva_10 = $this->sacarPuntos($model->importe_iva_10);
            $model->importe_exenta = $this->sacarPuntos($model->importe_exenta);
            $model->total_importe = $this->sacarPuntos($model->total_importe);
            //$model->id_misiones_diplomaticas = null;
            if ( ($model->importe_iva_5 == null) || ($model->importe_iva_5 == "") )
                    $model->importe_iva_5 = 0; 
            if ( ($model->importe_iva_10 == null) || ($model->importe_iva_10 == "") )
                    $model->importe_iva_10 = 0; 
            if ( ($model->importe_exenta == null) || ($model->importe_exenta == "") )
                    $model->importe_exenta = 0;

            if ( (isset($model->id_misiones_diplomaticas)) && ($model->id_misiones_diplomaticas!=="") )
            {} else $model->id_misiones_diplomaticas = null; //ponemos asi xq mysql no detecta los vacios como NULLs

            $suma_de_importes = (integer)$model->importe_iva_5 + 
                                (integer)$model->importe_iva_10 + 
                                (integer)$model->importe_exenta;

            //$model->id_clientes = (integer)$model->id_clientes;
            
            if( (integer) $model->total_importe != $suma_de_importes )
            {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                    'warning',
                    '<strong>Error!</strong> No coinciden sumas ingresadas con el total.'
                );
                $flagTimbrado= 0;

            }

            if  ($model->id_tipos_comprobantes != 10) { 
                if(isset($model->id_timbrado) && ($model->id_timbrado!==''))
                {}
                else {
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                        'error',
                        '<strong>Error!</strong> Tiene que cargar un timbrado para este tipo de Comprobante.'
                    );
                    $flagTimbrado= 0;
                }
            }
            
            if(isset($_POST['yt0']))
            {
                if($model->save() && ($flagTimbrado))
                $this->redirect(array('view','id'=>$model->id_comprobantes));
            }


            if(isset($_POST['yt1']))
            {   

                if($model->save() && ($flagTimbrado)) 
                {
                
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                            'success',
                            '<strong>Éxito!</strong> Se registró el Comprobante de manera éxitosa!.'
                    );

                    $this->redirect('compra',array(
                        'model'=>$model, 
                        'id_registro'=>$id_registro,
                        'contribuyente'=>$contribuyente ));
                }
            }

        }

        $this->render('compra',array(
        'model'=>$model, 
        'id_registro'=>$id_registro,
        'contribuyente'=>$contribuyente ));
    }

    public function actionVenta()
    {
        $model=new Comprobantes;
        $id_registro = 2;
        $flagTimbrado= 1;
        $contribuyente = "Cliente";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Comprobantes']))
        {   
            $model->attributes=$_POST['Comprobantes'];

            //modificamos la fecha antes de guardar, ya que en la vista estaba d-m-Y y en la bd es Y-m-d
            $model->fecha_expedicion = $this->cambiarFecha($model->fecha_expedicion);
            //se sacan los puntos de los inputs por el js del separador de miles que los agregó
            $model->importe_iva_5 = $this->sacarPuntos($model->importe_iva_5);
            $model->importe_iva_10 = $this->sacarPuntos($model->importe_iva_10);
            $model->importe_exenta = $this->sacarPuntos($model->importe_exenta);
            $model->total_importe = $this->sacarPuntos($model->total_importe);

            if ( ($model->importe_iva_5 == null) || ($model->importe_iva_5 == "") )
                    $model->importe_iva_5 = 0; 
            if ( ($model->importe_iva_10 == null) || ($model->importe_iva_10 == "") )
                    $model->importe_iva_10 = 0; 
            if ( ($model->importe_exenta == null) || ($model->importe_exenta == "") )
                    $model->importe_exenta = 0;

            if ( (isset($model->id_misiones_diplomaticas)) && ($model->id_misiones_diplomaticas!=="") )
            {} else $model->id_misiones_diplomaticas = null; //ponemos asi xq mysql no detecta los vacios como NULLs


            $suma_de_importes = (integer)$model->importe_iva_5 + 
                                (integer)$model->importe_iva_10 + 
                                (integer)$model->importe_exenta;

            if( (integer) $model->total_importe != $suma_de_importes )
            {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                'warning',
                '<strong>Error!</strong> No coinciden sumas ingresadas con el total.'
                );
                $flagTimbrado= 0;

            }

            if  ($model->id_tipos_comprobantes != 10) { 
                if(isset($model->id_timbrado) && ($model->id_timbrado!==''))
                {}
                else {
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                        'error',
                        '<strong>Error!</strong> Tiene que cargar un timbrado para este tipo de Comprobante.'
                    );
                    $flagTimbrado= 0;
                }
            }
        
            if(isset($_POST['yt0']))
            {
                if($model->save() && ($flagTimbrado))
                $this->redirect(array('view','id'=>$model->id_comprobantes));
            }


            if(isset($_POST['yt1']))
            {   

                if($model->save() && ($flagTimbrado)) 
                {
                
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                            'success',
                            '<strong>Éxito!</strong> Se registró el Comprobante de manera éxitosa!.'
                    );

                    $this->redirect('venta',array(
                        'model'=>$model, 
                        'id_registro'=>$id_registro,
                        'contribuyente'=>$contribuyente ));
                }
            }
        }

        $this->render('venta',array(
        'model'=>$model, 
        'id_registro'=>$id_registro,
        'contribuyente'=>$contribuyente ));
    }

    public function actionCompraUpdate($id)
    {
        $model=$this->loadModel($id);
        $id_registro = 1;
        $flagTimbrado= 1;
        $contribuyente = "Proveedor";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Comprobantes']))
        {   
            $model->attributes=$_POST['Comprobantes'];

            //modificamos la fecha antes de guardar, ya que en la vista estaba d-m-Y y en la bd es Y-m-d
            $model->fecha_expedicion = $this->cambiarFecha($model->fecha_expedicion);
            //se sacan los puntos de los inputs por el js del separador de miles que los agregó
            $model->importe_iva_5 = $this->sacarPuntos($model->importe_iva_5);
            $model->importe_iva_10 = $this->sacarPuntos($model->importe_iva_10);
            $model->importe_exenta = $this->sacarPuntos($model->importe_exenta);
            $model->total_importe = $this->sacarPuntos($model->total_importe);

            if ( ($model->importe_iva_5 == null) || ($model->importe_iva_5 == "") )
                    $model->importe_iva_5 = 0; 
            if ( ($model->importe_iva_10 == null) || ($model->importe_iva_10 == "") )
                    $model->importe_iva_10 = 0; 
            if ( ($model->importe_exenta == null) || ($model->importe_exenta == "") )
                    $model->importe_exenta = 0;

            if ( (isset($model->id_misiones_diplomaticas)) && ($model->id_misiones_diplomaticas!=="") )
            {} else $model->id_misiones_diplomaticas = null; //ponemos asi xq mysql no detecta los vacios como NULLs


            $suma_de_importes = (integer)$model->importe_iva_5 + 
                                (integer)$model->importe_iva_10 + 
                                (integer)$model->importe_exenta;

            if( (integer) $model->total_importe != $suma_de_importes )
            {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                    'warning',
                    '<strong>Error!</strong> No coinciden sumas ingresadas con el total.'
                );
                $flagTimbrado= 0;

            }

            if  ($model->id_tipos_comprobantes != 10) { 
                if(isset($model->id_timbrado) && ($model->id_timbrado!==''))
                {}
                else {
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                        'error',
                        '<strong>Error!</strong> Tiene que cargar un timbrado para este tipo de Comprobante.'
                    );
                    $flagTimbrado= 0;
                }
            }
        
            if(isset($_POST['yt0']))
            {
                if($model->save() && ($flagTimbrado))
                $this->redirect(array('view','id'=>$model->id_comprobantes));
            }


            if(isset($_POST['yt1']))
            {   

                if($model->save() && ($flagTimbrado)) 
                {
                
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                            'success',
                            '<strong>Éxito!</strong> Se registró el Comprobante de manera éxitosa!.'
                    );

                    $this->redirect('compra',array(
                        'model'=>$model, 
                        'id_registro'=>$id_registro,
                        'contribuyente'=>$contribuyente ));
                }
            }
        }

        $this->render('compraUpdate',array(
        'model'=>$model, 
        'id_registro'=>$id_registro,
        'contribuyente'=>$contribuyente ));
    }

    public function actionVentaUpdate($id)
    {
        $model=$this->loadModel($id);
        $id_registro = 2;
        $flagTimbrado= 1;
        $contribuyente = "Cliente";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Comprobantes']))
        {   
            $model->attributes=$_POST['Comprobantes'];

            //modificamos la fecha antes de guardar, ya que en la vista estaba d-m-Y y en la bd es Y-m-d
            $model->fecha_expedicion = $this->cambiarFecha($model->fecha_expedicion);
            //se sacan los puntos de los inputs por el js del separador de miles que los agregó
            $model->importe_iva_5 = $this->sacarPuntos($model->importe_iva_5);
            $model->importe_iva_10 = $this->sacarPuntos($model->importe_iva_10);
            $model->importe_exenta = $this->sacarPuntos($model->importe_exenta);
            $model->total_importe = $this->sacarPuntos($model->total_importe);

            if ( ($model->importe_iva_5 == null) || ($model->importe_iva_5 == "") )
                    $model->importe_iva_5 = 0; 
            if ( ($model->importe_iva_10 == null) || ($model->importe_iva_10 == "") )
                    $model->importe_iva_10 = 0; 
            if ( ($model->importe_exenta == null) || ($model->importe_exenta == "") )
                    $model->importe_exenta = 0;

            if ( (isset($model->id_misiones_diplomaticas)) && ($model->id_misiones_diplomaticas!=="") )
            {} else $model->id_misiones_diplomaticas = null; //ponemos asi xq mysql no detecta los vacios como NULLs


            $suma_de_importes = (integer)$model->importe_iva_5 + 
                                (integer)$model->importe_iva_10 + 
                                (integer)$model->importe_exenta;

            if( (integer) $model->total_importe != $suma_de_importes )
            {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                'warning',
                '<strong>Error!</strong> No coinciden sumas ingresadas con el total.'
                );
                $flagTimbrado= 0;

            }

            if  ($model->id_tipos_comprobantes != 10) { 
                if(isset($model->id_timbrado) && ($model->id_timbrado!==''))
                {}
                else {
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                        'error',
                        '<strong>Error!</strong> Tiene que cargar un timbrado para este tipo de Comprobante.'
                    );
                    $flagTimbrado= 0;
                }
            }
        
            if(isset($_POST['yt0']))
            {
                if($model->save() && ($flagTimbrado))
                $this->redirect(array('view','id'=>$model->id_comprobantes));
            }


            if(isset($_POST['yt1']))
            {   

                if($model->save() && ($flagTimbrado)) 
                {
                
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                            'success',
                            '<strong>Éxito!</strong> Se registró el Comprobante de manera éxitosa!.'
                    );

                    $this->redirect('venta',array(
                        'model'=>$model, 
                        'id_registro'=>$id_registro,
                        'contribuyente'=>$contribuyente ));
                }
            }
        }

        $this->render('ventaUpdate',array(
        'model'=>$model, 
        'id_registro'=>$id_registro,
        'contribuyente'=>$contribuyente ));
    }
    

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Comprobantes::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
    if(isset($_POST['ajax']) && $_POST['ajax']==='comprobantes-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
}

public function setFoo ($model)
{
    $model->foo = $model->idTipoRegistro->tipo_registro;
    $model->save();
        return $model->foo;
}

public function actionreportesComp()
{
    $model=new Comprobantes;
    $id_user = Yii::app()->user->id;

    $dataProvider=new CActiveDataProvider('Comprobantes', array(
        'criteria'=>array(
            'condition'=>'cruge_user_id='.$id_user,
    )));
    // $this->render('index',array(
    // 'dataProvider'=>$dataProvider,
    // ));

    $this->render('reportesComp',array(
    'model'=>$model, 'dataProvider'=>$dataProvider,
    ));
}

public function actionreportesAjax()
	{
	   
		$model = new Comprobantes;
        if( (isset($_POST['fecha_desde']) && $_POST['fecha_desde']!=='') && 
            (isset($_POST['fecha_hasta']) && $_POST['fecha_hasta']!==''))
	    {
	    	$fecha_desde = $this->cambiarFecha($_POST['fecha_desde']);
            $fecha_hasta = $this->cambiarFecha($_POST['fecha_hasta']);
        }

        $tipo_registro = $_POST['tipo_registro'];

        $usuario = Yii::app()->user->id;

        $criteria = new CDbCriteria;
        $criteria->addCondition('fecha_expedicion >= :fr_d '); //1/10
        $criteria->addCondition('fecha_expedicion <= :fr_h'); // 20/10
        $criteria->addCondition('cruge_user_id = :ur');
        if($tipo_registro <= 2) {
        $criteria->addCondition('id_tipo_registro = :tr'); 
        $criteria->params = array(':fr_d'=>$fecha_desde, ':fr_h'=>$fecha_hasta, 
                                    ':ur'=>$usuario, ':tr'=>$tipo_registro);
        }
        else {
            $criteria->addCondition('cruge_user_id = :ur'); 
            $criteria->params = array(':fr_d'=>$fecha_desde, ':fr_h'=>$fecha_hasta, 
                                         ':ur'=>$usuario);   
        }
        $comprobantes = Comprobantes::model()->findAll($criteria);
                       
        $model_usuario = Cruge_User::model()->findByPk($usuario);
       
        $identificacion_usuario = $model_usuario->numero_identificacion_irpc;
        $periodo = 2019;

        
        if($comprobantes) {
            if($tipo_registro > 2){
                $desc_registro = '';
            }
            else{
                if ($tipo_registro > 1) {
                    $desc_registro = "_VENTAS";
                } else {
                    $desc_registro = "_COMPRAS";
                }
            }
            $myfile = fopen("C:/reportes/" . $identificacion_usuario . "_IRPC_" . $periodo . $desc_registro . ".txt", "w+") or die("Error al crear el archivo");
            
                foreach ($comprobantes as $comprobante) {
                $linea = $comprobante->idTipoRegistro->tipo_registro .chr(9). //tipo_comprobante
                $comprobante->idTiposComprobantes->tipo_comprobante .chr(9). //tipo_comprobante
                $this->reverseFecha($comprobante->fecha_expedicion).chr(9);
                // $comprobante->fecha_expedicion .chr(9);
                if( $comprobante->idTimbrado != null){
                    $timbrado = $comprobante->idTimbrado->numero_timbrado .chr(9);
                }
                else{
                    $timbrado = chr(9);
                }
                $lineacont = $timbrado .
                $comprobante->numero_comprobante . chr(9).
                $comprobante->idClientes->idDocumentosIdentificacion->documento_identificacion . chr(9). //tipo_identificacion
                $comprobante->idClientes->numero_identificacion . chr(9). //numero_identificacion
                $comprobante->idClientes->nombre_razon_social . chr(9); //nombre_razon_social
                if( $comprobante->idMisionesDiplomaticas != null){
                    $mision = $comprobante->idMisionesDiplomaticas->mision_diplomatica .chr(9);
                }
                else{
                    $mision = chr(9);
                }
                $lineacont = $lineacont . $mision ;
                if( $comprobante->importe_iva_10 != null){
                    $iva_10 = $comprobante->importe_iva_10 .chr(9);
                }
                else{
                    $iva_10 = 0 . chr(9);
                }
                $lineacont = $lineacont . $iva_10;
                //$comprobante->importe_iva_10 . chr(9).
                if( $comprobante->importe_iva_5 != null){
                    $iva_5 = $comprobante->importe_iva_5 .chr(9);
                }
                else{
                    $iva_5 = 0 . chr(9);
                }
                $lineacont = $lineacont . $iva_5;
                //$comprobante->importe_iva_5 . chr(9).
                if( $comprobante->importe_exenta != null){
                    $exenta = $comprobante->importe_exenta .chr(9);
                }
                else{
                    $exenta = 0 . chr(9);
                }
                $lineacont = $lineacont . $exenta . 
                //$comprobante->importe_exenta . chr(9).
                $comprobante->total_importe . chr(9).
                $comprobante->ircp . chr(9).
                $comprobante->iva_general . chr(9).
                $comprobante->iva_simplificado . PHP_EOL;
                $linea = $linea . $lineacont;
                // $mision = $mision_txt . PHP_EOL;
                fwrite($myfile, $linea);
                $linea = '';
                $lineacont = '';
            }
        
        }
		
		if(fclose($myfile)){
			$user = Yii::app()->getComponent('user');
            $user->setFlash(
                    'success',
                    '<strong>Listo!</strong> Archivo generado en <strong>Reportes</strong>'
            );
		}
		else{
			$user = Yii::app()->getComponent('user');
            $user->setFlash(
            		'error',
                    '<strong>Error!</strong> Intente nuevamente generar el archivo'
            );
		}
		$this->redirect('reportesComp', array('model'=>$model,));
}

public function actionexcelReport(){
        
	
	$model = new Comprobantes;
        if( (isset($_POST['fecha_desde']) && $_POST['fecha_desde']!=='') && 
            (isset($_POST['fecha_hasta']) && $_POST['fecha_hasta']!==''))
	    {
	    	$fecha_desde = $this->cambiarFecha($_POST['fecha_desde']);
            $fecha_hasta = $this->cambiarFecha($_POST['fecha_hasta']);

            
        }
    
    $drop_value = $_POST['mySelect'];
    
    $sub_query_a_concatenar = "and co.id_tipo_registro = "; //comienzo de la parte de la query que queremos concatenar
    // $tipo_registro = 3;
			if ($drop_value == 1)
				$sub_query_a_concatenar = $sub_query_a_concatenar. "1"; //"and co.id_tipo_registro = 1"
				else if ($drop_value == 2)
						$sub_query_a_concatenar = $sub_query_a_concatenar. "2"; //"and co.id_tipo_registro = 2"
						else $sub_query_a_concatenar = ""; //vaciamos
    
    $usuario = Yii::app()->user->id;
    $usuario_identi = Yii::app()->user->name;

    $sql = 'select tr.tipo_registro, tc.tipo_comprobante, co.fecha_expedicion, ti.numero_timbrado, 
            co.numero_comprobante, di.documento_identificacion, cl.numero_identificacion, 
            cl.nombre_razon_social, md.mision_diplomatica, co.importe_iva_10,
            co.importe_iva_5, co.importe_exenta, ROUND((co.importe_iva_10/1.1), 0) gravado_10,
            ROUND((co.importe_iva_5/1.05), 0) gravado_5, ROUND(((co.importe_iva_10 * 0.1) + (co.importe_iva_5 * 0.05)), 0) total_impuestos,
            co.total_importe, co.ircp, co.iva_general, co.iva_simplificado
            from comprobantes as co inner join clientes as cl
            on co.id_clientes = cl.id_clientes
            inner join documentos_identificacion as di
            on di.id_documentos_identificacion = cl.id_documentos_identificacion
            inner join tipos_comprobantes as tc
            on tc.id_tipos_comprobantes = co.id_tipos_comprobantes
            inner join tipos_registros as tr
            on tr.id_tipo_registro = co.id_tipo_registro
            left join timbrados as ti
            on ti.id_timbrado = co.id_timbrado
            left join misiones_diplomaticas as md
            on md.id_misiones_diplomaticas = co.id_misiones_diplomaticas
            where co.fecha_expedicion >=\''.$fecha_desde . '\' and co.fecha_expedicion <=\'' .$fecha_hasta . '\'
            and co.cruge_user_id = '.$usuario." ".$sub_query_a_concatenar; 
    
    $rawData = Yii::app()->db->createCommand($sql)->queryAll(); //or use ->queryAll(); in CArrayDataProvider
	$r = new YiiReport(array('template'=> 'comprobantes.xls'));
	
	$r->load(array(
			array(
				'id'=>'estu',
				'repeat'=>true,
				'data'=>$rawData,
				'minRows'=>2
			)
		)
    );
    if ($drop_value == 1)
        $tipo_drop = "_COMPRAS";
    else if ($drop_value == 2)
        $tipo_drop = "_VENTAS";
            else $tipo_drop = "";
	
	echo $r->render('excel2007', $usuario_identi . '_Comprobantes'.$tipo_drop);

	
}

public function actionreportesAjaxPdf()
	{
	   
		$model = new Comprobantes;
        if( (isset($_POST['fecha_desde']) && $_POST['fecha_desde']!=='') && 
            (isset($_POST['fecha_hasta']) && $_POST['fecha_hasta']!==''))
	    {
	    	$fecha_desde = $this->cambiarFecha($_POST['fecha_desde']);
            $fecha_hasta = $this->cambiarFecha($_POST['fecha_hasta']);
        }

        $tipo_registro = $_POST['tipo_registro'];

        $usuario = Yii::app()->user->id;

        $criteria = new CDbCriteria;
        $criteria->order = "fecha_expedicion";
        $criteria->addCondition('fecha_expedicion >= :fr_d '); //1/10
        $criteria->addCondition('fecha_expedicion <= :fr_h'); // 20/10
        $criteria->addCondition('cruge_user_id = :ur');

        if($tipo_registro <= 2) {
            $criteria->addCondition('id_tipo_registro = :tr'); 
            $criteria->params = array(':fr_d'=>$fecha_desde, ':fr_h'=>$fecha_hasta, 
                                        ':ur'=>$usuario, ':tr'=>$tipo_registro);
        }
            else {
                $criteria->addCondition('cruge_user_id = :ur'); 
                $criteria->params = array(':fr_d'=>$fecha_desde, ':fr_h'=>$fecha_hasta, 
                                            ':ur'=>$usuario);   
            }
        

        $comprobantes = Comprobantes::model()->findAll($criteria);
                       
        $model_usuario = Cruge_User::model()->findByPk($usuario);
       
        $identificacion_usuario = $model_usuario->numero_identificacion_irpc;
        $periodo = 2019;
        
        $flag = 0;
        
        if($comprobantes) 
        {   $flag = 1; // se encontraron resultados
            $dataProvider = new CActiveDataProvider('Comprobantes', 
                                array('criteria'=>$criteria, 'pagination'=> false, ));



            if($tipo_registro > 2){
                $desc_registro = '';
            }
            else{
                if ($tipo_registro > 1) {
                    $desc_registro = "_VENTAS";
                } else {
                    $desc_registro = "_COMPRAS";
                }
            }        
        } else $flag = 2; //no se encontraron resultados


        $mpdf = Yii::app()->ePdf->mpdf('c', 'Legal-L');
        $mpdf->WriteHTML("<h5 align =\"center\" > Comprobantes ".$desc_registro." Período: ".$periodo."</h5>");
        $mpdf->WriteHTML("<h5 align =\"center\" > Del: ".$this->reverseFecha($fecha_desde)." Al: ".$this->reverseFecha($fecha_hasta) ."</h5>");
        $mpdf->WriteHTML('');
        
        
       if ($dataProvider)
            $mpdf->WriteHTML($this->renderPartial( '_parcial_comprobantes_pdf',    
                 array( 'dataProvider'=>$dataProvider,),true, true ) ); 
       else  $flag = 3; //error con el dataProvider

       $mpdf->SetFooter('||{PAGENO}');


       $fileName =  $identificacion_usuario . "_IRPC_" . $periodo . $desc_registro;  

       if ($flag == 1)
          $mpdf->Output('C:/reportes/'.$fileName .'.pdf', EYiiPdf::OUTPUT_TO_FILE);
        
       echo $flag;

} 


}
