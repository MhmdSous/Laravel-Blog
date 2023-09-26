@extends('admin_master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/blog" class="btn btn-outline-primary btn-sm">الرجوع للخلف</a>
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title display-4">إضافة مقال جديد</h1>
                        <p class="card-text">املأ النموذج وقدمه لإنشاء مقالة جديدة</p>

                        <hr>

                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_ar">عنوان المقالة بالعربي</label>
                                        <input type="text" id="title_ar" class="form-control" name="title_ar"
                                            placeholder="أدخل عنوان المقالة بالعربي">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">عنوان المقالة بالإنجليزية</label>
                                        <input type="text" id="title_en" class="form-control" name="title_en"
                                            placeholder="أدخل عنوان المقالة بالإنجليزية">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="body_ar">نص المقالة بالعربي</label>
                                        <textarea id="body_ar" class="form-control" name="body_ar" placeholder="أدخل نص المقالة بالعربي" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="body_en">نص المقالة بالإنجليزية</label>
                                        <textarea id="body_en" class="form-control" name="body_en" placeholder="أدخل نص المقالة بالإنجليزية" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">صورة المقالة</label>
                                        <input type="file" id="image" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12 text-center">
                                    <button id="btn-submit" class="btn btn-primary">
                                        إنشاء المقالة
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
