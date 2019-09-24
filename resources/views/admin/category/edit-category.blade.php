@extends('admin.master')

@section('body')

    <div class="container"><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>
                    <div calss="card-body">
                        <p class="text-center text-success text-strong">{{ Session:: get('message') }}</p>
                        <form class="form-horizontal" action="{{ route('update-category') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3"><strong>Category Name:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                                     <input type="hidden" class="form-control" name="category_id" value="{{$category->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Category Description:</strong></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="category_description">{{ $category->category_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"><strong>Category Image:</strong></label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control-file" name="category_image">
                                    <img src="{{ asset($category->category_image) }}" height="60" width="80">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"><strong>Public Status:</strong></label>
                                <div class="col-md-12">
                                    <input type="radio" name="publication_status" value="1" {{ $category->publication_status == 1 ? 'checked' : '' }} />Published
                                    <input type="radio" name="publication_status" value="0" {{ $category->publication_status == 0 ? 'checked' : '' }}>Unpublished
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-12">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category">
                                </div>
                            </div>
                        </form><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

