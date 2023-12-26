@extends('index')

@section('content')
<div class="container mt-3">
    <div class="card card-body rounded border box-shadow">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                      {{-- ảnh chính ở đây --}}

                      <div class="tab-pane active" id="pic-1"><img src="{{ asset('storage/'.$product->image) }}" /></div>

                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ asset('storage/'.$product->image) }}" /></a></li>
                        @foreach ($variant as $index => $item)
                            <li><a data-target="#pic-{{ $index + 2 }}" data-toggle="tab"><img src="{{ asset('storage/'.$item->image) }}" /></a></li>
                        @endforeach
                    </ul>
                    
                    
                </div>
                <div class="details col-md-6">
                    <form action="" method="post">
                        <input type="text" name="" id="" class="form-control" value="{{ $product->name }}">
                        <h3 class="product-title"></h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">{{ $view ?? '10' }} views</span>
                        </div>
                        <p class="product-description">{{ $product->description }}</p>
                        <h4 class="price">current price: <span>$180</span></h4>
                        {{-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> --}}
                        <h5 class="sizes">sizes:
                            {{-- @foreach ($variant as $item)
                            <a href="" class="btn">{{ $item->getSize() }}</a>
                            @endforeach --}}
                            @foreach ($variant as $item)
                                <button type="button" name="size_id" class="btn btn-size{{ old('size_id') == $item->id ? 'active' : '' }}" data-size-id="{{ $item->id }}">
                                    {{ $item->getSize() }}
                                </button>
                            @endforeach
                        </h5>
                        <h5 class="colors">colors:
                            {{-- @foreach ($variant as $item)
                            <a href="" class="btn">{{ $item->getSize() }}</a>
                            @endforeach --}}
                            @foreach ($variant as $item)
                                <button type="button" name="color_id" class="btn btn-color{{ old('color_id') == $item->id ? 'active' : '' }}" data-color-id="{{ $item->id }}">
                                    {{ $item->getColor() }}
                                </button>
                            @endforeach
                        </h5>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="submit">add to cart</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>                        
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Trong phần head hoặc trước đó -->
<style>
    .btn-size {
        margin-right: 5px;
    }
    .btn-color {
        margin-right: 5px;
    }
    .btn-size.active {
        background-color: #007bff; /* Màu highlight khi chọn */
        color: #fff; /* Màu chữ khi chọn */
    }
</style>

<!-- Trước thẻ đóng </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-size').click(function () {
            $('.btn-size').removeClass('active');
            $(this).addClass('active');
            var sizeId = $(this).data('size-id');
            $('input[name="size_id"]').val(sizeId); // Lưu giá trị size_id vào input ẩn
        });
    });

    $(document).ready(function () {
        $('.btn-color').click(function () {
            $('.btn-color').removeClass('active');
            $(this).addClass('active');
            var colorId = $(this).data('color-id');
            $('input[name="color_id"]').val(colorId); // Lưu giá trị size_id vào input ẩn
        });
    });
</script>
