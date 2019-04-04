# YiiReport

Yii extension for export Spreadsheet and PDF from scratch or templates using PHPExcel and PHPReport Libraries.
 
This library needs [YiiExcel](https://bitbucket.org/upnfm/yiiexcel) extension for work.

## Requirements

* Yii 1.1 or above.
* PHPExcel 1.7.8
* [YiiExcel extension](http://www.yiiframework.com/extension/yiiexcel/).
* Optional: TcPDF, DomPDF or mPDF library.

## Installation

1. Download and install [YiiExcel extension](http://www.yiiframework.com/extension/yiiexcel/).
2. Download a PDF library, like [mPDF](http://www.mpdf1.com/mpdf/index.php) and copy to `protected/vendors directory`
3. Download and Unzip `YiiReport`, then copy `yiireport` directory to `protected/extensions`.
4. Edit `yiireport.php` config file if you need. Here you set the PDF library to use, the path for that library and the template path. 
5. Add YiiReport to imports:

~~~
...
'import'=>array(
    ...
    'application.vendors.phpexcel.PHPExcel',
    'ext.yiireport.*',
    ...
),
~~~


## Usage

~~~
$r = new YiiReport(array('template'=> someTemplate.xls));
$r->load(array(...));
echo $r->render(format, name);
~~~

## Notes

* Inside `yiireport.php` config file, you must use alias path format.
* The output format options are: `'excel5'` for `xls`, `'excel2007'` for `xlsx`, `'html'` and `'pdf'`.
* PHPReport class have lites modifications over the original [PHPReport](https://github.com/vernes/PHPReport) class by [Vernes Šiljegović](https://github.com/vernes).

## Example

1. Copy `students.xls` file from `examples/templates` to `views/reports`
2. Copy `actionExcel()` method from `SiteController.php` example file to your own `SiteController`
