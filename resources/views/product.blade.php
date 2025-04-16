   @php
      $sphot = DB::table('san_pham')->select('id', 'ten', 'xem','hot','gia','giakm','hing')->limit(8)->orderByDesc('hot')->get();

   @endphp
   
   <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm Hot</span></h2>
        <div class="row px-xl-5">
            @foreach ($sphot as $hot )
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="/img/{{$hot->hing}}" alt="">
                        <div class="product-action">
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href='/detail/{{$hot->id}}'>{{$hot->ten}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5> {{number_format($hot->giakm,0, "," , ".")  }} VND</h5><h6 class="text-muted ml-2"><del>{{number_format($hot->gia) }}</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small><br> Số lượng lượt xem : ({{$hot->xem}})</small>
                        </div>
                        <form action="{{URL::to('/cart')}}" method="POST" >
                     {{csrf_field()}}
                        <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                          
                            <input type="number" name="soluong" class="form-control bg-secondary border-0 text-center" value="1">
                            <input type="hidden" name="idsp" class="form-control bg-secondary border-0 text-center" value="{{$hot->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm sản phẩm
                        </button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach



            
        </div>
    </div>