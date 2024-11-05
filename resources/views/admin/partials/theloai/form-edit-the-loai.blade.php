<!DOCTYPE html>
<html lang="vi">


<body>
    <!-- start page title -->
    <!-- <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Sửa Nhân Viên</li>
                    </ol>
                </div>
                <h4 class="page-title">Sửa Nhân Viên</h4>
            </div>
        </div>
    </div> -->
    <!-- end page title -->
    <div class="container">
        <form action="{{ route('PEditTheLoai', ['id' => $theloai->id]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="tenTheLoai"
                            value="{{ old('tenTheLoai', $theloai->tenTheLoai) }}" required id="floatingInput" />
                        <!-- <label for="floatingInput">Tên thể loại</label> -->
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Cập Nhật</button>
        </form>
    </div>
</body>

</html>