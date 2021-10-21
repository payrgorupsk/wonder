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
        <form action="{{route('edit_subcategory')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-3">
                    <label for="parent">Category</label>
                    <select class="form-control basic" name="parent_id" name="parent">
                        <option>Select</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" <?php if($subcategory->parent_id == $category->id) echo 'selected'?>>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="category_name">Sub-Category Name</label>
                    <input type="text" class="form-control" name="sub_category_name" placeholder="Sub-Category Name" value="{{$subcategory->sub_category_name}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="category_name">Slug</label>
                    <input type="text" class="form-control" name="sub_category_slug" placeholder="Slug" value="{{$subcategory->sub_category_slug}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="category_name">Sub-Category Order</label>
                    <input type="number" class="form-control" name="sub_category_order" placeholder="Sub-Category Order" value="{{$subcategory->sub_category_order}}">
                </div>
            </div>

            <input type="text" name="id" value="{{$subcategory->id}}">

            <input type="text" name="sub_category_thumb_path" value="{{$subcategory->sub_category_thumb}}">

            <input type="text" name="sub_category_banner_path" value="{{$subcategory->sub_category_banner}}">

            <div class="form-row mb-4">
                <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="category_thumb">
                    <label>Category Thumbnail (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>

                    <input type="file" class="form-control" accept="image/*" name="sub_category_thumb" onchange="readURL(this);">
                    <br>

                    <img id="sub_category_thumb" src="{{url($subcategory->sub_category_thumb)}}" width="100%">
                </div>
                <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="category_banner">
                    <label>Category Banner (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <input type="file" class="form-control" accept="image/*" name="sub_category_banner" onchange="readURL2(this);">
                    <br>

                    <img id="sub_category_banner" src="{{url($subcategory->sub_category_banner)}}" width="100%">
                </div>
            </div>


            <button type="submit" class="btn btn-primary mt-3">Edit Sub-Category</button>
        </form>
    </div>



</div>
@endsection

@push('js')
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#sub_category_thumb')
                .attr('src', e.target.result)
                .width(auto);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#sub_category_banner')
                .attr('src', e.target.result)
                .width(auto);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endpush
