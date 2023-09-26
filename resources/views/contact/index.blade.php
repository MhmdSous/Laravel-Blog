@extends('admin_master')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">معلومات التواصل
                                {{-- <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span> --}}
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="بحث..."
                                                    id="kt_datatable_search_query" />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">بحث</a>
                            </div> --}}
                            </div>
                        </div>
                        <!--end::Search Form-->
                        <!--end: Search Form-->
                        <!--begin: Datatable-->
                       
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                                <thead>
                                    <tr>
                                        {{-- <th title="Field #1">id</th> --}}
                                        <th title="Field #2">الاسم</th>
                                        <th title="Field #3">الرسالة</th>
                                        <th title="Field #4">رقم الجوال</th>
                                        <th title="Field #5">الإيميل</th>
                                        <th title="Field #6">الموضوع</th>
                                        <th title="Field #7">حركة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $contact)
                                        <tr>
                                            {{-- <td>{{ $contact->id }}</td> --}}
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>
                                                <a href="{{ route('contact.destroy', $contact->id) }}"
                                                    class="btn btn-danger btn-sm delete-contact">حذف</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">لا يوجد بيانات متاحة</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        
                        <!--end: Datatable-->
                        <!-- JavaScript for Datatable Features -->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
