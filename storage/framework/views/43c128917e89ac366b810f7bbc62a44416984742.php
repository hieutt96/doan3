<?php $__env->startSection('content'); ?>
	<hr style="border-width: 2px;color: red;">
	<div class="row">
		<a href="<?php echo e(url('/')); ?>" style="font-size: 21px;"><h4 class="col-lg-2"><span class="glyphicon glyphicon-home"></span>Home</a></h4>
		<h3 class="col-lg-8 col-lg-offset-2 " >
			Phần Đăng Ký Dành Cho Doanh Nghiệp
		</h3>
	</div>
	<hr style="border-width: 2px; border-color: red;">
	<div class="row">
		<h4 class=" col-lg-8"><span class="glyphicon glyphicon-fire"></span> Đăng ký thông tin doanh nghiệp</h4>
	</div>
	<hr>
	<form method="POST" action="<?php echo e(route('dang-ky-dn.post')); ?>">
		<?php echo e(csrf_field()); ?>	
		<div class="row">
			<div class="col-lg-3">
				<img src="" style="height: 250px;width: 300px; border-radius: 10px;" >
				<div class="row">
					<button class="col-lg-offset-1 col-lg-10 btn btn-default">Chọn Ảnh</button>
				</div>
			</div>
			<div class="col-lg-8 col-lg-offset-1">
				<div class="form-group <?php echo e($errors->has('tenconty') ? ' has-error' : ''); ?>">
					<label  class="col-lg-2 control-label">Tên Công Ty:</label>
					<div class="col-lg-9">
						<input type="text" name="tencongty" placeholder="..." class=" form-control" required>
					</div>					
           			<?php if($errors->has('tencongty')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('tencongty')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br>
				<div class="form-group <?php echo e($errors->has('diachi') ? ' has-error' : ''); ?>">
					<label class="col-lg-2 control-label">Địa Chỉ :</label>
					<div class="col-lg-9">
						<textarea name="diachi" placeholder="..." class="form-control" required></textarea>
					</div>

           			<?php if($errors->has('diachi')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('diachi')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br><br>
				<div class="form-group <?php echo e($errors->has('namthanhlap') ? ' has-error' : ''); ?>">
					<label class="col-lg-3 control-label">Năm thành lập :</label>
					<div class="col-lg-2">
						<input type="number" name="namthanhlap" placeholder="..." class="form-control" required>
					</div>

           			<?php if($errors->has('namthanhlap')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('namthanhlap')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br>
				<div class="form-group <?php echo e($errors->has('sonhanvien') ? ' has-error' : ''); ?>">
					<label class="col-lg-3 control-label" >Số lượng nhân viên :</label>
					<div class="col-lg-2">
						<input type="number" name="sonhanvien" placeholder="..." class="form-control" required>
					</div>

           			<?php if($errors->has('sonhanvien')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('sonhanvien')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br>
				<div class="form-group <?php echo e($errors->has('sonhanvienit') ? ' has-error' : ''); ?>">
					<label class="col-lg-4 control-label">Số lượng nhân viên CNTT :</label>
					<div class="col-lg-2">
						<input type="number" name="sonhanvienit" placeholder="..." class="form-control" required>
					</div>

           			<?php if($errors->has('sonhanvienit')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('sonhanvienit')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br>
				<div class="form-group <?php echo e($errors->has('mota') ? ' has-error' : ''); ?>">
					<label class="col-lg-3 control-label">Mô tả ngắn về công ty :</label>
					<div class="col-lg-8">
						<textarea class="form-control" placeholder="..." name="mota"></textarea>
					</div>

           			<?php if($errors->has('mota')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('mota')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div>
		</div><br><hr style="border-color: red;">
		<div >
			<div class="row">
				<label class="control-label" style="font-size: 18px;"><span class="glyphicon glyphicon-info-sign"></span> Thông tin liên hệ :</label>
			</div><hr>
			<div class="row">
				<div class="form-group col-lg-offset-2 <?php echo e($errors->has('hotennvpt') ? ' has-error' : ''); ?>">
					<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span> Họ tên nhân viên phụ trách thực tập :</label>
					<div class="col-lg-6">
						<input type="text" name="hotennvpt" placeholder="..." required class="form-control">
					</div>

           			<?php if($errors->has('hotennvpt')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('hotennvpt')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br>
				<div class="form-group col-lg-offset-2 <?php echo e($errors->has('sodienthoai') ? ' has-error' : ''); ?>">
					<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span>Số điện thoại :</label>
					<div class="col-lg-6">
						<input type="text" name="sodienthoai" placeholder="..." class="form-control" required>
					</div>

           			<?php if($errors->has('sodienthoai')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('sodienthoai')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br>
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('emailnv') ? ' has-error' : ''); ?>">
					<label class="control-label col-lg-3"><span class="glyphicon glyphicon-star"></span>Email</label>
					<div class="col-lg-6">
						<input type="text" name="emailnv" placeholder="..." class="form-control">
					</div>

           			<?php if($errors->has('emailnv')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('emailnv')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div>
		</div>
		<div><br><hr style="border-color: red;">
			<div class="row">
				<label style="font-size: 18px;"><span class="glyphicon glyphicon-info-sign"></span> Đăng ký thông tin chi tiết :</label>
			</div><br>
			<div class="row">
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('diachithuctap') ? ' has-error' : ''); ?>">
					<label class="col-lg-2 control-label">Địa chỉ thực tập :</label>
					<div class="col-lg-6">
						<input type="text" name="diachithuctap" placeholder="..." required class="form-control">
					</div>

           			<?php if($errors->has('diachithuctap')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('diachithuctap')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('thoigiantt') ? ' has-error' : ''); ?>">
					<label class="col-lg-2 control-label">Thời gian mong muốn:</label>
					<div class="col-lg-6">
						<select name="thoigiantt" required class="form-control">
							<option value=""></option>
							<option value="fullTime">Full time</option>
							<option value="partTime">Part time</option>
						</select>
					</div>

           			<?php if($errors->has('thoigiantt')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('thoigiantt')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('linhvuchoatdong') ? ' has-error' : ''); ?>">
					<label class="col-lg-2 control-label">Lĩnh vực hoạt động </label>
					<div class="col-lg-6">
						<input type="text" name="linhvuchoatdong" placeholder="..." required class="form-control">
					</div>

           			<?php if($errors->has('linhvuchoatdong')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('linhvuchoatdong')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('congnghedaotao') ? ' has-error' : ''); ?>">
					<label class="col-lg-2 control-label">Công nghệ có thể đào tạo:</label>
					<div class="col-lg-6">
						<input type="text" name="congnghedaotao" placeholder="..." required class="form-control">
					</div>

           			<?php if($errors->has('congnghedaotao')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('congnghedaotao')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('soluong') ? ' has-error' : ''); ?>">
					<label class="col-lg-4 control-label">Số lượng sinh viên có thể nhận :</label>
					<div class="col-lg-4">
						<input type="text" name="soluong" placeholder="..." required class="form-control">
					</div>

           			<?php if($errors->has('soluong')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('soluong')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('yeucau') ? ' has-error' : ''); ?>">
					<label class="col-lg-2 control-label">Yêu cầu về chuyên môn:</label>
					<div class="col-lg-6">
						<input type="text" name="yeucau" placeholder="..."  class="form-control">
					</div>

           			<?php if($errors->has('yeucau')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('yeucau')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div><br>


			<div class="row">
				<div class="col-lg-offset-2 form-group <?php echo e($errors->has('yeucaungoaingu') ? ' has-error' : ''); ?>">
					<label class="col-lg-2 control-label">Yêu cầu về ngoại ngữ:</label>
					<div class="col-lg-6">
						<input type="text" name="yeucaungoaingu" placeholder="..."  class="form-control">
					</div>

           			<?php if($errors->has('yeucaungoaingu')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('yeucaungoaingu')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div><br>

			<!-- Them sau -->

		</div><hr style="border-color: red;">
		<div>
			<div class="row">
				<label style="font-size: 18px;"><span class="glyphicon glyphicon-star-empty"></span>  Đăng ký tài khoản :</label>
			</div><hr>
			<div class="row">
				<div class="form-group col-lg-offset-2 <?php echo e($errors->has('emaildn') ? ' has-error' : ''); ?>">
					<label class="control-label col-lg-2">Email Đăng Nhập :</label>
					<div class="col-lg-5">
						<input type="email" name="emaildn" placeholder="..." class="form-control" required>
					</div>

           			<?php if($errors->has('emaildn')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('emaildn')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div><br><br>
				<div class="form-group col-lg-offset-2 <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
					<label class="control-label col-lg-2">Password :</label>
					<div class="col-lg-5">
						<input type="password" name="password" class="form-control" required>

           			<?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                   <?php endif; ?>
					</div>
				</div><br><br>

				<div class="form-group col-lg-offset-2 <?php echo e($errors->has('re-password') ? ' has-error' : ''); ?>">
					<label class="control-label col-lg-2">Re-Password :</label>
					<div class="col-lg-5">
						<input type="password" name="re-password" class="form-control" required>
					</div>

           			<?php if($errors->has('re-password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('re-password')); ?></strong>
                        </span>
                   <?php endif; ?>
				</div>
			</div>
		</div><br><br>
		<div class="row">
			<div class="col-lg-offset-3 col-lg-4">
				<button class="btn btn-info col-lg-12" type="submit">Submit</button>
			</div>

		</div>
	</form>
	<hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>