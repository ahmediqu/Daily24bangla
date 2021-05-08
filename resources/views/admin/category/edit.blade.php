@extends('admin.layouts.master')
@section('admin-content')
    <div class="row justify-content-center">
        <div class="col-8">
            <a href="{{ url('categories.index') }}" class="btn btn-info">Back</a>
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Add new Catgory</h4>

                @include('admin.message')

                <div class="row">
                    <div class="col-xl-12">
                        <form method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <fieldset class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name"
                                       placeholder="Enter Cateegory name" name="name" value="{{ $category->name }}" required>
                            </fieldset>

                            <div class="mt-3">
                                <label for="">Category Position</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="header" name="position" class="custom-control-input"
                                           value="0" checked>
                                    <label class="custom-control-label" for="header">Header</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="footer" name="position" class="custom-control-input"
                                           value="1">
                                    <label class="custom-control-label" for="footer">Footer</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="both" name="position" class="custom-control-input"
                                           value="2">
                                    <label class="custom-control-label" for="both">Both</label>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="form-group">
                                    <label for="">Order by position (optional)</label>
                                    <input type="text" class="form-control" name="order_by_position">
                                </div>
                            </div>

                            <div class="mt-3">
                                <label for="">Category Status</label>
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
