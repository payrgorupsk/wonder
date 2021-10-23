@extends('pscp.layouts.app')
@push('css')
    <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
@endpush

@section('content')
<div class="container">
    <div class="container" style="margin: auto;">
        <div class="row">
            <div class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                               <h4>Add New Category</h4>
                            </div>
                        </div>

                    </div>
                    <div class="widget-content widget-content-area">
                    <form>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="category_name">Categpry Name</label>
                                <input type="text" class="form-control" id="category_name" placeholder="Categpry Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category_name">Categpry Order</label>
                                <input type="number" class="form-control" id="category_order" placeholder="Categpry Order">
                            </div>
                            <div class="form-group form-check col-md-4">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="allow_in_home">
                                    <label class="custom-control-label" for="allow_in_home">Allow to Homepage</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="category_thumb">
                                <label>Category Thumbnail (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                            <div class="custom-file-container col-md-6 px-3" style="border:2px solid #0f0f0f0f;" data-upload-id="category_banner">
                                <label>Category Banner (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
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

        </div>
    </div>

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
