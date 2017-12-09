@extends('layouts.'.$userType.'_layout')

@section('content')
    <div class="panel-heading" style="background-color:#263c65; color:white;">
        <h3 style="margin-top:0px; margin-bottom:0px;">Gửi Thông Báo</h3>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-1"></div>

        <div class="col-md-8">
            <div class="row">
                <form action="/{{$userType}}/gui-tb" method="post">
                    {{ csrf_field() }}
                    <input name="nguoiGui" value="{{Auth::user()->id}}" type="hidden">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-7">
                                <label class="control-label" for="user">Chọn kiểu người nhận</label>
                                <select id="user" name="nguoiNhan" class="form-control" required>
                                    @for ($i = 0; $i < count($receUsers); $i++)
                                        <option value="{{$i+2}}">{{$receUsers[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-5">
                            </div>
                        </div>
                        <label for="name">Tên Thông Báo:</label>
                        <input name="tenTB" class="form-control" id="name" required>

                        <label for="comment">Nội Dung:</label>
                        <textarea name="noiDung" class="form-control ckeditor" rows="7" id="comment" required></textarea>
                        <button style="margin-top: 10px" type="submit" class="btn btn-success">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
