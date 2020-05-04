<!DOCTYPE html>
<html>
<head>
	<title>Membuat Kalkulator Sederhana Dengan PHP | www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="" method="post" class="col-lg-6 col-md-8 col-sm-10 col-xs-12 align-content-center">
    
    <div class="form-group">
        <label for="Number 1">Number 1</label>
        <input type="number" class="form-control" name="number1">
    </div>
    <div class="form-group">
        <label for="Number 2">Number 2</label>
        <input type="number" class="form-control" name="number2">
    </div>
    <button type="submit" class="btn btn-success" name="addition" value="+">Addtion(+)</button>
    <button type="submit" class="btn btn-primary" name="subtraction" value="-">Subtraction(-)</button>
    <button type="submit" class="btn btn-warning" name="multiplication" value="*">Multiplication(X)</button>
    <button type="submit" class="btn btn-info" name="division" value="/">Division</button>
    <p class="legend-color-guide">Result: @if(isset($result)){{$result}} @endif</p>
</form>
</body>
</html>