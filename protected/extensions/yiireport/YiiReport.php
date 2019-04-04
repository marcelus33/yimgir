<?php
/**
 * 
 * Universidad Pedagógica Nacional Fracisco Morazán
 * Dirección de Tecnologías de Información
 * 
 * @author K'iin Balam <kbalam@upnfm.edu.hn>
 * 
 */
 
/**
 * YiiReport class - wrapper for PHPReport
 * 
 * Yii extension for export Spreadsheet and PDF from scratch or templates
 * using PHPEkcel Library.
 * 
 * This library needs YiiExcel extension for work.
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * 
 * @package YiiReport
 * @author K'iin Balam <kbalam@upnfm.edu.hn>
 * @copyright Copyright (c) 2013 UPNFM
 * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 * @version 1.0, 2013-01-17
 */
 
class YiiReport extends PHPReport{
    
    public function __construct($config = array()){
        
        $defaultConfig = require(Yii::getPathOfAlias('ext.yiireport.config').DIRECTORY_SEPARATOR.'yiireport.php');
        $config = CMap::mergeArray($defaultConfig, $config);
        
        if(isset($config['templatePath'])){
            $config['templatePath'] = Yii::getPathOfAlias($config['templatePath']).'/';
        }

        if(isset($config['pdfRendererPath'])){
            $config['pdfRendererPath'] = Yii::getPathOfAlias($config['pdfRendererPath']);
        }
        
        parent::__construct($config);
    }//Constructor end
    
    /**
     * Renders report as a PDF file
     * 
     * @var $filename
     */
    protected function renderPdf($filename){
        switch (strtolower($this->_pdfRenderer)){
            case 'tcpdf':
                $rendererName = PHPExcel_Settings::PDF_RENDERER_TCPDF;
                break;
            
            case 'dompdf':
                $rendererName = PHPExcel_Settings::PDF_RENDERER_DOMPDF;
                break;
            case 'mpdf':
                $rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;
                break;
            default:
                throw new CException(Yii::t('YiiReport','Please set a valid PDF library.'));
                break;
        }
        
        if (!PHPExcel_Settings::setPdfRenderer($rendererName, $this->_pdfRendererPath )) {
            /*die(
                'Please set the $rendererName and $rendererLibraryPath values' .PHP_EOL .' as appropriate for your directory structure'
            );*/
            throw new CException(Yii::t('YiiReport','Please set a valid PDF library path.'));
        }
        
        return parent::renderPdf($filename);
    }//renderPdf method end
}//YiiReport class end