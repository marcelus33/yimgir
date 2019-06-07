<?php

class BackupController extends Controller
{
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
        'actions'=>array('create','dump', 'restore'),
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

    public function actionIndex()
    {  
        
        $this->render('index');
    }
    
    public function actionDump()
    {  

        if(isset($_FILES['file_export']))
        {
            $fileName = $_FILES['file_export']['name'];
            $fileType = $_FILES['file_export']['type'];

            $this->render('success', array('fileName'=>$fileName));
        }

        $this->render('dump');
    }

    public function actionRestore()
    {            

        if(isset($_FILES['file_import'])) //$_FILES['file_import'])
        {
            $fileName = $_FILES['file_import']['name'];
            $fileType = $_FILES['file_import']['type'];

            $this->render('success', array('fileName'=>$fileName));
        }

        $this->render('restore');
    }

    public function restoreCmd(){

        $restore_file  = "/home/abdul/20140306_world_copy.sql";
        $server_name   = "localhost";
        $username      = "root";
        $password      = "root";
        $database_name = "test_world_copy";

        $cmd = "mysql -h {$server_name} -u {$username} -p{$password} {$database_name} < $restore_file";
        exec($cmd);

    }

    public function dumpCmd(){

        define("BACKUP_PATH", "/home/abdul/");

        $server_name   = "localhost";
        $username      = "root";
        $password      = "root";
        $database_name = "world_copy";
        $date_string   = date("Ymd");

        $cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > " . BACKUP_PATH . "{$date_string}_{$database_name}.sql";

        exec($cmd);

    }

}



?>

