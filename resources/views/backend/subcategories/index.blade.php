@extends('layouts.admin.app')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Sub-Categories</h2>
                <p>Add, edit or delete a Sub-category</p>
            </div>
            <div>
                <input type="text" placeholder="Search Categories" class="form-control bg-white" />
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Parent Category</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>4</td>
                                        <td><b>{{$subcategory->category->name}}</b></td>
                                        <td>{{$subcategory->name}}</td>
                                        <td>/{{$subcategory->slug}}</td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">View detail</a>
                                                    <a class="dropdown-item" href="{{route('subcategories.edit', $subcategory)
                                                    }}">Edit</a>
                                                    <form method="POST" action="{{route('subcategories.destroy', $subcategory)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit"  id="delete" class="btn btn-sm font-sm btn-light rounded show_confirm">
                                                            <i class="material-icons
                                                            md-delete_forever"></i>Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- dropdown //end -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- .col// -->
                </div>
                <!-- .row // -->
            </div>
            <!-- card body .// -->
        </div>
        <!-- card .// -->
    </section>
@endsection
