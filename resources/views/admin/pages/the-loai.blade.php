@extends('layouts.admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Thể Loại</li>
                </ol>
            </div>
            <h4 class="page-title">Thể Loại</h4>
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
                            Thêm Thể Loại
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
                                    placeholder="Tìm kiếm thể loại..." style="max-width: 200px;">
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
                                <th class="all">Tên Thể Loại</th>
                                <th>Ngày Thêm</th>
                                <th>Ngày Sửa</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloaiList as $index => $theloai)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td>{{ $theloaiList->firstItem() + $index }}</td>
                                <td>
                                    {{ $theloai->tenTheLoai }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($theloai->created_at)->format('d/m/Y') }}
                                </td>
                                <td>
                                    @if (empty($theloai->updated_at))
                                    Chưa cập nhật
                                    @else
                                    {{ \Carbon\Carbon::parse($theloai->updated_at)->format('d/m/Y') }}
                                    @endif
                                </td>

                                <td class="table-action">
                                    <!-- Thẻ a cho nút sửa -->
                                    <a href="{{ route('editTheLoai', ['id' => $theloai->id]) }}" class="action-icon">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>

                                    <!-- Thẻ a để mở modal và truyền id -->
                                    <a href="#" class="action-icon" data-id="{{ $theloai->id }}" data-bs-toggle="modal"
                                        data-bs-target="#danger-header-modal">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
            @if($theloaiList->hasPages())
            <x-pagination :paginator="$theloaiList" />
            @endif
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- Modal -->
@include('admin.partials.theloai.form-add-the-loai')
@include('admin.partials.theloai.form-delete-the-loai')



<!-- end modal-->
@endsection