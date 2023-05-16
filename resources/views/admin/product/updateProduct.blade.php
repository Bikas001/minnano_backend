@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" {{ route('product.index') }} ">product</a></li>
                    <li class="breadcrumb-item active " aria-current="page">Update Product</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 col-space">
            <h3>Update Product</h3>
            <hr>
            <form method="POST" action="{{ route('product.update', $product) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input name="_method" type="hidden" value="PATCH">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Course Title</label>
                        <input type="text" name="title" class="form-control" id="inputEmail4" value="{{$product->title}}" placeholder="Enter Course Title">
                        @error('title')
                        <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Choose Product Cover Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="coverImage" value="{{$product->coverImage}}" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('coverImage')
                    <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label></label>
                    <textarea name="description" rows="5" id="ckeditor" class="form-control">{{$product->description}}</textarea>
                    @error('description')
                    <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success shadow" />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection