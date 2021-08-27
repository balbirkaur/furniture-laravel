@extends('layouts.master')
@section('title')
Furniture Product Edit
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Product</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ url('/product-update/'.$products['allproducts']->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="product_title" class="form-control"
                                    value="{{$products['allproducts']->title}}">
                                <input type="hidden" id="product_id" name="product_id" class="form-control"
                                    value="{{$products['allproducts']->id}}">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_category" class="col-form-label">Category:</label>
                                    <select name="prod_cate_id" class="form-control" id="prod_cate_id">
                                        @foreach($products['allcategories'] as $key =>$pcat)
                                        <option @if ($pcat['id']==$products['allproducts']->prod_cate_id)
                                            {{"selected=selected"}} @else @endif
                                            value="{{$pcat['id']}}">{{$pcat['product_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Image</label>
                                    <input type="file" name="productpic" class="form-control">
                                    @if($products['allproducts']->productpic)
                                    <img src="{{asset('uploads/product/'.$products['allproducts']->productpic)}}">
                                    @else
                                    No Image
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Additional Images</label>
                                    <div class="alert alert-warning" style="display:none">
                                        <p></p>
                                    </div>

                                    <input type="file" name="productpics[]" class="form-control" multiple
                                        id="productpics" placeholder="Post Image" style="position:relative;">

                                    <div> <a class="btn btn-success" id="uploadFile" name='submitImage' />Upload
                                        Additional Images</a></div>
                                    <br />

                                    <div class="row">
                                        @foreach($products['allimages'] as $key=>$value)
                                        <div class="col-md-4"><img
                                                src="{{asset('uploads/product/'.$value->productpic)}}" height="150"
                                                width="150"></div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-inline">
                                    <label for="featured" class="col-form-label">Featured:</label>&nbsp;&nbsp;
                                    Yes &nbsp;<input name="featured" type="radio" class="form-control" value="Yes"
                                        @if($products['allproducts']->featured=="Yes")
                                    {{"checked=checked"}} @else @endif>&nbsp;&nbsp;
                                    No &nbsp;<input name="featured" type="radio" class="form-control" value="No"
                                        @if($products['allproducts']->featured=="No")
                                    {{"checked=checked"}} @else @endif>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_date" class="col-form-label">Date:</label>
                                    <input name="product_date" value="{{$products['allproducts']->product_date}}"
                                        type="date" class="form-control" id="product_date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="product_description" class="form-control" id="product_description"
                                        rows="3">{{$products['allproducts']->description}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Product</button>
                            <a href="{{ url('product-list') }}" class="btn btn-danger mb-2">Cancel</a>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
@section('scripts')
<script src="{{ url('assets/js/core/jquery.min.js') }}"></script>

<script type="text/javascript">
    $( document ).ready(function() {
    $("#uploadFile").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            let image_upload = new FormData;
            let TotalImages = $('#productpics')[0].files.length; //Total Images
            let images = $('#productpics')[0];
          //  for (let i = 0; i < TotalImages; i++) {
         //       image_upload.append('images' + i, images.files[i]);
         //   }
            $.each($('#productpics')[0].files, function(i, file) {
                image_upload.append('images' + i, file);
            });

            image_upload.append('TotalImages', TotalImages);
            image_upload.append('product_id', $('#product_id').val());

            $.ajax({
                url: "{{ url("product-images-store")}}/"+$('#product_id').val(),
                type: 'POST',
                contentType: false,
                processData: false,
                data: image_upload,
                success: function(result) {
                    $("div.alert").show();
                    $("div.alert p").text(result.message);
                    $('#productpics').val("");
                    setTimeout(function() {
                        $("div.alert").hide();
                    }, 9000); // 9 secs
                }
            });


    });

});
</script>
<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ url('assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your product! -->
<script src="{{ url('assets/demo/demo.js') }}"></script>
@endsection
