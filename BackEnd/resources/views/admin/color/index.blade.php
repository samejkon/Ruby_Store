@extends('admin.index')


@section('content')
<div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <h3>Danh sách màu.</h3>
            <div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Màu</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </thead>
                    @isset($color)
                        @if ($color->count()>0)
                        @php $i = 1 @endphp
                          @foreach ($color as $item)
                              <tr class="align-middle">
                                  <td>{{ $i }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->description }}</td>
                                  <td>
                                      <a href="{{ route('admin.color.edit',['id' => $item->id]) }}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                      <a href="{{ route('admin.color.destroy',['id' => $item->id]) }}" onclick="return confirm('Bạn có chắc chắn xoá màu này.')" class="text-danger"><i class="ti ti-trash"></i></a>
                                  </td>
                              </tr>
                              @php $i++ @endphp
                          @endforeach
                        @else
                            <tr class="text-danger text-center">
                              <td colspan="4">Không có bản ghi</td>
                            </tr>
                        @endif
                    @endisset
                </table>
                {{-- <div class="d-flex justify-content-center">
                    {{ $color->links() }}
                </div> --}}
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                @if(session('success') || session('error'))
                    @php
                        $alertClass = session('success') ? 'alert-success' : 'alert-danger';
                    @endphp
      
                    <div class="alert {{ $alertClass }}">
                        {{ session('success') ?? session('error') }}
                    </div>
                  
                    <script>
                        setTimeout(function() {
                            var alertDiv = document.querySelector('.alert');
                            if (alertDiv) {
                                alertDiv.style.display = 'none';
                            }
                        }, 4000);
                    </script>
                @endif
                <h5 class="card-title mb-9 fw-semibold">
                  Thêm màu.
                </h5>
                <div class="row align-items-center">
                    {{-- form --}}
                 <form action="{{ route('admin.color.store') }}" method="post" >
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên màu" value="{{ old('name') }}">
                        <label for="floatingInput">Tên màu @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror </label>
                      </div>
                      <div class="form-floating">
                        <textarea name="description" class="form-control" id="floatingPassword" placeholder="Mô tả ngắn">{{ old('description') }}</textarea>
                        <label for="floatingPassword">Mô tả ngắn @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror</label>
                      </div>
                      <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                      </div>
                 </form>
                </div>
              </div>
            </div>
          </div>
          
        </div>
    </div>
</div>
@endsection