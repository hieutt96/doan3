@extends('layouts.'.$userType.'_layout')

@section('content')

    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-6">
            <div class="row">
                <h3>Gửi thông báo</h3>
                <form action="/{{$userType}}/gui-tb" method="post">
                    {{ csrf_field() }}
                    {{--check PM, Leader dang dang nhap de lay id--}}
                    {{--input duoi day la tam thoi--}}
                    <input name="nguoiGui" value="{{Auth::user()->id}}" type="hidden">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="control-label" for="user">Chọn kiểu người nhận</label>
                                <select id="user" name="nguoiNhan" class="form-control" required>
                                    @for ($i = 0; $i < count($receUsers); $i++)
                                        <option value="{{$i}}">{{$receUsers[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-7">
                                {{--<label class="control-label" for="tenNguoi">Chọn tên người nhận</label>--}}
                                {{--<select id="tenNguoi" class="form-control" required>--}}
                                {{--<option value="0">User 1</option>--}}
                                {{--<option value="1">User 2</option>--}}
                                {{--<option value="2">User 3</option>--}}
                                {{--<option value="3">User 4</option>--}}
                                {{--</select>--}}
                            </div>
                        </div>
                        <label for="name">Tên Thông Báo:</label>
                        <input name="tenTB" class="form-control" id="name">

                        <label for="comment">Nội Dung:</label>
                        <textarea name="noiDung" class="form-control" rows="5" id="comment"></textarea>
                        <button type="submit" class="btn btn-success">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection