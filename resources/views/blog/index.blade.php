@extends('admin_master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">مدونتنا !</h1>
                        <p>استمتع بقراءة مقالاتنا. انقر على مقال للقراءة!</p>
                    </div>
                    <div class="col-4">
                        <p>إضافة مقال جديد</p>
                        <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">إضافة مقال</a>
                    </div>
                </div>
                @forelse($posts as $post)
                    <ul>
                        <li><a href=" {{route('blog.show',$post->id)}}">
                            {{ app()->isLocale('ar') ? $post->title_ar : $post->title_en }}
                        </a></li>
                    </ul>
                @empty
                    <p class="text-warning">لا توجد مقالات متاحة حاليًا</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
