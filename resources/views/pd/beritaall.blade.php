@extends('pd.front-master')

@section('konten')

<div class="row">
<div class="col-xl-4 col-lg-5">
             <div class="col-xl-3 col-md-6 mb-4" style="max-width:100%;">
              <div class="card border-left-primary shadow h-100 py-2" style="margin-bottom:20px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center"  style="padding-bottom: 60px; height: 150px;">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pajak</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800">lihat rekapan berita acara (pajak)
              

                      </div>
                          
                    </div>
                  </div>

                           <a href="/berita" class="btn btn-primary btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Daftar Berita acara (pajak)</span>
                          </a>
                </div>
              </div>
              </div>
            
             <div class="col-xl-3 col-md-6 mb-4" style="max-width:100%;">
            <!-- Earnings (Monthly) Card Example -->

              <div class="card border-left-success shadow h-100 py-2" style="margin-bottom:20px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center" style="padding-bottom: 60px; height: 150px;">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Non Pajak</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800" >lihat rekapan berita acara (non-pajak)
                      
                      </div> 
                    </div>
                  </div>
                     <a href="/beritanp" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Daftar Berita acara (NP)</span>
                      </a>
                </div>
              </div>
            </div>
</div>
              
            <div class="col-xl-8 col-lg-7">
                
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/c8vIBILmjrA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

</div>
@endsection
     


            
  
        

   