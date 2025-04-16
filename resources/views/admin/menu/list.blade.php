@extends('admin.main')
@section('content')
 <table class="table">
    <thead>
        <tr>
            <th>Thứ tự</th>
            <Th>Tên nhà sản xuất</Th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
         <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten}}</td>
            <td><button class="btn btn-success" > Xoa</button></td>
         </tr>
        @endforeach
    </tbody>
 </table>

@endsection