@extends("front.layouts.app")

@section("content")

    <div class="container py-4">
        <div class="card mb-4">
            <h5 class="card-header">Görev Oluştur</h5>
            <div class="card-body">
                <form action="{{route("createTask")}}" method="post">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Başlık</label>
                        <input type="text" class="form-control" name="title" id="defaultFormControlInput" placeholder="Başlık Giriniz" aria-describedby="defaultFormControlHelp">
                        @error("title")
                            <p class="mt-2 text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="defaultSelect" class="form-label">Kategori</label>
                        <select id="defaultSelect" class="form-select" name="category">
                            <option selected disabled>Lütfen Kategori Seçiniz</option>
                            @foreach($categories as $category)
                                @if($category->is_active == 1)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error("status")
                        <p class="mt-2 text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">İçerik</label>
                        <input type="text" class="form-control" name="content" id="defaultFormControlInput" placeholder="İçerik Giriniz" aria-describedby="defaultFormControlHelp">
                        @error("content")
                            <p class="mt-2 text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="defaultSelect" class="form-label">Durum</label>
                        <select id="defaultSelect" class="form-select" name="status">
                            <option selected disabled>Lütfen Durum Seçiniz</option>
                            <option value="0">Yapılıyor</option>
                            <option value="1">Yapılmadı</option>
                            <option value="2">Ertelendi</option>
                            <option value="3">İptal Oldu</option>
                        </select>
                        @error("status")
                             <p class="mt-2 text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Son Tarih</label>
                        <input type="datetime-local" class="form-control" name="deadline" id="defaultFormControlInput" placeholder="İçerik Giriniz" aria-describedby="defaultFormControlHelp">
                        @error("deadline")
                            <p class="mt-2 text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
