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
                <span class="breadcrumb-item active">Thanh toán</span>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin thanh toán</span></h5>
            <form action="" method="POST">
                @csrf
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
                </div>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Đơn hàng của bạn</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('cart') as $idsp => $item)
                                    <tr>
                                        <td class="align-middle">{{ $item['ten'] }}</td>
                                        <td class="align-middle">{{ number_format($item['gia'], 0, ',', '.') }} VND</td>
                                        <td class="align-middle">{{ $item['soluong'] }}</td>
                                        <td class="align-middle">{{ number_format($total = $item['soluong'] * $item['gia'], 0, ',', '.') }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tạm tính</h6>
                            <h6>{{ number_format($tongsp, 0, ',', '.') }} VND</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Mã giảm giá</h6>
                            <h6 class="font-weight-medium">0 VND</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng cộng</h5>
                            <h5>{{ number_format($tongsp, 0, ',', '.') }} VND</h5>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức thanh toán</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="payment-1" name="payment-method" value="cod" checked>
                        <label class="custom-control-label" for="payment-1">Thanh toán khi nhận hàng</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="payment-2" name="payment-method" value="online">
                        <label class="custom-control-label" for="payment-2">Thanh toán online</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('tieude')
Thanh toán
@endsection