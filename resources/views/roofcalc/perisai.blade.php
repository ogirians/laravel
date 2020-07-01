<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator atap</title>
</head>
<body>

	<h2>PT. Indoberka Investama</h2>
	<h3>Kalkulator Atap</h3>
	<br/>
	<br/>
	<form action="/roofcalc/perisaipost" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="nama" required="required"> <br/>
		Alamat <input type="text" name="alamat" required="required"> <br/>
		HP <input type="text" name="HP" required="required"> <br/>
		Status <input type="text" name="status" required="required"> <br/>
		Pekerjaan <input type="text" name="pekerjaan" required="required"> <br/>
		Panjang <input type="number" name="panjang" required="required"> <br/>
		Lebar <input type="number" name="lebar" required="required"> <br/>
		<input type="submit" value="Perisai" name="model">
	</form>
</body>
</html>