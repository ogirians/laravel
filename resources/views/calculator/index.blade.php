@extends('layouts.bowner')

@section('content')

<body class="align-content-center">
<h2 class="font-weight-bold">Form Penilaian Kinerja Kepala Bagian / Kepala Outlet</h2>
<form action="/calculator/store" method="post" class="col-lg-6 col-md-8 col-sm-10 col-xs-12 align-content-center">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nama">Nama Karyawan</label>
        <input type="text" class="form-control" name="name" required="required">
    </div>
    <label for="exampleFormControlSelect1">Jabatan</label>
          <select class="form-control" id="exampleFormControlSelect1" name="position" required="required" value="{{ old('jabatan') }}">
          <option></option>
          <option>Staff</option>
          <option>Driver/Helper</option>
          <option>Kepala Outlet/Divisi</option>
          
          </select><br/>
    <label for="exampleFormControlSelect1">Lokasi Kantor</label>
          <select class="form-control" id="exampleFormControlSelect1" name="location" required="required" value="{{ old('location') }}">
          <option>-</option>
          <option>Casia Karunia Jaya</option>
          <option>Kania 710</option>
          <option>Berkat Karunia Jaya</option>
          <option>UD. Menggala</option>
          <option>Tritan</option>
          <option>Tania Lombok</option>
          <option>Manna Sejahterah Galvalume</option>
          <option>IBI 1</option>
          <option>IBI 2</option>
          <option>Tania Tidar</option>
          <option>Anugerah Bajatama Manunggal</option>          
          </select><br/>
    <div class="form-group">
        <label for="nama">Waktu Ujian</label>
        <input type="date" class="form-control" name="pdate" required="required">
    </div>
    <div class="form-group">
        <label for="knowledge">Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
        <input type="number" class="form-control" name="knowledge" required="required">
    </div>
    <div class="form-group">
        <label for="wspeed">Kecepatan Kerja</label>
        <input type="number" class="form-control" name="wspeed" required="required">
    </div>
    <div class="form-group">
        <label for="wsoul">Kemampuan menyelesaikan pekerjaan</label>
        <input type="number" class="form-control" name="wsoul" required="required">
    </div>
    <div class="form-group">
        <label for="wqual">Kualitas hasil pekerjaan</label>
        <input type="number" class="form-control" name="wqual" required="required">
    </div>
    <div class="form-group">
        <label for="wpress">Prestasi kerja dibawah tekanan</label>
        <input type="number" class="form-control" name="wpress" required="required">
    </div>
    <div class="form-group">
        <label for="teamwork">Kerjasama</label>
        <input type="number" class="form-control" name="teamwork" required="required">
    </div>
    <div class="form-group">
        <label for="communicate">Komunikasi</label>
        <input type="number" class="form-control" name="communicate" required="required">
    </div>
    <div class="form-group">
        <label for="responbility">Tanggung jawab</label>
        <input type="number" class="form-control" name="responbility" required="required">
    </div>
    <div class="form-group">
        <label for="learning">Kemauan belajar</label>
        <input type="number" class="form-control" name="learning" required="required">
    </div>
    <div class="form-group">
        <label for="dicipline">Disiplin kerja</label>
        <input type="number" class="form-control" name="dicipline" required="required">
    </div>
    <div class="form-group">
        <label for="initiative">Inisiatif</label>
        <input type="number" class="form-control" name="initiative" required="required">
    </div>
    <div class="form-group">
        <label for="creativity">Kreatifitas</label>
        <input type="number" class="form-control" name="creativity" required="required">
    </div>
    <div class="form-group">
        <label for="honestly">Kejujuran</label>
        <input type="number" class="form-control" name="honestly" required="required">
    </div>
    <div class="form-group">
        <label for="obedience">Ketaatan</label>
        <input type="number" class="form-control" name="obedience" required="required">
    </div>
    <div class="form-group">
        <label for="loyalty">Loyalitas / Kehadiran</label>
        <input type="number" class="form-control" name="loyalty" required="required">
    </div>
    <div class="form-group">
        <label for="organate">Pengorganisasian</label>
        <input type="number" class="form-control" name="organate" required="required">
    </div>
    <div class="form-group">
        <label for="coaching">Pembinaan / Pengarahan</label>
        <input type="number" class="form-control" name="coaching" required="required">
    </div>
    <div class="form-group">
        <label for="controling">Pemeriksaan / Pengendalian</label>
        <input type="number" class="form-control" name="controling" required="required">
    </div>
    <div class="form-group">
        <label for="planing">Perencanaan</label>
        <input type="number" class="form-control" name="planing" required="required">
    </div>
    <div class="form-group">
        <label for="delegate">Pendelegasian</label>
        <input type="number" class="form-control" name="delegate" required="required">
    </div>
    
    <button type="submit" class="btn btn-warning" name="multiplication" value="*">Hasil</button>
    
</form>
</body>

@endsection