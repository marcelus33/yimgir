# YiiReport

Extensión de Yii para exportar hojas de cálculo (excel) y PDF partiendo de código o plantillas de excel,
utilizando las bibliotecas PHPExcel y PHPReport.
 
Esta extensión necesita la extensión [YiiExcel](https://bitbucket.org/upnfm/yiiexcel) para trabajar.

## Requerimientos

* Yii 1.1 or superior.
* PHPExcel 1.7.8
* Extensión [YiiExcel](http://www.yiiframework.com/extension/yiiexcel/)
* Opcional: Alguna de las bibliotecas TcPDF, DomPDF o mPDF.

## Instalación

1. Descarga e instala la extensión [YiiExcel](http://www.yiiframework.com/extension/yiiexcel/).
2. Descarga una biblioteca para PDF, como [mPDF](http://www.mpdf1.com/mpdf/index.php) y copiala en `protected/vendors directory`
3. Descarga y descomprime `YiiReport`, entonces copia el directorio `yiireport` en `protected/extensions`.
4. Edita el archivo de configuración `yiireport.php` si llega a ser necesario. 
    En este archivo se establece la biblioteca PDF a utilizar, la ruta a dicha biblioteca y la ruta a las plantillas. 
5. Agrega YiiReport a los imports:

~~~
...
'import'=>array(
    ...
    'application.vendors.phpexcel.PHPExcel',
    'ext.yiireport.*',
    ...
),
~~~


## Uso

~~~
$r = new YiiReport(array('template'=> someTemplate.xls));
$r->load(array(...));
echo $r->render(format, name);
~~~

## Notas

* En el archivo de configuración `yiireport.php`, debes utilizar el formato de alias (alias path).
* los formatos de salida posible son: `'excel5'` para `xls`, `'excel2007'` para `xlsx`, `'html'` y `'pdf'`.
* La clase PHPReport tiene pequeñas modificaciones sobre la clase original [PHPReport](https://github.com/vernes/PHPReport) hecha por [Vernes Šiljegović](https://github.com/vernes).

## Ejemplo

1. Copia el archivo `students.xls` de `examples/templates` a `views/reports`.
2. copia el método `actionExcel()` de el archivo de ejemplo `SiteController.php` a te propio controlador `SiteController`.
