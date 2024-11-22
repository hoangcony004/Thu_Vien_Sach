<form action="{{ route('PEditNhaXuatBan', ['id' => $nhaxuatban->id]) }}" method="post">
    @csrf
    <div class="modal-body">
        <!-- Các ô input điền thông tin -->
        <div class="mb-3">
            <label for="inputName" class="form-label">Tên Nhà Xuất Bản</label>
            <input type="text" class="form-control" id="inputName" name="tenNhaXuatBan" required
                placeholder="Nhập tên nhà xuất bản..." value="{{ old('tenNhaXuatBan', $nhaxuatban->tenNhaXuatBan) }}">
        </div>

        <div class="mb-3">
            <label for="inputAddress" class="form-label">Số Điện Thoại</label>
            <input type="number" class="form-control" name="soDienthoai" id="input" required
                placeholder="Nhập số điện thoại..." value="{{ old('soDienThoai', $nhaxuatban->soDienThoai) }}">
        </div>

        <div class="mb-3">
            <label for="inputAddress" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="input" placeholder="Nhập email..."
                value="{{ old('email', $nhaxuatban->email) }}">
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label">Địa Chỉ</label>
            <textarea class="form-control" name="diaChi" required
                placeholder="Nhập địa chỉ (VD: Ngõ 1, Lê Văn Thiêm, Nhân Chính, Thanh Xuân, Hà Nội)...">{{ old('diaChi', $nhaxuatban->diaChi) }}</textarea>
        </div>

    </div> <!-- end modal body -->
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </div> <!-- end modal footer -->
</form>