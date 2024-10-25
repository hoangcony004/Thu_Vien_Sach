<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm Thể Loại Mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <div class="modal-body">
                <!-- Các ô input điền thông tin -->
                <form action="{{ route('addTheLoai') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Tên thể loại</label>
                        <input type="text" class="form-control" id="inputName" name="tenTheLoai" required
                            placeholder="Nhập tên thể loại...">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </div> <!-- end modal footer -->
                </form>
            </div> <!-- end modal body -->

        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div>