@extends('layouts.admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Tác Giả</li>
                </ol>
            </div>
            <h4 class="page-title">Tác Giả</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"><i class="mdi mdi-plus-circle me-2"></i>
                            Thêm Tác Giả
                        </button>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <!-- <button type="button" class="btn btn-success mb-2 me-1"><i
                                    class="mdi mdi-cog-outline"></i></button> -->
                            <!-- <button type="button" class="btn btn-light mb-2 me-1">Import</button> -->
                            <!-- <button type="button" class="btn btn-success mb-2">Xuất Excel</button> -->

                            <form action="" method="GET" class="d-flex justify-content-end">
                                <input type="search" name="query" class="form-control form-control-sm me-2"
                                    placeholder="Nhập tên tác giả..." style="max-width: 200px;">
                                <button class="btn btn-primary btn-sm" type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                        <thead class="table-light">
                            <tr>
                                <th class="all" style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>STT</th>
                                <th class="all">Tên Tác Giả</th>
                                <th>Ngày Sinh</th>
                                <th>Ngày Mất</th>
                                <th>Mô Tả</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tacgiaList as $index => $tacgia)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"
                                            id="customCheck{{ $tacgia->id }}">
                                        <label class="form-check-label"
                                            for="customCheck{{ $tacgia->id }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td>{{ $tacgiaList->firstItem() + $index }}</td>
                                <td>
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="javascript:void(0);" class="text-body">{{ $tacgia->tenTacGia }}</a>
                                    </p>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($tacgia->ngaySinh)->format('d/m/Y') }}</td>
                                <td>
                                    @if (empty($tacgia->ngayMat))
                                    Chưa cập nhật
                                    @else
                                    {{ \Carbon\Carbon::parse($tacgia->ngayMat)->format('d/m/Y') }}
                                    @endif
                                </td>

                                <td>{{ $tacgia->moTa }}</td>
                                <td class="table-action">
                                    <!-- Nút Xem Tác Giả -->
                                    <a type="button" class="action-icon" data-toggle="modal" data-target="#modalXem"
                                        data-id="{{ $tacgia->id }}">
                                        <i class="mdi mdi-eye"></i>
                                    </a>

                                    <!-- Modal Xem Tác Giả -->
                                    <div class="modal" id="modalXem{{ $tacgia->id }}">

                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <!-- Nội dung modal sẽ được load từ server khi mở modal -->
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal"><i class="bi-x"></i>Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- JavaScript để load dữ liệu khi mở modal -->
                                    <script>
                                        $(document).ready(function() {
                                            // Khi nút "Xem" được bấm, hiển thị modal và tải dữ liệu
                                            $('a[data-toggle="modal"]').on('click', function() {
                                                var id = $(this).data(
                                                    'id'); // Lấy ID từ data-id của nút "Xem"
                                                var modalId = '#modalXem' +
                                                    id; // Xác định ID của modal tương ứng

                                                // console.log("ID tác giả: ",
                                                //     id); // Kiểm tra ID trong console

                                                if (id) {
                                                    // Tải dữ liệu vào modal
                                                    $(modalId + ' .modal-body').load(
                                                        "{{ route('xemTacGia', '') }}/" + id,
                                                        function(response, status, xhr) {
                                                            if (status == "error") {
                                                                console.error(
                                                                    "Có lỗi khi tải nội dung từ server: " +
                                                                    xhr.status + " " + xhr
                                                                    .statusText);
                                                            } else {
                                                                $(modalId).modal(
                                                                    'show'
                                                                ); // Hiển thị modal sau khi tải nội dung
                                                            }
                                                        });
                                                } else {
                                                    console.error("Không tìm thấy ID tác giả!");
                                                }
                                            });
                                        });
                                    </script>

                                    <!-- Trigger button -->
                                    <a type="button" class="action-icon" data-toggle="modal" data-target="#modalXoa"
                                        href="#modalXoa" data-id="{{ $tacgia->id }}">
                                        <i class="mdi mdi-delete"></i>
                                    </a>

                                    <!-- JavaScript -->
                                    <script>
                                        $('#modalXoa').on('show.bs.modal', function(e) {
                                            var id = $(e.relatedTarget).data('id');
                                            console.log("ID nhận được: ", id);

                                            // Cập nhật giá trị id vào input ẩn
                                            $('#idInput').val(id);

                                            // Cập nhật action của form để bao gồm id
                                            var formAction = "{{ url('public/admin/tac-gia-xoa') }}/" + id;
                                            $('#formXoa').attr('action', formAction);
                                        });
                                    </script>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Phân trang -->

                </div>
            </div> <!-- end card-body-->
            <x-pagination :paginator="$tacgiaList" />
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- Modal -->
@include('admin.partials.tacgia.form-add-tac-gia')
@include('admin.partials.tacgia.form-delete-tac-gia')

<!-- end modal-->

@endsection