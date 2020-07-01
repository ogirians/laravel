<html>
<head>
<title>Kalkulator Atap</title>
</head>
<body>
<script language="JavaScript" type="text/javascript">

<!--

function hitung(){

var myForm = document.form1;
var x=eval(myForm.x.value);
var y=eval(myForm.y.value);
var pil= myForm.opt.value;
if (pil == "tambah") {
var z = 2*((y/2*1.25)*x);
var kanal = Math.round(z * 80/100+5);
var SDSkanal = Math.round(z * 15+5);
var SDSReng = Math.round(z * 20+5);
var genpas = Math.round(z * 0.60+5);
var dw = Math.round(genpas * 15+5);
var rs = Math.round(z * 80/100+5);
var rm = Math.round(z * 85/100+5);
var rb = Math.round(z * 90/100+5);
var rk = Math.round(z * 100/100+5);
var rkp = Math.round(z * 110/100+5);

 }else if (pil == "kurang") {
var bc = y/2*1.25
var j =bc+(bc*30/100);
var z = 2*(Math.round(j)*x);
var kanal = Math.round(z * 80/100+5);
var SDSkanal = Math.round(z * 15+5);
var SDSReng = Math.round(z * 20+5);
var genpas = Math.round(z * 0.60+5);
var dw = Math.round(genpas * 15+5);
var rs = Math.round(z * 80/100+5);
var rm = Math.round(z * 85/100+5);
var rb = Math.round(z * 90/100+5);
var rk = Math.round(z * 100/100+5);
var rkp = Math.round(z * 110/100+5);
 } else if (pil == "kali") {
var bc = x * y;
 } else if (pil == "bagi") {
var bc = x / y;
 }
 myForm.hasil1.value = kanal;
 myForm.hasil2.value = SDSkanal;
 myForm.hasil3.value = SDSReng;
 myForm.hasil4.value = genpas;
 myForm.hasil5.value = dw;
 myForm.hasil6.value = rs;
 myForm.hasil7.value = rm;
 myForm.hasil8.value = rb;
 myForm.hasil9.value = rk;
 myForm.hasil10.value = rkp;

 myForm.x.value = "";
 myForm.y.value = "";
}
function resetForm(){
document.form1.reset();
}

//-->

</script>
<div align="center">
<form name="form1" action="#">
<p>Panjang bangunan  <input type="text" name="x" /></p>
<p>Lebar bangunan  <input type="text" name="y" /></p>
<p>hasil untuk kanal membutuhkan <input type="text" name="hasil1" disabled="true" /> batang </p>
<p>hasil untuk baut kanal membutuhkan <input type="text" name="hasil2" disabled="true" /> pcs </p>
<p>hasil untuk baut reng membutuhkan  <input type="text" name="hasil3" disabled="true" /> pcs </p>
<p>hasil untuk genteng pasir membutuhkan <input type="text" name="hasil4" disabled="true" /> lembar </p>
<p>hasil untuk drywall membutuhkan <input type="text" name="hasil5" disabled="true" /> pcs </p>
<p>hasil untuk reng membutuhkan, jika menggunakan spandek <input type="text" name="hasil6" disabled="true" /> batang </p>
<p>hasil untuk reng membutuhkan, jika menggunakan genteng metal <input type="text" name="hasil7" disabled="true" /> batang </p>
<p>hasil untuk reng membutuhkan, jika menggunakan genteng beton <input type="text" name="hasil8" disabled="true" /> batang </p>
<p>hasil untuk reng membutuhkan, jika menggunakan genteng keramik <input type="text" name="hasil9" disabled="true" /> batang </p>
<p>hasil untuk reng membutuhkan, jika menggunakan genteng karang pilang <input type="text" name="hasil10" disabled="true" /> batang </p>
<p>Model Atap <select name="opt"></p>
 <option value="tambah"> Model Perisai</option>
 <option value="kurang"> Model Limas</option>
 <option value="kali"> Model Jurai dalam</option>
 <option value="bagi"> Model Kerucut</option>
</select>
<input type="button" value="=" onClick="hitung()" />
<input type="button" value="CLEAR" onClick="resetForm()" />
</form>
</body>
</html>