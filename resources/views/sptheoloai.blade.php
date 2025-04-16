   
   @extends('index')
   @section('noidung')

  <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">{{$loai}}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col">
                <div class="row pb-3">
                    @foreach ($data as $row )
                     <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="/img/{{$row->hing}}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href='/detail/{{$row->id}}'>{{$row->ten}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{number_format($row->giakm,0, "," , ".") }} VND</h5><h6 class="text-muted ml-2"><del>{{number_format($row->gia) }}</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    Lượt xem
                                    <small>({{$row->xem}})</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   {{ $data->onEachSide(10)->links() }}
                    <div class="col-12 p-2">
                          <ul class="justify-content-center p-2">
                            
                          </ul>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
   @endsection
   @section('tieude')
   Sản phẩm theo loại {{$loai}}
   
   @endsection
   
 