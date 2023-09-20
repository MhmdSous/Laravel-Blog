@extends('admin_master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-sm">الرجوع للخلف</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p> 
                <hr>
                <a href="{{ route('blog.edit',$post->id) }}" class="btn btn-outline-primary">تعديل المقال</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">حذف المقال</button>
                </form>
            </div>
        </div>
    </div>
@endsection