@extends('pd.master')

@section('edit')
        
        
        
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center"  style="padding-bottom: 60px; height: 150px;">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pajak</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800">Untuk memasukkan atau menambahkan berita acara pajak baru
              

                      </div>
                          
                    </div>
                  </div>

                           <a href="/dosa" class="btn btn-primary btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Daftar Berita acara (pajak)</span>
                          </a>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center" style="padding-bottom: 60px; height: 150px;">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Non Pajak</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800" >Untuk melihat atau menambahkan daftar berita acara Np baru
                      
                      </div> 
                    </div>
                  </div>
                     <a href="/dosanp" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Daftar Berita acara (NP)</span>
                      </a>
                </div>
              </div>
            </div>


            

            </div>

@endsection