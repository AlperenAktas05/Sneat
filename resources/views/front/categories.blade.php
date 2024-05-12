@extends("front.layouts.app")

@section("content")

    <div class="container py-4">
        @if(session("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session("success")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{route("createCategoryPage")}}" class="btn btn-success">Kategori Oluştur</a>

        @if($categories->first())
                <div class="card mt-4">
                    <h5 class="card-header">Kategoriler</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kategori Adı</th>
                                <th>Durum</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            @foreach($categories as $category)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$category->name}}</strong></td>
                                    <td>
                                        @if($category->is_active == 1)
                                            Aktif
                                        @else
                                            Pasif
                                        @endif
                                    </td>
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route("updateCategoryPage", $category->id)}}" class="btn btn-info">Güncelle</a>
                                        <a href="{{route("deleteCategory", $category->id)}}" class="btn btn-danger">Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
            <h2 class="mt-5 text-center" style="opacity: 50%">Henüz kategori oluşturmadınız.</h2>
        @endif
    </div>

@endsection
