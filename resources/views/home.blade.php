  @extends('index')
  @section('noidung')
  @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
  </div>
 @endif
    @include('slide')
    <!-- Carousel End -->
    <!-- Featured Start -->
    <!-- Featured End -->
    <!-- Categories Start -->
    <!-- Categories End -->
    <!-- Products Start -->
    @include('product')
    <!-- Products End -->
    <!-- Offer Start -->
    @include('offer')
    <!-- Offer End -->
    <!-- Products Start -->
    @include('product2')
    <!-- Products End -->
   @endsection
   
  @section('tieude')
   Trang chủ
  
  @endsection