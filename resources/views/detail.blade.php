@php
    $list = DB::table('san_pham')->select('id','ten','hing','gia','giakm','xem')->orderByDesc('xem')->limit(7)->get(); 
@endphp
@extends('index')
@section('noidung')

<!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    <!-- Breadcrumb End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="/img/{{$data->hing}}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
        
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{$data->ten}}</h3>
                    <div class="d-flex mb-3">
                        <small class="pt-1">Số lượt xem :  ({{$data->xem}})</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{number_format($data->giakm,0, "," , ".") }} VND</h3>
                    <p class="mb-4"> Những sản phẩm được tạo từ các bậc thầy thủ công tỷ mỹ và sử dụng những nguyên liệu bền nhất</p>
                   <p>  Màu sắc : {{$data->mausac}}</p>
                   <p> Cân nặng {{$data->cannang}}</p>
                    <form action="{{URL::to('/cart')}}" method="POST" >
                     {{csrf_field()}}
                        <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="number" name="soluong" class="form-control bg-secondary border-0 text-center" value="1">
                            <input type="hidden" name="idsp" class="form-control bg-secondary border-0 text-center" value="{{$data->id}}">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm sản phẩm
                        </button>
                    </div>
                    </form>
                    
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Giới thiệu về shop</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Đánh giá</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Giới thiệu về sản phẩm</h4>
                            <p class="fs-2" >Chào mừng quý khách đến với Shop! Đây là một sản phẩm độc đáo, được thiết kế để đáp ứng các nhu cầu ngày càng cao của khách hàng trong thời đại công nghệ hiện nay.

<p> Shop được trang bị các tính năng hiện đại và tiên tiến nhất, mang lại trải nghiệm sử dụng tuyệt vời cho người dùng. Với thiết kế thanh lịch, hiện đại, sản phẩm không chỉ đáp ứng tốt các yêu cầu về chức năng mà còn tạo nên vẻ đẹp sang trọng, làm nổi bật không gian sống của bạn.
</p>
<p>Bên cạnh đó, Shop cũng được chú trọng về khía cạnh công nghệ. Các giải pháp kỹ thuật tiên tiến được tích hợp trong sản phẩm, giúp nâng cao hiệu suất hoạt động, tiết kiệm năng lượng và bảo vệ môi trường. Người dùng sẽ cảm nhận được sự tiện lợi, tối ưu hóa trong quá trình sử dụng.
</p>
<p>Với cam kết về chất lượng và dịch vụ khách hàng tuyệt vời, Chúng tôi tự hào giới thiệu Shop như một lựa chọn hoàn hảo dành cho quý khách. Hãy trải nghiệm sản phẩm ngay hôm nay và khám phá những điều kỳ diệu mà nó mang lại!</p>
</p>                        </div>
                      
                        <div class="tab-pane fade" id="tab-pane-3">
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">Những đánh giá của sản phẩm này</h4>
                                    @foreach ($binh_luan_arr as $bl )
                                        <div class="media mb-4">
                                            <div class="media-body">
                                                <h6>{{$bl->user->name}}<small> - <i>{{ gmdate('d/m/Y H:m:s', strtotime($bl->thoi_diem)+3600*7)}}</i></small></h6>
                                                <p>{{$bl->noi_dung}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Gửi đánh giá</h4>
                                    <small>Hãy cho chúng tôi biết bạn suy nghĩ gì về sản phẩm này</small>
                                    <form method="post" action="{{URL::to('/luubinhluan')}}">
                                    @csrf  
                                        <div class="form-group">
                                            <label for="message">Nội dung</label>
                                            <textarea id="message" placeholder="Mời nhập bình luận" name="noidung" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="hidden" name="id_sp" value="{{$data->id}}">
                                           
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi bình luận" class="btn btn-primary px-3">
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Có thể bạn sẻ thích</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($list as $slide )
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="/img/{{$slide->hing}}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href='/detail/{{$slide->id}}'>{{$slide->ten}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{$slide->giakm}}</h5><h6 class="text-muted ml-2"><del>{{number_format($slide->gia,0, "," , ".") }}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>{{$slide->xem}}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
@section('tieude')
Chi tiết sản sản phẩm 
@endsection

