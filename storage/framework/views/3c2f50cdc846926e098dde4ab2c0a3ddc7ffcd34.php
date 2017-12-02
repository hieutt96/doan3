<?php $__env->startSection('content'); ?>
	<hr style="border-color: red;">
	<div class="row col-lg-offset-4"> 
		<b><h2>Đăng Ký Dành Cho Sinh Viên</h2></b>
	</div>
	<hr style="border-width: 2px;">
	<div class="container">
		<form method="POST" action="<?php echo e(route('dang-ky-sv.post')); ?>">
			<?php echo e(csrf_field()); ?>			
			<div>
				<div class="col-lg-6">
					<b style="font-size: 16px;"><span class="glyphicon glyphicon-user"></span>  Thông Tin Sinh Viên</b>	
					<br><br>	
					<div class="col-lg-11 ">
						<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
							<label class="control-label ">Họ Và Tên:</label>
							<input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="..." required autofocus>
	               			<?php if($errors->has('name')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('name')); ?></strong>
	                            </span>
	                       <?php endif; ?>
						</div>
						<div class="form-group <?php echo e($errors->has('class') ? ' has-error' : ''); ?>">
							<label class="control-label">Lớp :</label>
							<input type="text" name="class" class="form-control" placeholder="..." value="<?php echo e(old ('class')); ?>" required>

	               			<?php if($errors->has('class')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('class')); ?></strong>
	                            </span>
	                        <?php endif; ?>
						</div>
						<div class="form-group <?php echo e($errors->has('grade')?'has-error' :''); ?>">
							<label class="control-label">Khóa :</label>
							<input type="text" name="grade" placeholder="..." class="form-control" value= "<?php echo e(old ('grade')); ?>" required>

	               			<?php if($errors->has('grade')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('grade')); ?></strong>
	                            </span>
	                       <?php endif; ?>
						</div>
						<div class="form-group">
							<label class="control-label">Chương Trình Đào Tạo :</label>
							<select name="ctdt" class="form-control" required>
								<option value=""></option>
								<option value="Kĩ Sư">Kĩ Sư</option>
								<option value="Cử Nhân">Cử Nhân</option>
								<option value="KSTS">KSTN</option>
								<option value="Chương Trình Tiên Tiến">Chương Trình Tiên Tiến</option>
								<option value="Việt - Nhật">Việt - Nhật</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Bộ Môn :</label>
							<select name="bm" class="form-control" required>
								<option value=""></option>
								<option value="1">Hệ Thống Thông Tin</option>
								<option value="2">Công nghệ phần mềm</option>
								<option value="3">Khoa Học Máy Tính</option>
								<option value="4">Truyền Thông Và Mạng Máy Tính</option>
								<option value="5">An Toàn Thông Tin</option>
								<option value="6">Kĩ Thuật Máy Tính</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4"> Giới tính :</label>
							<label class="radio-inline "><input type="radio" name="gender" value="1" required> Name</label>
							<label class="radio-inline"><input type="radio" name="gender" value="0"> Nữ</label>
						</div>
						<div class="form-group">
							<label class="control-label">Laptop* :</label>
							<select name="laptop" class="form-control" required>
								<option value=""></option>
								<option value="1"> Có </option>
								<option value="0">Không</option>
							</select>
						</div>
						<div class="form-group <?php echo e($errors->has('address')?'has-error' :''); ?>">
							<label class="control-label">Địa Chỉ Hiện Tại :</label>
							<input type="text" name="address" class="form-control" placeholder="..." value="<?php echo e(old('address')); ?>" required>
	               			<?php if($errors->has('address')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('address')); ?></strong>
	                            </span>
	                       <?php endif; ?>
						</div>
						<div class="form-group <?php echo e($errors->has('phone')?'has-error' :''); ?>">
							<label class="control-label">Số điện thoại :</label>
							<input type="text" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="..." class="form-control" required>
							<?php if($errors->has('phone')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('phone')); ?></strong>
	                            </span>
	                        <?php endif; ?>
						</div>
						<div class="form-group <?php echo e($errors->has('mail') ?'has-error':''); ?>">
							<label class="control-label"> Email liên hệ :</label>
							<input type="email" name="mail" value="<?php echo e(old('mail')); ?>" required class="form-control" placeholder="...">
							<?php if($errors ->has('mail')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('mail')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<b style="font-size: 16px;"><span class="glyphicon glyphicon-star"></span>Kỹ Năng</b><br><br>
					<div class="form-group <?php echo e($errors->has('cpa') ? 'has-error' : ''); ?>">
						<label class="control-label">Điểm trung bình CPA :</label>
						<input type="text" name="cpa" value="<?php echo e(old('cpa')); ?>" required class="form-control" placeholder="...">
						<?php if($errors->has('cpa')): ?>
							<span class="help-block"><strong><?php echo e($errors->first('cpa')); ?></strong></span>
						<?php endif; ?>
					</div>
					<div class="form-group <?php echo e($errors->has('english')?'has-error':''); ?>">
						<label class="control-label">Khả năng tiếng anh:</label>
						<textarea type="text" name="english" value="<?php echo e(old('english')); ?>"  class="form-control" placeholder="..."></textarea>
						<?php if($errors->has('english')): ?>
							<span class="help-block"><strong><?php echo e($errors->first('english')); ?></strong></span>
						<?php endif; ?>
					</div>
					<div class="form-group <?php echo e($errors->has('ep1')?'has-error':''); ?>">
						<label class="control-label">Kỹ năng lập trình - Có thể sử dụng:</label>
						<textarea  type="text" name="ep1" value="<?php echo e(old('ep1')); ?>" class="form-control" placeholder="..."></textarea>
						<?php if($errors->has('ep1')): ?>
							<span class="help-block"><strong><?php echo e($erros->first('ep1')); ?></strong></span>
						<?php endif; ?>
					</div>
					<div class="form-group <?php echo e($errors->has('ep2')?'has-error':''); ?>" >
							<label class="control-label">Kỹ năng lập trình - mức độ thành thạo:</label>
							<textarea  type="text" name="ep2" value="<?php echo e(old('ep2')); ?>"  class="form-control" placeholder="..."></textarea>
							<?php if($errors->has('ep2')): ?>
								<span class="help-block"><strong><?php echo e($errors->first('ep2')); ?></strong></span>
							<?php endif; ?>
					</div>					
					<div class="form-group <?php echo e($errors->has('ep3')?'has-error':''); ?>" >
							<label class="control-label">Kỹ năng lập trình - mức độ làm chủ được công nghệ,có kinh nghiệm thực tế tốt:</label>
							<textarea  type="text" name="ep3" value="<?php echo e(old('ep3')); ?>"  class="form-control" placeholder="..."></textarea>
							<?php if($errors->has('ep3')): ?>
								<span class="help-block"><strong><?php echo e($errors->first('ep3')); ?></strong></span>
							<?php endif; ?>
					</div>

					<div class="form-group <?php echo e($errors->has('ep4')?'has-error':''); ?>" >
							<label class="control-label">Kỹ năng quản trị hệ thống ,quản trị mạng:</label>
							<textarea  type="text" name="ep4" value="<?php echo e(old('ep4')); ?>"  class="form-control" placeholder="..."></textarea>
							<?php if($errors->has('ep4')): ?>
								<span class="help-block"><strong><?php echo e($errors->first('ep4')); ?></strong></span>
							<?php endif; ?>
					</div>

					<div class="form-group <?php echo e($errors->has('ep5')?'has-error':''); ?>" >
							<label class="control-label">Kỹ năng khác nếu có:</label>
							<textarea  type="text" name="ep5" value="<?php echo e(old('ep5')); ?>"  class="form-control" placeholder="..."></textarea>
							<?php if($errors->has('ep5')): ?>
								<span class="help-block"><strong><?php echo e($errors->first('ep5')); ?></strong></span>
							<?php endif; ?>
					</div>

					<div class="form-group <?php echo e($errors->has('cty')?'has-error':''); ?>" >
							<label class="control-label">Các công ty đã thực tập :</label>
							<textarea  type="text" name="cty" value="<?php echo e(old('cty')); ?>"  class="form-control" placeholder="..."></textarea>
							<?php if($errors->has('cty')): ?>
								<span class="help-block"><strong><?php echo e($errors->first('cty')); ?></strong></span>
							<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="row">
						<b style="font-size: 20px; color: red;">Lĩnh vực mong muốn thực tập:</b>
					</div><br>
					<div class="col-lg-4 col-lg-offset-3">
						<input type="checkbox" name="favorite[]" value="Mobie Android">
						<label>Mobie Android</label><br><br>
						<input type="checkbox" name="favorite[]" value="Mobie IOS">
						<label>Mobie IOS</label><br><br>
						<input type="checkbox" name="favorite[]" value="JAVA Programming">
						<label>JAVA Programming</label><br><br>
						<input type="checkbox" name="favoritep[]" value="NET Programming">
						<label>NET Programming</label><br><br>
						<input type="checkbox" name="favorite[]" value="PHP Programming">
						<label>PHP Programming</label><br><br>
					</div>
					<div class="col-lg-4">
						<input type="checkbox" name="favorite[]" value="SystemAdmin">
						<label>SystemAdmin (Quản trị hệ thống )</label><br><br>
						<input type="checkbox" name="favorite[]" value="Web Programming">
						<label>Web Programming</label><br><br>
						<input type="checkbox" name="favorite[]" value="Desktop app Programming">
						<label>Desktop app Programming</label><br><br>
						<input type="checkbox" name="favorite[]" value="Serve Side">
						<label>Serve Side ,system programming</label><br><br>
						<input type="checkbox" name="favorite[]" value="Embedded">
						<label>Embedded</label><br><br>
					</div>
				</div><br><hr style="border-width: 2px;">
				<div class="row">
					<div class="row"><b style="font-size: 20px; color: red;"> Phần dành cho Sinh Viên đã có công ty thực tập:</b></div><br>
					<div class="col-lg-offset-1 col-lg-6">
						<div class="form-group">
							<label class="control-label"> Tên Công Ty Thực Tập:</label>
							<textarea class="form-control" name="cty2" placeholder="..."></textarea>
						</div>
						<div class="form-group <?php echo e($errors->has('nv') ? 'has-error':''); ?>">
							<label class="control-label">Tên nhân viên phụ trách thực tập :</label>
							<input type="text" name="nv" class="form-control" placeholder="..." value="<?php echo e(old('nv')); ?>">
							<?php if($errors->has('nv')): ?>
								<span class="help-block"><strong><?php echo e($errors->first('nv')); ?></strong></span>
							<?php endif; ?>
						</div>
						<div class="form-group <?php echo e($errors->has('mailnv')?'has-error':''); ?>">
							<label class="control-label">Email nhân viên phụ trách thực tập:</label>
							<input type="email" name="mailnv" class="form-control" placeholder="..." value="<?php echo e(old('mailnv')); ?>">
							<?php if($errors->has('mailnv')): ?>
								<span class="help-block"><strong><?php echo e($errors->first('mailnv')); ?></strong></span>
							<?php endif; ?>
						</div>
					</div>
				</div><br><hr style="border-width: 2px;">
				<div class="row">
					<div class="row">
						<b style="color: red;font-size: 20px;">Đăng ký tài khoản:</b>
					</div>
					<div class="col-lg-offset-1 col-lg-4">
						<div class="form-group">
							<label class="control-label">Email:</label>
							<input type="email" name="email" required value="<?php echo e(old('email')); ?>" placeholder="..." class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Password:</label>
							<input type="password" name="password"  class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Nhập lại password:</label>
							<input type="password" name="re-password" class="form-control" >
						</div>
					</div>
				</div><hr>
				<div class="row">
					<button class="col-lg-offset-3 col-lg-5 btn btn-control btn-lg">Đăng Ký</button>
				</div><hr>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>