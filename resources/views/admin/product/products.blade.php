@extends('admin.main')

@section ('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Cân nặng</th>
                    <th>Màu sắc</th>
                    <th>URL Hình</th>
                    <th>Ngày</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach ($data as $item )
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->ten}}</td>
                    <td>{{$item->gia}}</td>
                    <td>{{$item->giakm}}</td>
                    <td>{{$item->cannang}}</td>
                    <td> {{$item->mausac}}</td>
                    <td><img src="/img/{{$item->hing}}" style="width: 100px;" alt=""></td>
                    <td>{{$item->ngay}}</td>
                    <td>
                        <a href='admin/product/edit/{{$item->id}}' type="button" class="btn btn-primary">Sửa</a>
                        <form method="POST" action="{{URL::to('admin/product/delete', ['id' => $item->id]) }}">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn muốn xóa thật hả?')" >Xóa</button> </td>
                        </form>
                    </td>
                  </tr>
                   @endforeach 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>VND</th>
                    <th>VND</th>
                    <th>KG</th>
                    <th>Style</th>
                    <th>URL (nameimage.jpg)</th>
                    <th>Date</th>
                    <th>Thao tac</th>
                  </tr>
                  </tfoot>
                </table>
                {{ $data->onEachSide(10)->links() }}
              </div>
              <!-- /.card-body -->
            </div>
@endsection
@section('footer')
<script>
    CKEDITOR.replace('content');
</script>
@endsection
