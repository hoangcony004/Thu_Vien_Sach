@extends('layouts.admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Kho Sách</li>
                </ol>
            </div>
            <h4 class="page-title">Kho Sách</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"><i class="mdi mdi-plus-circle me-2"></i>
                            Thêm Sách Mới
                        </button>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <!-- <button type="button" class="btn btn-success mb-2 me-1"><i
                                    class="mdi mdi-cog-outline"></i></button> -->
                            <!-- <button type="button" class="btn btn-light mb-2 me-1">Import</button> -->
                            <button type="button" class="btn btn-success mb-2">Xuất Excel</button>

                            <form action="" method="GET" class="d-flex justify-content-end">
                                <select name="criteria" class="form-select form-select-sm me-2"
                                    style="max-width: 150px;">
                                    <option value="Id">Mã Sách</option>
                                    <option value="tenDayDu">Tên Sách</option>
                                </select>
                                <input type="search" name="query" class="form-control form-control-sm me-2"
                                    placeholder="Tìm kiếm sách..." style="max-width: 200px;">
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
                                <th>Mã Sách</th>
                                <th class="all">Tên Sách</th>
                                <th>Tác Giả</th>
                                <th>Nhà Xuất Bản</th>
                                <th>Thể Loại</th>
                                <th>Mô Tả</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sachList as $index => $sach)
                            <tr>
                                <!-- Cột checkbox -->
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"
                                            id="customCheck{{ $index + 2 }}">
                                        <label class="form-check-label" for="customCheck{{ $index + 2 }}">&nbsp;</label>
                                    </div>
                                </td>
                                <!-- Cột STT -->
                                <td>{{ $sachList->firstItem() + $index }}</td>

                                <!-- Cột Mã Sách -->
                                <td>{{ $sach->maSach }}</td>

                                <!-- Cột Tên Sách -->
                                <td>{{ $sach->tenSach }}</td>

                                <!-- Cột Tác Giả -->
                                <td>{{ $sach->tacGia->tenTacGia }}</td>

                                <!-- Cột Nhà Xuất Bản -->
                                <td>{{ $sach->nhaXuatBan->tenNhaXuatBan }}</td>

                                <!-- Cột Thể Loại -->
                                <td>{{ $sach->theLoai->tenTheLoai }}</td>

                                <!-- Cột Mô Tả -->
                                <td>{{ \Illuminate\Support\Str::limit($sach->moTa, 50) }}</td>

                                <!-- Cột Action -->
                                <td class="table-action">
                                    <a href="" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i
                                            class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div> <!-- end card-body-->
            <x-pagination :paginator="$sachList" />
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- Modal -->
@include('admin.partials.sach.form-add-sach')
@include('admin.partials.sach.form-edit-sach')
@include('admin.partials.sach.form-delete-sach')

<!-- end modal-->


@endsection