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
                            <!-- <button type="button" class="btn btn-success mb-2">Xuất Excel</button> -->

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
                                <th class="all">Product</th>
                                <th>Category</th>
                                <th>Added Date</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <img src="assets/images/products/product-1.jpg" alt="contact-img"
                                        title="contact-img" class="rounded me-3" height="48">
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="apps-ecommerce-products-details.html" class="text-body">Amazing Modern
                                            Chair</a>
                                        <br>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                    </p>
                                </td>
                                <td>
                                    Aeron Chairs
                                </td>
                                <td>
                                    09/12/2018
                                </td>
                                <td>
                                    $148.66
                                </td>

                                <td>
                                    254
                                </td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>

                                <td class="table-action">
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i
                                            class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i
                                            class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- Modal -->

<!-- end modal-->



@endsection