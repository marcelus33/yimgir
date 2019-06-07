<?php

class BackupController extends Controller
{
    public $layout='//layouts/column2';
    //PARAMETROS PARA EL BACKUP
    public $backup_path = 'C:/Users/edward/Desktop/mgir_backup/';
    public $server_name   = "localhost";
    public $username      = "root";
    //$password      = "root";
    public $database_name = "mgir";

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
        'actions'=>array('create','dump', 'restore','dumpCmd', 'restoreCmd'),
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

    public function actionCreate()
    {  
        
        $this->render('create');
    }
    
    public function actionDump()
    {  

        if(isset($_FILES['file_export']))
        {   
            //$file = print_r($_FILES['file_export']);
            $fileName = $_FILES['file_export']['name'];
            //$fileName = $_POST['file_export'];
            $fileType = $_FILES['file_export']['type'];

            $cmd = "mysqldump -hlocalhost -uroot mgir2 > C:\Users\edward\Desktop\mgir_backup\exportar\mybk2.sql";
            //-p{$password}
            exec($cmd);

            $this->render('success', array('fileName'=>$fileName)); //,'file'=> $file , 'result'=>$result 

            
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

            importCmd();
        }

        $this->render('restore');
    }



    public function importCmd(){

            /*    restore
        mysql -hlocalhost -uroot mgir2 < mybk.sql 
    */

        $restore_file  = $this->backup_path."importar/backup.sql";

        $cmd = "mysql -h{$this->server_name} -u{$this->username}  {$this->database_name} < $restore_file";
        //-p{$this->password}
        exec($cmd);

    }

    public function exportCmd(){

            /*  bk
        mysqldump -hlocalhost -uroot mgir2 > mybk.sql
        */

        //define("BACKUP_PATH", "/home/abdul/");

        $dump_path     =  $this->backup_path."exportar/";
        //$date_string   = date("Ymd");

        //$cmd = "mysqldump -h{$this->server_name} -u{$this->username}  {$this->database_name} > " . $dump_path;
        $cmd = "mysqldump -hlocalhost -uroot mgir2 > C:\Users\edward\Desktop\mgir_backup\exportar\mybk2.sql";
        //-p{$password}
        return exec($cmd);

    }

}



?>

