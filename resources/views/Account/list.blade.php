
@extends('layout')
@section('content')
<div>
<form action="/Admin/Account/search" method="post">
    <input type="hidden"  name="_token" value="{{csrf_token()}}" >
    <input type="text" name="seach" >
    <button>
        tìm
    </button>
    </form>
   
    @if(isset($seach))
        <div>
            tìm từ khoá : {{$seach}}
        </div>
    @endif
</div>
<div>
    <a href="/Admin/Account/add">
        tạo mới
    </a>
</div>
<div>

 
<table>
    <thead>
    <tr>  
        <th>id</th>
        <th>name</th>
        <th>birthday</th>
        <th>addr</th>
        <th>wards</th>
        <th>district</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($account as $value)
        <tr>
            <td> {{$value->id}} </td>
            <td> {{$value->name}} </td>
            <td> {{$value->birthday}} </td>
            <td> {{$value->addr}} </td>
            <td> {{$value->Wards->name}} </td>
            <td> {{$value->district->name}} </td>
            <td>
                <a href="/Admin/Account/edit/{{$value->id}}">sửa</a>
                <a href="/Admin/Account/remove/{{$value->id}}">xoá</a>
            </td>
        </tr>
        @endforeach
    </tbody>
   
</table>
<style>
  
    .pagination{

        display:inline;

        margin:0 auto;
    }
    .pagination li{

        display:inline-block;

        width:30px;

        height:30px;

        line-height:30px;

        background:#e5e5e5;

        color:black;
    }
</style>
<div>

{{$account->links()}}
</div>

@if(isset($seach))
        <div>
        <a href="/Admin/Account/list"> quay lại danh sách</a>
        </div>
@endif

@endsection


