@extends('layouts.admin')

@section('content')
<style>
button.btn {
    background-color: transparent;
    /* Xóa màu nền */
    border: none;
    /* Xóa viền */
    padding: 0;
    /* Bỏ padding nếu cần */
    color: inherit;
    /* Giữ màu chữ giống thẻ cha */
    box-shadow: none;
    /* Loại bỏ bóng đổ nếu có */
    font-size: 24px;
    color: #0000ff;
    /* Màu chữ mặc định */
    outline: none;
    /* Xóa viền khi click */
}

button.btn:hover {
    cursor: pointer;
    /* Thêm con trỏ khi hover */
    color: #ff0000;
    /* Màu chữ khi hover */
}

button.btn:focus {
    outline: none;
    /* Xóa viền focus */
}


.function-container {
    display: flex;
    justify-content: space-between;
    /* Căn hai cột dọc ra ngoài */
    gap: 20px;
    /* Khoảng cách giữa hai cột */
    margin-top: 20px;
    /* Khoảng cách trên giữa các cột */
}

.column-1,
.column-2 {
    display: flex;
    flex-direction: column;
    /* Xếp các button theo chiều dọc */
    width: 48%;
    /* Cả hai cột chiếm 48% chiều rộng của container */
}

.function-item {
    display: flex;
    align-items: center;
    /* Căn giữa nội dung trong mỗi button */
    margin-bottom: 10px;
    /* Khoảng cách giữa các chức năng */
}

.number {
    font-weight: bold;
    margin-right: 10px;
    font-size: 20px;
}

.btn {
    padding: 10px 20px;
    text-align: center;
    margin-left: 10px;
    /* width: 100%; */
    /* Chiếm hết chiều rộng của function-item */
}

@media (max-width: 1200px) {
    .function-container {
        flex-direction: column;
        align-items: center;
    }

    .column-1,
    .column-2 {
        width: 100%;
        /* Khi màn hình nhỏ, cả hai cột chiếm 100% */
    }
}
</style>
@php
$firstTen = array_slice($results, 0, 10); // Lấy 10 phần tử đầu tiên
$secondTen = array_slice($results, 10, 10); // Lấy 10 phần tử tiếp theo
$thirdTen = array_slice($results, 20, 10); // Lấy 10 phần tử tiếp theo nữa
$remaining = array_slice($results, 30); // Các phần tử còn lại
@endphp

<div class="container"><br><br><br>
    <h1 style="text-align: center; display: block;">
        Kết quả tìm kiếm cho: "<span>{{ $query }}</span>"
    </h1>
    <div class="function-container">
        @if(count($results) > 0)
        <div class="column-1">
            @foreach($firstTen as $key => $result)
            <div class="function-item">
                <span class="number">{{ $key + 1 }}: </span>
                <button type="button" tabindex="0" class="btn" data-bs-toggle="popover" data-bs-trigger="hover"
                    data-bs-content="{{ $result['moTa'] }}" title="{{ $result['ten'] }}"
                    onclick="window.location.href='{{ url($result['url']) }}'">
                    {{ $result['ten'] }}
                </button>
            </div>
            @endforeach
        </div>

        <div class="column-2">
            @foreach($secondTen as $key => $result)
            <div class="function-item">
                <span class="number">{{ $key + 11 }}: </span>
                <button type="button" tabindex="0" class="btn" data-bs-toggle="popover" data-bs-trigger="hover"
                    data-bs-content="{{ $result['moTa'] }}" title="{{ $result['ten'] }}"
                    onclick="window.location.href='{{ url($result['url']) }}'">
                    {{ $result['ten'] }}
                </button>
            </div>
            @endforeach
        </div>

        <div class="column-3">
            @foreach($thirdTen as $key => $result)
            <div class="function-item">
                <span class="number">{{ $key + 21 }}: </span>
                <button type="button" tabindex="0" class="btn" data-bs-toggle="popover" data-bs-trigger="hover"
                    data-bs-content="{{ $result['moTa'] }}" title="{{ $result['ten'] }}"
                    onclick="window.location.href='{{ url($result['url']) }}'">
                    {{ $result['ten'] }}
                </button>
            </div>
            @endforeach
        </div>

        <div class="column-4">
            @foreach($remaining as $key => $result)
            <div class="function-item">
                <span class="number">{{ $key + 31 }}: </span>
                <button type="button" tabindex="0" class="btn" data-bs-toggle="popover" data-bs-trigger="hover"
                    data-bs-content="{{ $result['moTa'] }}" title="{{ $result['ten'] }}"
                    onclick="window.location.href='{{ url($result['url']) }}'">
                    {{ $result['ten'] }}
                </button>
            </div>
            @endforeach
        </div>

        @else
        <br>
        <h4 style="color: red;">- Không tìm thấy chức năng nào khớp với từ khóa.
        </h4>
        @endif
    </div><br>
</div>





@endsection