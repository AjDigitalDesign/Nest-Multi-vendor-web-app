@extends('layouts.admin.app')
@section('content')
    <section class="content-main">
            <form method="POST" action="{{route('brands.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Add New Brand</h2>
                            <div>
                                <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                                <button type="submit" class="btn btn-md rounded font-sm hover-up">Publich</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="name" class="form-label">Brand Name</label>
                                   <input name="name" type="text" placeholder="Brand Name" class="form-control"
                                          id="name"
                                          value="{{old('name')}}" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-4">
                                    <label for="slug" class="form-label">Permalink</label>
                                    <input type="text" placeholder="Enter Permalink" class="form-control" id="slug"
                                           name="slug"
                                           value="{{old('slug')}}" />
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2 text-danger" />
                                </div>

{{--                                <div class="row gx-3">--}}
{{--                                    <div class="col-md-4 mb-3">--}}
{{--                                        <label for="product_sku" class="form-label">SKU</label>--}}
{{--                                        <input type="text" placeholder="Type here" class="form-control" id="product_sku" />--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 mb-3">--}}
{{--                                        <label for="product_color" class="form-label">Color</label>--}}
{{--                                        <input type="text" placeholder="Type here" class="form-control" id="product_color" />--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 mb-3">--}}
{{--                                        <label for="product_size" class="form-label">Size</label>--}}
{{--                                        <input type="text" placeholder="Type here" class="form-control" id="product_size" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="mb-4">
                                    <label for="product_brand" class="form-label">Brand</label>
                                    <input type="text" placeholder="Type here" class="form-control" id="product_brand" />
                                </div>
                            </div>
                        </div>
                        <!-- card end// -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div>
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" placeholder="Type here"
                                              class="form-control" rows="4">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- card end// -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" id="status">
                                        <option value="publish">Published</option>
                                        <option value="draft">Draft</option>
                                        <option value="pending-approval">Pending Approval</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div>
                                    <div class="input-upload">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2" id="logo_preview"
                                             height="60"
                                             width="60"
                                             src="{{asset('uploads/brands/images/default/placeholder.png')}}" alt="">

                                        <input type="file" class="form-control" name="logo"
                                               id="logo_img"
                                               value="{{old('logo')}}">
                                        <x-input-error :messages="$errors->get('logo')" class="mt-2 text-danger" />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card end// -->
                    </div>
                </div>
            </form>
    </section>
    <script
        src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#logo_img').change(function(e){
                const image_reader = new FileReader();
                image_reader.onload = function (e){
                    $('#logo_preview').attr('src', e.target.result);
                }
                image_reader.readAsDataURL(e.target.files['0']);
            });
        })
    </script>
@endsection
