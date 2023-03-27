@extends('layouts.admin.app')
@section('content')
    <section class="content-main">
        <form method="POST" action="{{route('subcategory.update')}}">
            @csrf
            @method('PUT')

        </form>
    </section>
@endsection
