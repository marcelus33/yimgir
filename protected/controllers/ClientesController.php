<?php

class ClientesController extends Controller
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
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update', 'reportClientes'),
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
	$model=new Clientes;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Clientes']))
	{
		$model->attributes=$_POST['Clientes'];
		
		//comprobamos si numero de identificacion es un numero
		if ( is_numeric ($model->numero_identificacion) ) {

			if($model->save())
				$this->redirect(array('view','id'=>$model->id_clientes));

		} else {
			$user = Yii::app()->getComponent('user');
			$user->setFlash(
					'error',
					'<strong>Error</strong> El número de identificación debe ser un número'
			);
		}


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

	if(isset($_POST['Clientes']))
	{
	$model->attributes=$_POST['Clientes'];
	if($model->save())
	$this->redirect(array('view','id'=>$model->id_clientes));
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
$dataProvider=new CActiveDataProvider('Clientes');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Clientes('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Clientes']))
$model->attributes=$_GET['Clientes'];

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
$model=Clientes::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionreportClientes()
	{
	   
		$model = new Clientes;
	    $dataProvider = new CActiveDataProvider($model,array());
	    
	    
	    if( (isset($_POST['numero_identificacion']) && $_POST['numero_identificacion']!=='') )
	    {
	    	$numero_identificacion =$_POST['numero_identificacion'];

	    	// if( (isset($_POST['documento_identificacion']) && $_POST['documento_identificacion']!=='') )
	    	// {
	    	// 	$documento_identificacion = " = ".$_POST['documento_identificacion'];
	    	// 	//$cursoModel = Cursos::model()->findByPk($curso);
	    	// 	//$cursoName = $cursoModel->curso;
	    	// }
	    	// else{
	    	// 	$curso = " > 0";
	    	// 	//$cursoName="Todos";
	    	// }

		    $criteria = new CDbCriteria;
	 		$criteria->condition = 'numero_identificacion=:numero_identificacion';
	 		$criteria->params = array(':numero_identificacion'=>$numero_identificacion);

	 		//Aqui creamos el dataprovider usando la criteria
			$dataProvider= new CActiveDataProvider(Clientes::model(), array(
	    			'criteria'=>$criteria,
	    			'sort'=>array('defaultOrder'=>'id_clientes ASC'), // cambiar luego por nombre alumno
	    			'pagination'=>false, // personalizamos la paginaciÃ³n
				) );

            $fileName = "datos_cliente.xls";
            Yii::app()->request->sendFile($fileName,
	            $this->renderPartial('_clienteExcel', 
	                array('dataProvider'=>$dataProvider, 'numero_identificacion'=>$numero_identificacion ), true, false) );

			// $this->render('_clienteExcel', 
	        //         array('dataProvider'=>$dataProvider, 'numero_identificacion'=>$numero_identificacion ));

        }
        $this->render('reportClientes',array('model'=>$model,));
	}
}
