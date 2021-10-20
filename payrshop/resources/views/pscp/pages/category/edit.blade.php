@extends('pscp.layouts.app')
@push('css')
<link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
@endpush

@section('content')
<div class="layout-px-spacing">

    <div class="widget-content widget-content-area">
        <form action="{{route('edit_category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-4">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Category Name" value="{{$category->category_name}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="category_name">Category Slug</label>
                    <input type="text" class="form-control" name="category_slug" placeholder="Category Slug" value="{{$category->category_slug}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="category_name">Category Order</label>
                    <input type="number" class="form-control" name="category_order" placeholder="Category Order" value="{{$category->category_order}}">
                </div>
                <div class="form-group form-check col-md-4">
                    <div class="custom-control custom-checkbox checkbox-info">
                        <input type="checkbox" name="allowed_in_home" <?php if($category->allowed_in_home == 1) echo 'checked' ?>>
                        Allow to Homepage
                    </div>
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="category_thumb">
                    <label>Category Thumbnail (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>

                    <input type="file" class="form-control" accept="image/*" name="category_thumb">
                    <br>

                    <img src="{{url($category->category_thumb)}}" width="100%">
                </div>
                <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="category_banner">
                    <label>Category Banner (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <input type="file" class="form-control" accept="image/*" name="category_banner">
                    <br>

                    <img src="{{url($category->category_banner)}}" width="100%">
                </div>
            </div>


            <button type="submit" class="btn btn-primary mt-3">Edit Category</button>
        </form>
    </div>



</div>
@endsection

@push('js')
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script>
          //First upload
          var firstUpload = new FileUploadWithPreview('category_thumb')
          //Second upload
          var secondUpload = new FileUploadWithPreview('category_banner')
      </script>
      @endpush
