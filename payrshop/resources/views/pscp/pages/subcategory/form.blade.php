@extends('pscp.layouts.app')
@push('css')
    <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
@endpush

@section('content')
            <div class="layout-px-spacing">

                <div class="widget-content widget-content-area">
                    <form>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-4">
                                <label for="parent">Category</label>
                                <select class="form-control basic" id="parent" name="parent">
                                    <option>Select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category_name">Sub-Categpry Name</label>
                                <input type="text" class="form-control" id="subcategory_name" placeholder="Sub-Categpry Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category_name">Sub-Categpry Order</label>
                                <input type="number" class="form-control" id="sub_category_order" placeholder="Sub-Categpry Order">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="sub_category_thumb">
                                <label>Sub-Category Thumbnail (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                            <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="sub_category_banner">
                                <label>Sub-Category Banner (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>


                      <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                    </form>
                </div>



            </div>
@endsection

@push('js')
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
      <script>
          //First upload
          var firstUpload = new FileUploadWithPreview('sub_category_thumb')
          //Second upload
          var secondUpload = new FileUploadWithPreview('sub_category_banner')
      </script>
      <script>
          $(".basic").select2();
      </script>
@endpush
