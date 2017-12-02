<?php $__env->startSection('content'); ?>
    <div class="row" style="margin-left: 5px">
        <div class="col-md-9">
            <?php for($i=0; $i<10; $i++): ?>
                <div class="row" style="padding-bottom: 10px">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="datePost row">22</div>
                            <div class="monthPost row">AUGUST</div>
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <h4>Danh sách phân công và đăng ký thực tập bổ sung kỳ học 20171 - Thông báo số 2</h4>
                            </div>
                            <div class="row">
                                <h5>Đăng bởi: Admin</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Theo quyết định số 4179/QĐ-ĐHBK-SĐH ngày 05 tháng 10 năm 2016 của Hiệu trưởng Đại học Bách Khoa
                                Hà Nội, Bộ môn Hệ thống thông tin thông báo việc xét tuyển đào tạo Thạc sĩ theo định hướng
                                <a href="http://is.hust.edu.vn"><b><u>Xem Tiếp</u></b></a>
                            </p>
                        </div>

                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="col-md-3" style="background-color: #e7e7e7">
            <label class="control-label">Tìm kiếm</label>
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </div>
            <h4>Liên kết ngoài</h4>
            <h5><a href="http://soict.hust.edu.vn">Viện Công Nghệ Thông tin và truyền thông</a></h5>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dat_admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>