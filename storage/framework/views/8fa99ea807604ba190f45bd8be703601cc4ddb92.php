<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-6">
        <div class="row">
            <h3>Gửi thông báo</h3>
            <form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-5">
                            <label class="control-label" for="kieuNguoi">Chọn kiểu người nhận</label>
                            <select id="kieuNguoi" class="form-control" required>
                                <option value="0">All</option>
                                <option value="1">Sinh Viên</option>
                                <option value="2">Giảng Viên Hướng dẫn</option>
                                <option value="3">Project Manager</option>
                                <option value="4">Leader</option>
                            </select>
                        </div>
                        <div class="col-sm-7">
                            <label class="control-label" for="tenNguoi">Chọn tên người nhận</label>
                            <select id="tenNguoi" class="form-control" required>
                                <option value="0">User 1</option>
                                <option value="1">User 2</option>
                                <option value="2">User 3</option>
                                <option value="3">User 4</option>
                            </select>
                        </div>
                    </div>
                    <label for="comment">Nội Dung:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                    <button type="submit" class="btn btn-success">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>