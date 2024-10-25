<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Xem Tác Giả</li>
                </ol>
            </div>
            <h4 class="page-title">Xem Tác Giả</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- Họ Tên Tác Giả -->
                <div class="col-md-3">
                    <h5 class="font-weight-bold">Họ Tên Tác Giả:</h5>
                </div>
                <div class="col-md-9">
                    <p>{{ $tacgia->tenTacGia }}</p> <!-- Đổ dữ liệu từ biến $tacgia -->
                </div>
            </div>

            <div class="row">
                <!-- Ngày Sinh -->
                <div class="col-md-3">
                    <h5 class="font-weight-bold">Ngày Sinh:</h5>
                </div>
                <div class="col-md-9">
                    <p>{{ \Carbon\Carbon::parse($tacgia->ngaySinh)->format('d/m/Y') }}</p>
                </div>
            </div>

            <div class="row">
                <!-- Ngày Mất -->
                <div class="col-md-3">
                    <h5 class="font-weight-bold">Ngày Mất:</h5>
                </div>
                <div class="col-md-9">
                    <p>{{ $tacgia->ngayMat ? \Carbon\Carbon::parse($tacgia->ngayMat)->format('d/m/Y') : 'Chưa cập nhật' }}
                    </p>
                </div>
            </div>

            <div class="row">
                <!-- Giới Thiệu Về Tác Giả -->
                <div class="col-md-3">
                    <h5 class="font-weight-bold">Giới Thiệu Về Tác Giả:</h5>
                </div>
                <div class="col-md-9">
                    <p>{{ $tacgia->moTa }}</p>
                </div>
            </div>
        </div>
    </div>
</div>