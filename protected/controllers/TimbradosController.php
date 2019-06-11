<?php

class TimbradosController extends Controller
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
	);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view', 'buscarClientes'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
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
{
$model=new Timbrados;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Timbrados']))
{
$model->attributes=$_POST['Timbrados'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_timbrado));
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
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Timbrados']))
{
$model->attributes=$_POST['Timbrados'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_timbrado));
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

		$error = "No se pudo eliminar registro, favor verificar si el timbrado no cuenta con Comprobantes asignados";//$e->getMessage();
				
		try {
				$this->loadModel($id)->delete();
			} catch (CDbException $e) 
				{
					if($e->errorInfo[1] == 1451) {
						header("HTTP/1.0 400 Relation Restriction");
						echo $error;
					} else {
						throw $e;
					}
				}

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
$dataProvider=new CActiveDataProvider('Timbrados');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Timbrados('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Timbrados']))
$model->attributes=$_GET['Timbrados'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Timbrados::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='timbrados-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionBuscarClientes()
 {
	

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
}
