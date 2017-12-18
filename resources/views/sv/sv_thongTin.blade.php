@extends('layouts.'.$userType.'_layout')

@section('content')

    <div class="panel-body">

        <div class="row">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="/{{$userType}}/sv/{{$student->id}}/thong-tin">Thông tin
                        chi tiết</a>
                </li>
                <li role="presentation"><a href="/{{$userType}}/sv/{{$student->id}}/cong-viec">Công việc</a></li>
                <li role="presentation"><a href="/{{$userType}}/sv/{{$student->id}}/ket-qua">Kết quả đánh giá</a></li>
            </ul>
        </div>

        
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-4">
                <div class="form-group profile-image">
                    <img style="border:1px solid gray;" width="200" height="200" src="{!!$student->user->picture!!}" class="attachment-thumbnail size-thumbnail">
                </div>
                <div class="form-group profile-name ">
                    <p><b>{!!$student->user->name!!}</b></p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <label class="control-label">MSSV:</label> {!!$student->mssv!!}
                </div><hr>
                <div class="form-group">
                    <label class="control-label">Khóa:</label> {!!$student->grade!!}
                </div><hr>
                <div class="form-group">
                    <label class="control-label">Chương trình:</label> {!!$student->ctdt!!}
                </div><hr>
                <div class="form-group">
                    <label class="control-label">Lĩnh vực thực tập:</label> {!!$student->knlt_thanhthao!!}
                </div><hr>
                <div class="form-group">
                    <label class="control-label">Số điện thoại:</label> {!!$student->phone!!}
                </div><hr>
                <div class="form-group">
                    <label class="control-label">Email:</label> {!!$student->user->email!!}
                </div><hr>
                <div class="form-group">
                    <label class="control-label">Địa chỉ:</label> {!!$student->address!!}
                </div>

            </div>
        </div>
    </div>

@endsection