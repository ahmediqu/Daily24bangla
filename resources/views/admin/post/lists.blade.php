@extends('admin.layouts.master')
@section('admin-content')
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">News </h4>

                <table id="selection-datatable" class="table table-bordered dt-responsive nowrap"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sort description</th>
                        <th>Status</th>

                        <th>Created date</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @foreach($posts as $post)
                        <?php $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                <img src="{{ asset($post->image) }}" alt="" style="height:50px;">
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td> {{ $post->category->name }}</td>
                            <td> {{ $post->sort_description }}</td>
                            <td> {{ $post->status }}</td>
                            <td> {{ $post->created_at }}</td>
                            <td>  test </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
