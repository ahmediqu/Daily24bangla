@extends('admin.layouts.master')
@section('admin-content')
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                @include('admin.message')
                <h4 class="m-t-0 header-title">Categories</h4>

                <table id="selection-datatable" class="table table-bordered dt-responsive nowrap"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Order by position</th>

                        <th>Created date</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @foreach($categories as $category)
                        <?php $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->position == 0)
                                    Header
                                @elseif($category->position == 1)
                                    Footer
                                @else
                                    Both
                                @endif
                            </td>
                            <td>{{ $category->order_by_position }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>

                                <form action="{{route('categories.destroy',$category->id)}}" method="POST"
                                      style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="" class="btn btn-outline-danger"
                                            onClick="return deleteconfirm();"><i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->
    <script>
        function deleteconfirm() {
            deletedata = confirm("Are you sure to delete permanently?");
            if (deletedata != true) {
                return false;
            }
        }
    </script>

@endsection
