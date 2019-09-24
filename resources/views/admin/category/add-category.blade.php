@extends('admin.master')

@section('body')

    <div class="container"><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
                    </div>
                    <div calss="card-body">
                        <p class="text-center text-success text-strong">{{ Session:: get('message') }}</p>
                        <form class="form-horizontal" action="{{ route('new-category') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3"><strong>Category Name:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="category_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Category Description:</strong></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="category_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"><strong>Category Image:</strong></label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control-file" name="category_image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"><strong>Public Status:</strong></label>
                                <div class="col-md-12">
                                    <input type="radio" name="publication_status" value="1" checked>Published
                                    <input type="radio" name="publication_status" value="0">Unpublished
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-12">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Create New Category">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
