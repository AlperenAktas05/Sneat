<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function tasksPage()
    {
        $tasks = Task::get();

        return view('front.tasks', compact('tasks'));

        //Durumların ve kategorilerin adını düzelt
        //Tasklara oturum özelliği ver
        //Güncelle ve sil butonlarını yap
    }

    public function createTaskPage(){

        $categories = Category::where("user_id", Auth::id())->get();

        return view('front.createTask', compact('categories'));
    }

    public function createTask(Request $request){

        $request->validate([
            'title' => 'required | max:255 | min:3',
            'content' => 'required | max:255 | min:3',
            'status' => 'required',
            'deadline' => 'required'
        ],[
            "title.required" => "Başlık boş bırakılamaz!",
            "title.max" => "Başlık maksimum 255 karakter olabilir!",
            "title.min" => "Başlık minimum 3 karakter olabilir!",
            "content.required" => "İçerik boş bırakılamaz!",
            "content.max" => "İçerik maksimum 255 karakter olabilir!",
            "content.min" => "İçerik minimum 3 karakter olabilir!",
            "status.required" => "Durum boş bırakılamaz!",
            "deadline.required" => "Son tarih boş bırakılamaz!",
        ]);

        $task = new Task();

        $task->title = $request->title;
        $task->category_id = $request->category;
        $task->content = $request->input("content");
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->save();

        return redirect()->route("dashboard")->with("success", "Görev başarıyla oluşturuldu.");
    }
}
