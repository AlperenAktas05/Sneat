@extends("front.layouts.app")

@section("content")

    <div class="container py-4">
        @if(session("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session("success")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{route("createTaskPage")}}" class="btn btn-success">Görev Oluştur</a>

            @if($tasks->first())
                <div class="card mt-4">
                    <h5 class="card-header">Görevler</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Kategori</th>
                                <th>İçerik</th>
                                <th>Durum</th>
                                <th>Son Tarih</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            @foreach($tasks as $task)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$task->title}}</strong></td>
                                    <td>{{$task->category_id}}</td>
                                    <td>{{$task->content}}</td>
                                    <td>{{$task->status}}</td>
                                    <td>{{\Illuminate\Support\Carbon::parse($task->deadline)->diffForHumans()}}</td>
                                    <td>{{$task->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#" type="info" class="btn btn-info">Güncelle</a>
                                        <a href="#" type="info" class="btn btn-danger">Sil</a>
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
