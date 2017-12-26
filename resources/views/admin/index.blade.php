@extends('layouts.admin')
@section('content_right')
    <div class="row">
        <form method="get" action="{{route('admin-dashboard')}}" id="formFilter">
            <div class="col-lg-offset-4 col-lg-6">               
                {{csrf_field()}}
                <input type="text" name="search" placeholder="Tìm Kiếm Công Ty" class="form-control"  @if($search) value="{{$search}} @endif">              
            </div>
            <div class="col-lg-2">
                <button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </div>
        </form>
    </div>
    <div class="row col-lg-offset-8 col-lg-2" style="margin-top: 5px;">
            <select name="semester_id" form="formFilter" class="form-control" onchange="this.form.submit()">
                @foreach($semesters as $semester)
                    <option value="{{$semester->id}}" @if($semester_id == $semester->id) selected @endif>
                        {{$semester->ten_hoc_ki}}
                    </option>
                @endforeach
            </select>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <?php $i=1; ?>
                <th>STT</th>
                <th>Tên Công Ty</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Công Nghệ Đào Tạo</th>
                <th>SV có thể nhận</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($company_accepts as $company_accept)
                    <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td>{{$company_accept->name}}</td>
                        <td>{{$company_accept->diaChi}}</td>
                        <td>{{$company_accept->phone}}</td>
                        <td>{{$company_accept->congNgheDaoTao}}</td>
                        <td>{{$company_accept->soLuongSinhVienTT}}</td>
                        <td>
                            <button class="delete">Xóa</button>
                            <input type="hidden" value="{{$company_accept->id}}">
                            <button class=""><a href="/hop-tac-doanh-nghiep/{{$company_accept->id}}">Chi Tiết</a></button>
                        </td>
                    </tr>
                @endforeach
                {{$company_accepts->links()}}
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/js/admin/index.js')}}"></script>
@endsection