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
                    <div class="offset-md-2 col-md-8 offset-md-2">
                        <form method="POST" action="{{route('subcategory.store')}}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input name="name" type="text" placeholder="Name" class="form-control"
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

                            <div class="mb-4">
                                <label class="form-label">Parent</label>
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="description" placeholder="Type here"
                                          class="form-control">
                                    {{old('description')}}</textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">Create category</button>
                            </div>
                        </form>
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
