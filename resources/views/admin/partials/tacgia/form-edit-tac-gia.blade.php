<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sửa Tác Giả</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->

            <!-- Thay đổi action cho form sửa, sử dụng phương thức PUT -->
            <form action="{{ route('PEditTacGia', ['id' => $tacgia->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Các ô input điền thông tin -->
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Tên Tác Giả</label>
                        <input type="text" class="form-control" id="inputName" name="tenTacGia" required
                            placeholder="Nhập tên tác giả..." value="{{ $tacgia->tenTacGia }}">
                    </div>

                    <div class="mb-3">
                        <label for="inputDateOfBirth" class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" name="ngaySinh" id="inputDateOfBirth" required
                            value="{{ $tacgia->ngaySinh }}">
                    </div>

                    <div class="mb-3">
                        <label for="inputDateOfDeath" class="form-label">Ngày Mất (Nếu tác giả chưa mất thì bỏ
                            trống)</label>
                        <input type="date" class="form-control" name="ngayMat" id="inputDateOfDeath"
                            value="{{ $tacgia->ngayMat }}">
                    </div>

                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Mô tả về tác giả</label>
                        <textarea class="form-control" name="moTa" required
                            placeholder="Nhập mô tả về tác giả (Khoảng 100 từ)...">{{ $tacgia->moTa }}</textarea>
                    </div>
                </div> <!-- end modal body -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div>