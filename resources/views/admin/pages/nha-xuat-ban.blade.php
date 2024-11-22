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
                            Thêm Nhà Xuất Bản
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
                                    placeholder="Tìm kiếm nhà xuất bản..." style="max-width: 200px;">
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
                                <th class="all">Tên Nhà Xuất Bản</th>
                                <th>Số Điện thoại</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nhaxuatbanList as $index => $nhaxuatban)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <!-- Nếu dùng paginate(), thêm firstItem() để đánh số theo trang -->
                                <td>{{ $nhaxuatbanList->firstItem() + $index }}</td>

                                <td>{{ $nhaxuatban->tenNhaXuatBan }}</td>
                                <td>{{ $nhaxuatban->soDienThoai }}</td>
                                <td>{{ $nhaxuatban->email }}</td>
                                <td>{{ $nhaxuatban->diaChi }}</td>

                                <td class="table-action">
                                    <!-- Thẻ a cho nút sửa -->
                                    <a href="{{ route('editNhaXuatBan', ['id' => $nhaxuatban->id]) }}"
                                        class="action-icon">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>

                                    <!-- Thẻ a để mở modal và truyền id -->
                                    <a href="#" class="action-icon" data-id="{{ $nhaxuatban->id }}"
                                        data-bs-toggle="modal" data-bs-target="#danger-header-modal">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
            @if($nhaxuatbanList->hasPages())
            <x-pagination :paginator="$nhaxuatbanList" />
            @endif
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- Modal -->
@include('admin.partials.nhaxuatban.form-add-nha-xuat-ban')
@include('admin.partials.nhaxuatban.form-delete-nha-xuat-ban')
<!-- end modal-->

@endsection