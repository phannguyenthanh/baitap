@extends('layout')
@section('content')

    <div>
        <h4>tạo bảng</h4>
    </div>


    <div>
        @if(count($errors)>0)
            <div style="color:red;">
                @foreach($errors->all() as $value)
                    {{$value}}
                    <br>
                @endforeach
            </div>
        @endif
        @if(session('alert'))
			<div style='color:green' >
				{{session('alert')}}
			</div>
			@endif
    </div>
    <div>
        <form action="/Admin/Account/add" method="post">
        <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            <div>
                <label for="">tên</label>
                <input name="name" type="text">
            </div>
            <div>
                <label for="">ngày sinh</label>
                <input  name="birthday" type="date">
            </div>
            <div>
                <label for="">Địa chỉ</label>
                <input name="addr" type="text">
            </div>
            <div>
                <label for="">xã/phường</label>
                
                    <select name="wards_id" id="">
                        @foreach($wards as $value )
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>


                
            </div>
            <div>
                <label for="">tỉnh/huyện</label>
              
                    <select name="district_id" id="">
                        @foreach($district as $value )
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>


               
            </div>
            
            
            <div>
                <button>
                    submid
                </button>
            </div>
            
        </form>
    </div>
    <div style="margin-top:90px">
        <a href="/Admin/Account/list"> quay lại danh sách</a>
    </div>
@endsection