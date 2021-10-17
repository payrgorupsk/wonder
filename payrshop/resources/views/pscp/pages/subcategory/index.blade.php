@extends('pscp.layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
@endpush

@section('content')
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="categories_table" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Banner</th>
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                          <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{asset($subcategory->sub_category_thumb)}}">
                                                    </div>
                                                    <p class="align-self-center mb-0 admin-name"> {{$subcategory->subcategory_name}} </p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{asset($subcategory->category->category_thumb)}}">
                                                    </div>
                                                    <p class="align-self-center mb-0 admin-name"> {{$subcategory->category->category_name}} </p>
                                                </div>
                                            </td>

                                            <td><img alt="banner" class="img-fluid " style="width:100px; height:100px; object-fit:contain;" src="{{asset($subcategory->sub_category_banner)}}"></td>
                                            <td>{{$subcategory->sub_category_order}}</td>
                                            <td><button class="btn btn-primary mx-2"><i class="fa fa-pencil"></i> Edit</button><button class="btn btn-danger mx-2"><i class="fa fa-trash"></i> Delete</button></td>
                                        </tr>
                                        @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection

@push('js')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>

<script>
    $("#categories_table").dataTable({
              "oLanguage": {
                  "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                  "sInfo": "Showing page _PAGE_ of _PAGES_",
                  "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                  "sSearchPlaceholder": "Search...",
                  "sLengthMenu": "Results :  _MENU_",
              },
              "stripeClasses": [],
              "lengthMenu": [10, 20, 50, 100],
              "pageLength": 7,
          });
</script>

@endpush
