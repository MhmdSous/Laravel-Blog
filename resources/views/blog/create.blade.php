@extends('admin_master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">الرجوع للخلف</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">إضافة مقال جديد</h1>
                    <p>املأ النموذج وقدمه لإنشاء مقالة جديدة</p>

                    <hr>

                    <form action="{{ route('blog.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">عنوان المقالة</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="أدخل عنوان المقالة" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">نص المقالة</label>
                                <textarea id="body" class="form-control" name="body" placeholder="ادخل نص المقالة"
                                          rows="" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
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

@endsection