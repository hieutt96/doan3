<div class="row">
    <ul class="nav nav-tabs">
        <li role="presentation"
        @if($tab == 21)
            class="active"
        @endif
        ><a href="/pm/nv/{{$idLead}}/thong-tin-chi-tiet">Thông tin chi tiết</a></li>
        <li role="presentation"
        @if($tab == 22)
        class="active"
        @endif
        ><a href="/pm/nv/{{$idLead}}/sinh-vien-huong-dan">Sinh Viên Hướng Dẫn Thực Tập</a></li>
    </ul>
</div>