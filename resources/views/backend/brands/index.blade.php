@extends('layouts.admin.app')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Brands List</h2>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div>
                <a href="#" class="btn btn-light rounded font-md">Export</a>
                <a href="#" class="btn btn-light rounded font-md">Import</a>
                <a href="{{route('brands.create')}}" class="btn btn-primary btn-sm rounded">Add New</a>
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row align-items-center">
                    <div class="col col-check flex-grow-0">
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" value="" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                        <select class="form-select">
                            <option selected>All category</option>
                            <option>Electronics</option>
                            <option>Clothes</option>
                            <option>Automobile</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <input type="date" value="02.05.2021" class="form-control" />
                    </div>
                    <div class="col-md-2 col-6">
                        <select class="form-select">
                            <option selected>Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                            <option>Show all</option>
                        </select>
                    </div>
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                @foreach($brands as $brand)
                    <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col col-check flex-grow-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                            <a class="itemside" href="{{route('brands.edit', $brand)}}">
                                <div class="left">
                                    <img src="{{(!empty($brand->logo)) ? url
                                           ('uploads/brands/brand_logo/'.$brand->logo) : url
                                           ('uploads/brands/images/default/placeholder.png')
                                        }}" class="img-sm img-thumbnail" alt="" />
                                </div>
                                <div class="info">
                                    <h6 class="mb-0">{{$brand->name}}</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-price"><span>Items - 340</span></div>
                        <div class="col-lg-2 col-sm-2 col-4 col-status">
                            <span class="badge rounded-pill alert-success">{{strtoupper($brand->status)}}</span>
                        </div>
{{--                        <div class="col-lg-1 col-sm-2 col-4 col-date">--}}
{{--                            <span>02.11.2021</span>--}}
{{--                        </div>--}}
                        <div class="col-lg-2 col-sm-2 col-4 col-action text-end d-flex justify-content-between">
                            <a href="{{route('brands.edit', $brand)}}" class="btn btn-sm font-sm rounded btn-brand"> <i
                                    class="material-icons
                            md-edit"></i> Edit </a>

                            <form method="POST" action="{{route('brands.destroy', $brand)}}">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit"  id="delete" class="btn btn-sm font-sm btn-light rounded show_confirm">
                                    <i class="material-icons
                                md-delete_forever"></i>Delete</button>
                            </form>

                        </div>
                    </div>
                    <!-- row .// -->
                </article>
                @endforeach
                <!-- itemlist  .// -->
            </div>
            <!-- card-body end// -->
        </div>
        <!-- card end// -->
        <div class="pagination-area mt-30 mb-50">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-start">
                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
@endsection
