<?php $__env->startSection('content'); ?>
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="/pm/21">Thông tin chi tiết</a></li>
            <li role="presentation"><a href="/pm/22">Sinh Viên Hướng Dẫn Thực Tập</a></li>
        </ul>
    </div>
    <div class="row" style="padding-top: 10px">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <div class="media-left">
                        <a href="#">
                            <img class="img-thumbnail" height="300"
                                 src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/21150313_1983255908612615_7984369144769509920_n.jpg?oh=e7d602814b22e5004923d1083533c9a5&oe=5A7B87B1">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <ul class="list-group">
                        <li class="list-group-item">Phòng ban: <b>Development</b></li>
                        <li class="list-group-item">Chức vụ: <b>Leader</b></li>
                        <li class="list-group-item">Lĩnh vực làm việc: <b>Lập trình IOS</b></li>
                        <li class="list-group-item">Họ tên: <b>Nene</b></li>
                        <li class="list-group-item">Giới tính: <b>Nữ</b></li>
                    </ul>
                </div>
            </div>
            <div class="row" style="padding-right: 15px">
                <ul class="list-group">
                    <li class="list-group-item">Ngày sinh: <b>22/01/1999</b></li>
                    <li class="list-group-item">Địa chỉ đang ở: <b>Yên lạc, Kim Ngưu, HBT, Hà Nội</b></li>
                    <li class="list-group-item">Sô điện thoại: <b>01235214523</b></li>
                    <li class="list-group-item">Tài khoản: <b>nene1234@gmail.com</b></li>

                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <ul class="list-group">
                    <li class="list-group-item">Laptop: <b>Có</b></li>
                    <li class="list-group-item">Thời gian làm việc: <b>Fulltime</b></li>
                    <li class="list-group-item">Ngày bắt đầu: <b>22/11/2011</b></li>
                    <li class="list-group-item">Ngày kết thúc: <b></b></li>
                    <li class="list-group-item">Số CMT: <b>123456789</b></li>
                    <li class="list-group-item">Ngày cấp: <b>11/22/2012</b></li>
                    <li class="list-group-item">Nơi cấp: <b>ThaiLand</b></li>
                    <li class="list-group-item">Mã bảo hiểm: <b>9869586235</b></li>
                    <li class="list-group-item">Mã thuế cá nhân: <b>12451263584</b></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button data-target="#suaTT" data-toggle="modal" type="button" class="btn btn-primary">Sửa thông tin</button>
            
            <div id="suaTT" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Sửa thông tin nhân viên</b></h4>
                        </div>
                        <div class="modal-body" style="padding-left: 30px; padding-right: 30px">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tên nhân viên:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="Tên cũ ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chucVu" class="control-label col-sm-3">Chức vụ:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="chucVu">
                                            <option value="0">Developer</option>
                                            <option value="1">Leader</option>
                                            <option value="2">Fresher</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phongBan" class="control-label col-sm-3">Phòng ban:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="phongBan">
                                            <option value="0">Design</option>
                                            <option value="1">Back-end</option>
                                            <option value="2">Front-end</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="Email cu ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Ngày bắt đầu:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="Ngày cũ ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Ngày kết thúc:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success" href="#">Lưu</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <button data-target="#xoaNV" data-toggle="modal" type="button" class="btn btn-danger">Xóa</button>
            
            <div id="xoaNV" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Xóa nhân viên</b></h4>
                        </div>
                        <div class="modal-body">
                            <p>Bạn chắc chắn xóa nhân viên [Tên nhân viên] không?
                                Nếu xóa bạn sẽ không còn bất cứ thông tin nào liên quan
                                đến nhân viên này.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" href="#">Xóa</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Hủy bỏ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pm_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>