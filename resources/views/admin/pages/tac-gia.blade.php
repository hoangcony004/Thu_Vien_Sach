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

                            <form action="{{ route('searchTacGia') }}" method="GET" class="d-flex justify-content-end">
                                <input type="search" name="query" class="form-control form-control-sm me-2"
                                    placeholder="Nhập tên tác giả..." style="max-width: 200px;"
                                    value="{{ request()->query('query') }}">
                                <button class="btn btn-primary btn-sm" type="submit">Tìm kiếm</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    @if($tacgiaList->isEmpty())
                    <p style="display: flex; justify-content: center; font-size: 32px; color: red;">Không tìm thấy tác
                        giả
                        nào
                        với
                        tên
                        '{{ $query }}'.</p>
                    @else
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

                                <td>{{ strlen($tacgia->moTa) > 50 ? substr($tacgia->moTa, 0, 50) . '...' : $tacgia->moTa }}
                                </td>
                                <td class="table-action">
                                    <a href="{{ route('editTacGia', ['id' => $tacgia->id]) }}" class="action-icon">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>

                                    <a href="#" class="action-icon" data-id="{{ $tacgia->id }}" data-bs-toggle="modal"
                                        data-bs-target="#danger-header-modal">
                                        <i class="mdi mdi-delete"></i>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div> <!-- end card-body-->
            <!-- Phân trang -->
            @if (request()->has('query'))
            <!-- Nếu có tham số query, sử dụng phân trang với appends -->
            <!-- Căn giữa phân trang với Bootstrap -->
            <div class="d-flex justify-content-center">
                {{ $tacgiaList->appends(['query' => request()->query('query')])->links() }}
            </div>
            @else
            <!-- Nếu không có tham số query, sử dụng phân trang mặc định của bạn -->
            <x-pagination :paginator="$tacgiaList" />
            @endif

        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- Modal -->
@include('admin.partials.tacgia.form-add-tac-gia')
@include('admin.partials.tacgia.form-delete-tac-gia')

<!-- end modal-->

@endsection