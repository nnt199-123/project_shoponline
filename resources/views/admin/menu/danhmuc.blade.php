@extends('admin.main')

@section ('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="card card-primary mt-2">
              <!-- form start -->
              <form action="{{URL::to('admin/adddanhmuc')}}" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" class="form-control" name="ten" placeholder="Nhập tên danh mục">
                  </div>

                  <div class="form-group">
                    <label>Danh Sách Danh Mục</label>
                    <select class="form-control" name="parent_id" id="">
                          <option value="0"> Danh Mục</option>
                          @foreach ( $menus as $menu )
                          <option value="{{$menu->id}}"> {{$menu->ten}}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" name="anhien" id="active" type="radio" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" id="no_active" name="anhien" type="radio">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
                </div>
                @csrf
              </form>
            </div>
@endsection
@section('footer')
<script>
    CKEDITOR.replace('content');
</script>
@endsection
