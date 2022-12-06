@extends('admin.layout.index')
@section('title')
    Danh sách danh mục sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->category_name }}</td>
                                <td>{{ $value->description }}</td>

                                <td>
                                    <a href="{{ asset('category/edit/' . $value->category_id) }}"
                                        class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span>
                                        Edit</a>
                                    <a href="{{ asset('category/delete/' . $value->category_id) }}"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"> </span>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
