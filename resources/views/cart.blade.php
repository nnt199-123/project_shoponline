
@php 
   $total = 0;
@endphp

@extends('index')
@section('noidung')

<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Giỏ hàng của bạn</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    @if ($successMessage)
    <div class="alert alert-danger">
        {{ $successMessage }}
    </div>
    @endif
    <!-- Cart Start -->
    @if(session('cart'))
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       
                    <button  class="btn btn-primary d-none" type="button">{{$tongsp=0}}</button>
                            @foreach(session('cart') as $idsp => $item)                             
                                
                                
                                <tr rowId="{{ $idsp }}">
                                <td class="align-middle"><img src="/img/{{$item['hinh']}}" alt="" style="width: 50px;"> {{ $item['ten'] }}</td>
                                <td class="align-middle">{{number_format($item['gia'],0, "," , ".")}}</td>
                                <td class="align-middle">{{$item['soluong']}}</td>
                                <td class="align-middle">{{number_format($total=$item['soluong']*$item['gia'],0, "," , ".")}}VND
                                 <button  class="btn btn-primary d-none" type="button">{{$tongsp+=$total}}</button>
                                </td>
                                <td class="align-middle delete-product" data-id="{{ $idsp }}">
                                <form method="POST" action="{{URL::to('/delete', ['id' => $idsp]) }}">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"  type="submit"  onclick="return confirm('Bạn muốn xóa thật hả?')" ><i class="fa fa-times"></i></button> </td>
                                </form>
                                </tr>
                            @endforeach
                     
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <!-- <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div> -->
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tạm tính</h6>
                            <h6>{{number_format($tongsp,0, "," , ".")}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Mã giảm giá</h6>
                            <h6 class="font-weight-medium">0 đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5> {{number_format($tongsp,0, "," , ".")}}</h5>
                        </div>
                        <a href="/checkcart"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiêp tục thanh toán</button></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@section('tieude')
Giỏ hảng của bạn

@endsection
