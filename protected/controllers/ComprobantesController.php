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
'actions'=>array('create','update','buscarClientes','CambiarComboBox','ObtenerTimbrados', 'Compra', 'Venta'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
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
   
    if(isset($_GET['Comprobantes']))
     $model->attributes=$_GET['Comprobantes'];

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
                    {   $results = Timbrados::model()->findAll($criteriaTimbrado);
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

           // if($model->save() && ($flagTimbrado))
             //   $this->redirect(array('view','id'=>$model->id_comprobantes));

            if(isset($_POST['yt1']))
            {
                if($model->save() && ($flagTimbrado))
                $this->redirect('compra',array(
                    'model'=>$model, 
                    'id_registro'=>$id_registro,
                    'contribuyente'=>$contribuyente ));
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
        
            if($model->save() && ($flagTimbrado))
                $this->redirect(array('view','id'=>$model->id_comprobantes));
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
        
            if($model->save() && ($flagTimbrado))
                $this->redirect(array('view','id'=>$model->id_comprobantes));
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
        
            if($model->save() && ($flagTimbrado))
                $this->redirect(array('view','id'=>$model->id_comprobantes));
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


}
