<div class="row">
    <ul class="nav nav-tabs">

        <li role="presentation" class="active"><a href="/<?php echo e($user_type); ?>/12">Công việc</a></li>
        <li role="presentation"><a href="/<?php echo e($user_type); ?>/13">Kết quả đánh giá</a></li>
    </ul>
</div>
<div class="row" style="padding-top: 10px">
    <div class="col-md-6">
        <div class="input-group stylish-input-group">
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">PDF</button>
            <button type="button" class="btn btn-default">CSV</button>
        </div>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-2">
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Mã</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Công việc</th>
            <th scope="col">Thời gian ước lượng</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Ngày cập nhật</th>
        </tr>
        </thead>
        <tbody>

        <?php for($i = 0; $i < 10; $i++): ?>
            <tr>
                <th scope="row"><?php echo e($i); ?></th>
                <td>Mới</td>
                <td>Làm giao diện</td>
                <td>2</td>
                <td>10/8/2017</td>
                <td>12/08/2017</td>
                <td>-</td>
                <td>-</td>
            </tr>
        <?php endfor; ?>

        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-5" style="padding-left: 150px">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-3">
        <form class="form-inline" style="padding-top: 20px">
            <div class="form-group">
                <label class="control-label col-sm-7" for="numEntity">Sô công việc hiển thị:</label>
                <div class="col-sm-5">
                    <select class="form-control" id="numEntity">
                        <option>10</option>
                        <option>30</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>