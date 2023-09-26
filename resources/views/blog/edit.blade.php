@extends('admin_master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/blog" class="btn btn-primary btn-sm">العودة</a>
            <div class="card mt-5">
                <div class="card-body">
                    <h1 class="card-title">تعديل المقال</h1>
                    <p class="card-text">قم بتعديل وإرسال هذا النموذج لتحديث المقال</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_ar">عنوان المقال بالعربي</label>
                                    <input type="text" id="title_ar" class="form-control" name="title_ar"
                                        placeholder="ادخل عنوان المقال بالعربي" value="{{ $post->title_ar }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_en">عنوان المقال بالانجليزي</label>
                                    <input type="text" id="title_en" class="form-control" name="title_en"
                                        placeholder="ادخل عنوان المقال بالانجليزي" value="{{ $post->title_en }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="body_ar">نص المقال بالعربي</label>
                                    <textarea id="body_ar" class="form-control" name="body_ar"
                                        placeholder="ادخل نص المقال بالعربي" rows="5">{{ $post->body_ar }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="body_en">نص المقال بالانجليزي</label>
                                    <textarea id="body_en" class="form-control" name="body_en"
                                        placeholder="ادخل نص المقال بالانجليزي" rows="5">{{ $post->body_en }}</textarea>
                                </div>
                            </div>
                            {{-- for image --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">صورة المقال</label>
                                    <input type="file" id="image" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    تحديث المقال
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
