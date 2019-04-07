<?php

class MisionesDiplomaticasController extends Controller
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
'accessControl', // perform access control for CRUD operations
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
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','reportes', 'reportesAjax', 'Excel'),
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
{
$model=new MisionesDiplomaticas;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MisionesDiplomaticas']))
{
$model->attributes=$_POST['MisionesDiplomaticas'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_misiones_diplomaticas));
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

if(isset($_POST['MisionesDiplomaticas']))
{
$model->attributes=$_POST['MisionesDiplomaticas'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_misiones_diplomaticas));
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
$dataProvider=new CActiveDataProvider('MisionesDiplomaticas');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new MisionesDiplomaticas('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['MisionesDiplomaticas']))
$model->attributes=$_GET['MisionesDiplomaticas'];

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
$model=MisionesDiplomaticas::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='misiones-diplomaticas-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionreportes()
{
	   $this->render('reportes');
}

public function actionreportesAjax()
	{
	   
		$model = new MisionesDiplomaticas;
	    // if( (isset($_POST['numero_identificacion']) && $_POST['numero_identificacion']!=='') )
	    // {
	    // 	$numero_identificacion =$_POST['numero_identificacion'];

	    $criteria = new CDbCriteria;
	 	$criteria->condition = 'id_misiones_diplomaticas > 0';
	 	$misiones = MisionesDiplomaticas::model()->findAll($criteria);

		$myfile = fopen("C:/reportes/newfile.txt", "w+") or die("Error al crear el archivo");
		//  echo $responseTable;
		foreach ($misiones as $mision) {
			$mision_txt = $mision->mision_diplomatica. PHP_EOL;
			// $mision = $mision_txt . PHP_EOL;
			fwrite($myfile, $mision_txt);
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
		// echo $respuesta;
		// $this->render('admin',array(
		// 	'model'=>$model,
		// 	));
		$this->redirect('admin', array('model'=>$model,));
}

public function actionExcel(){
        
	
	$model = new MisionesDiplomaticas;
	$criteria = new CDbCriteria;
	$criteria->condition = 'id_misiones_diplomaticas > 0';
	$misiones = MisionesDiplomaticas::model()->findAll();

	$arrayMisiones = array();
    $arrayProv = array();

    foreach ($misiones as $mision) {
        foreach ($mision as $key => $value) {
            $arrayProv = array_merge($arrayProv, array($key => $value));
        }
        array_push($arrayMisiones, $arrayProv);
    }
    // print_r($arrayMisionesNew);//este es el array que queremos chera'a
	
	
	$r = new YiiReport(array('template'=> 'reportes.xls'));
	
	$r->load(array(
			array(
				'id'=>'estu',
				'repeat'=>true,
				'data'=>$arrayMisiones,
				'minRows'=>2
			)
		)
	);
	
	echo $r->render('excel2007', 'Misiones');

	
}

}
