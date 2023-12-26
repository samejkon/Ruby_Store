@extends('index')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-actions">
                                <img src="{{ asset('storage/'.$item->image) }}" class="card-img img-fluid" width="" alt="">
                            </div>
                        </div>
                        <div class="card-body bg-light text-center">
                            <div class="mb-2">
                                <h6 class="font-weight-semibold mb-2">
                                    <a href="#" class="text-default mb-2" data-abc="true">{{ $item->name }}</a>
                                </h6>
                                <a href="#" class="text-muted" data-abc="true">{{ $item->getCate() }}</a>
                            </div>
                            <h3 class="mb-0 font-weight-semibold">${{ $item->price }}</h3>
                            <div class="text-muted mb-3">{{ $view ?? "0" }}</div>
                            <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>    
                        </div>
                    </div>  
                </div> 
            @endforeach
        </div>
    </div>
@endsection