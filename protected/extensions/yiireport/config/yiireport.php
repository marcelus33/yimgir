<?php
/**
 * Configuration file of PHPReport Yii extension.
 * 
 * @author K'iin Balam <kbalam@upnfm.edu.hn>
 */

return array(
    'pdfRenderer' => 'mpdf',//or 'dompdf', 'tcpdf'
    'pdfRendererPath' => 'application.vendors.mpdf',
    'templatePath' => 'application.views.reports',
);