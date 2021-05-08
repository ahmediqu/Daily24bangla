@extends('admin.layouts.master')
@section('admin-content')
    <div class="row justify-content-center">
        <div class="col-8">
            <a href="{{ url('categories.index') }}" class="btn btn-info">Back</a>
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Add new Post</h4>

                @include('admin.message')

                <div class="row">
                    <div class="col-xl-12">
                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <label for="name">Headline</label>
                                <input type="text" class="form-control" id="name"
                                       placeholder="Enter Headline" name="title" required>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="name">Category</label>
                                <select class="form-control select2" name="category_id">
                                    <option>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="name">Sort description</label>
                                <textarea id="textarea" class="form-control" maxlength="225" rows="3"
                                          placeholder="This textarea has a limit of 225 chars."
                                          name="sort_description"></textarea>

                            </fieldset>

                            <fieldset class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control summernote" rows="3" name="description"></textarea>

                            </fieldset>

                            <fieldset class="form-group">
                                <label for="name">Upload Image</label>
                                <input type="file" class="form-control" name="image">

                            </fieldset>

                            <div class="mt-3">
                                <label for="">Status</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="publish" name="status" class="custom-control-input"
                                           value="1" checked>
                                    <label class="custom-control-label" for="publish">Publish</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="unpublish" name="status" class="custom-control-input"
                                           value="0">
                                    <label class="custom-control-label" for="unpublish">Unpublish</label>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div><!-- end col -->


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
