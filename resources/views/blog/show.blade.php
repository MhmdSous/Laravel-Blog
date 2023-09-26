@extends('admin_master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-sm">الرجوع للخلف</a>
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title">{{ ucfirst($post->title_ar) }}</h1>
                        <div class="mb-4">
                            <img src="{{ asset('storage/'.$post->image) }}" alt="null" class="img-fluid" style="max-width: 20%">
                        </div>
                        <p class="card-text">{!! $post->body_ar !!}</p>
                        <hr>
                        <a href="{{ route('blog.edit',$post->id) }}" class="btn btn-primary">تعديل المقال</a>
                        <br><br>
                        <form id="delete-frm" class="" action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">حذف المقال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
