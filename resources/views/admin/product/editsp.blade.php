@extends('admin.main')

@section ('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm vào danh sách sản phẩm</h3>
              @if (Session::has('success'))
              @endif
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="{{URL::to('admin/product/spedit')}}" method="POST" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Tên sản phẩm</label>
                        <textarea id="inputDescription" name="ten" class="form-control" rows="1">{{$data->ten}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Giá</label>
                        <textarea id="inputDescription" name="gia" class="form-control" rows="1">{{$data->gia}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription"  >Giá khuyến mãi</label>
                        <textarea id="inputDescription" name="giakm" class="form-control" rows="1">{{$data->giakm}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">ID nhà sản xuất</label>
                        <select id="inputStatus" name="idnhasx" class="form-control custom-select">
                        <option selected="" disabled="">{{$data->idnhasx}}</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">URL Hình</label>
                        <textarea id="inputDescription" name="hing" class="form-control" rows="1">{{$data->hing}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Lượt xem</label>
                        <input type="number" name="xem" id="inputClientCompany" class="form-control" value="{{$data->xem}}">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Độ Hot</label>
                        <select id="inputStatus" name="hot" class="form-control custom-select">
                        <option selected=""  disabled="">{{$data->hot}}</option>
                        <option>0</option>
                        <option>1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Ẩn hiện</label>
                        <select id="inputStatus" name="anhien"  class="form-control custom-select">
                        <option selected="" disabled="">{{$data->anhien}}</option>
                        <option>0</option>
                        <option>1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Tính chất</label>
                        <select id="inputStatus"name="tinhchat" class="form-control custom-select">
                        <option selected=""  disabled="">{{$data->tinhchat}}</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Ngày thêm vào</label>
                        <input type="date" name="ngay" id="inputClientCompany" class="form-control" value="{{$data->ngay}}">
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Màu sắc</label>
                        <input type="text" name="mausac" id="inputProjectLeader" class="form-control" value="{{$data->mausac}}">
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Cân nặng</label>
                        <input type="text" name="cannang" id="inputProjectLeader" class="form-control" value="{{$data->cannang}}">
                    </div>
                    <input type="submit" value="Lưu sản phẩm đã sửa" class="btn btn-success">
                </div>
            </form>
          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
@endsection
@section('footer')
<script>
    CKEDITOR.replace('content');
</script>
@endsection
