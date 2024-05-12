@extends("front.layouts.app")

@section("content")

    <div class="container py-4">
        <div class="card mb-4">
            <h5 class="card-header">Kategori Güncelle</h5>
            <div class="card-body">
                <form action="{{route("updateCategory", $category->id)}}" method="post">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Kategori Adı</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" name="name" placeholder="Kategori Adı Giriniz" value="{{$category->name}}" aria-describedby="defaultFormControlHelp">
                        @error("name")
                        <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="defaultSelect" class="form-label">Durum</label>
                        <select id="defaultSelect" class="form-select" name="is_active">
                            <option value="0" @if($category->is_active == 0) selected @endif>Pasif</option>
                            <option value="1" @if($category->is_active == 1) selected @endif>Aktif</option>
                        </select>
                        @error("is_active")
                        <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-info">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
