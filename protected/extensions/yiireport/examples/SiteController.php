<?php

class SiteController extends Controller
{
    public function actionExcel(){
        
        //Some data
        $students = array(
            array('name'=>'Some Name','obs'=>'Mat'),
            array('name'=>'Another Name','obs'=>'Tec'),
            array('name'=>'Yet Another Name','obs'=>'Mat')
        );
        
        $r = new YiiReport(array('template'=> 'students.xls'));
        
        $r->load(array(
                array(
                    'id' => 'ong',
                    'data' => array(
                        'name' => 'UNIVERSIDAD PADAGÓGICA NACIONAL'
                    )
                ),
                array(
                    'id'=>'estu',
                    'repeat'=>true,
                    'data'=>$students,
                    'minRows'=>2
                )
            )
        );
        
        echo $r->render('excel5', 'Students');
        //echo $r->render('excel2007', 'Students');
        //echo $r->render('pdf', 'Students');
        
    }//actionExcel method end
}