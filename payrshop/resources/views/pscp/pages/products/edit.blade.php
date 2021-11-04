@extends('pscp.layouts.app')
@push('css')
<link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/editors/markdown/simplemde.min.css')}}">
@endpush

@section('content')
<div class="card">

    <div class="row">
        <div class="col-lg-12 layout-spacing layout-top-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                         <h4>Add New Product</h4>
                     </div>
                 </div>

             </div>

             @if(Session::has('product_edited'))

             <div class="col-md-12">
                 
                 <div class="alert alert-success" role="alert">
                        {{Session::get('product_edited')}}
                    </div>
             </div>

             @endif

             <form action="{{route('edit_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <input type="hidden" name="id" value="{{$product->id}}">

                    <div class="col-md-6 col-sm-12">

                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Product Name" value="{{$product->product_name}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_sku">SKU</label>
                                <input type="text" class="form-control" name="product_sku" placeholder="SKU" value="{{$product->product_sku}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="category_id">Category</label>
                                <select class="form-control basic" name="category_id" name="category_id">
                                    <option>Select</option>
                                    @foreach ($categories as $category)
                                    <option data-url="{{route('categories.subcategory',$category->id)}}" value="{{$category->id}}" <?php if($product->category_id == $category->id) echo 'selected' ?>>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="subcategory_id">Sub Category</label>
                                <select class="form-control basic" name="subcategory_id" name="subcategory_id">
                                    <option>Select</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" <?php if($product->subcategory_id == $subcategory->id) echo 'selected' ?>>{{$subcategory->sub_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="product_stock">Product Stock</label>
                                <input type="text" class="form-control" name="product_stock" placeholder="Product Stock" value="{{$product->product_stock}}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="n-chk col-md-3">
                                <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                  <input type="checkbox" name="payrmall" class="new-control-input" <?php if($product->payrmall == 1) echo 'checked' ?>>
                                  <span class="new-control-indicator"></span>Payrmall
                              </label>
                          </div>
                          <div class="n-chk col-md-3">
                            <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                              <input type="checkbox" name="flash_sale" class="new-control-input"
                              <?php if($product->flash_sale == 1) echo 'checked' ?>>
                              <span class="new-control-indicator"></span>Flash Sale
                          </label>
                      </div>
                      <div class="n-chk col-md-3">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                          <input type="checkbox" name="all_products" class="new-control-input" <?php if($product->all_products == 1) echo 'checked' ?>>
                          <span class="new-control-indicator"></span>All Products
                      </label>
                  </div>
                  <div class="n-chk col-md-3">
                    <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                      <input type="checkbox" name="affiliate" class="new-control-input" <?php if($product->affiliate == 1) echo 'checked' ?>>>
                      <span class="new-control-indicator"></span>Affiliate
                  </label>
              </div>
          </div>
          <div class="form-group row mb-2">
            <div class="form-group col-md-4">
                <label for="country">Country</label>
                <select class="form-control multiselect tagging" name="country" multiple="multiple">
                    <option>Select</option>
                    <option value="All" <?php if($product->country == "All") echo 'selected' ?>>All</option>
                    <option value="Bangladesh" <?php if($product->country == "Bangladesh") echo 'selected' ?>>Bangladesh</option>
                    <option value="United Arab Emirates" <?php if($product->country == "United Arab Emirates") echo 'selected' ?>>United Arab Emirates</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="payment_getway">Payment Gateway</label>
                <select class="form-control multiselect tagging" name="payment_getway" multiple="multiple">
                    <option>Select</option>
                    <option value="Bank" <?php if($product->payment_getway == "Bank") echo 'selected' ?>>Bank</option>
                    <option value="Bkash" <?php if($product->payment_getway == "Bkash") echo 'selected' ?>>Bkash</option>
                    <option value="Paypal" <?php if($product->payment_getway == "Paypal") echo 'selected' ?>>Paypal</option>
                </select>
                <div class="n-chk">
                    <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                      <input type="checkbox" name="cod" class="new-control-input" <?php if($product->cod == 1) echo 'checked' ?>>
                      <span class="new-control-indicator"></span>Cash on Delivery
                  </label>
              </div>
          </div>
          <div class="form-group col-md-4">
            <label for="product_delevery">Delivery Options</label>
            <select class="form-control multiselect tagging" name="product_delevery" multiple="multiple">
                <option>Select</option>
                <option value="All" <?php if($product->product_delevery == "All") echo 'selected' ?>>All</option>
                <option value="Courier" <?php if($product->product_delevery == "Courier") echo 'selected' ?>>Courier</option>
                <option value="Home Delivery" <?php if($product->product_delevery == "Home Delivery") echo 'selected' ?>>Home Delivery</option>
            </select>
        </div>
    </div>

    <div class="form-group mb-2">
        <label for="product_description">Product Description</label>
        <textarea class="form-control" id="product_description" name="product_description" placeholder="Description of the product">{{$product->product_description}}</textarea>
    </div>

</div>

<div class="col-md-6 col-sm-12">


    <div class="form-group mb-2">
        <label for="buy_return_policy">Product Buy and Return Policy</label>
        <textarea class="form-control" id="buy_return_policy" name="buy_return_policy" placeholder="Product Buy and Return Policy">{{$product->buy_return_policy}}</textarea>
    </div>
    <div class="form-group mb-2">
        <div class="custom-file-container" data-upload-id="product_image">

            <?php

                $images = json_decode($product->product_image);

                foreach ($images as $image) {
                    
                    echo '<img src="'.asset('images/products/'.$image).'" width="100px">';
                }
            ?>
            <br><br>
            <label>Upload Product Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
            <label class="custom-file-container__custom-file" >
                <input type="file" name="filename[]" class="custom-file-container__custom-file__custom-file-input" accept = "image/*" multiple>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>

</div>

</div>

</form>


</div>

</div>
</div>


</div>
@endsection

@push('js')
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script src="{{asset('plugins/editors/markdown/simplemde.min.js')}}"></script>
<script>
          //First upload
          var secondUpload = new FileUploadWithPreview('product_image')
      </script>
      <script>
          $(".basic").select2({
              placeholder: "Select"
          });
      </script>
      <script>
          $(".multiselect").select2({
            tags: true,
            placeholder: "Select"
        });
    </script>
    <script>
      new SimpleMDE({
        element: document.getElementById("product_description"),
        spellChecker: true,
    });
</script>
<script>
  new SimpleMDE({
    element: document.getElementById("buy_return_policy"),
    spellChecker: true,
});
</script>

<script>
    $("#category_id").on('select2:select', function (e) {
        $('#subcategory_id').empty();
        $('#subcategory_id').append($("<option></option>")
            .attr("value","")
            .text("Select"));
        if($("#category_id").find(':selected').attr('value')!=''){
            $('#subcategory_id').empty();
            $('#subcategory_id').append($("<option></option>")
                .attr("value","")
                .text("Loading..."));
            $.get($("#category_id").find(':selected').attr('data-url') , function( data, status) {
                    // console.log(data);
                    if(data!="[]"){
                      $('#subcategory_id').empty();
                      $('#subcategory_id').append($("<option></option>")
                        .attr("value","")
                        .text("Select"));
                      $.each(JSON.parse(data), function( k, v ) {
                        $('#subcategory_id').append($("<option></option>")
                            .attr("value",v.id)
                            .text(v.sub_category_name));
                    });
                  }
                  else{
                    $('#subcategory_id').empty();
                    $('#subcategory_id').append($("<option></option>")
                        .attr("value","")
                        .text("Select"));
                }

            });
        }
        $("#subcategory_id").select2();
    });
</script>
@endpush
