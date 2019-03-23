widget para Yii que convierte numeros a letras

Utilizacion:

$this->widget('ext.numaletras.numerosALetras', array('valor'=>12.56));

se debe especificar el numero a convertir

esto escribe Doce Con Cincuenta Y Seis Decimales

tambien se puede espeficiar con que termina el numero, ejemplo:

$this->widget('ext.numaletras.numerosALetras', array('valor'=>12.56,'despues'=>'ctvos'));

esto escribe Doce Con Cincuenta Y Seis cvos
