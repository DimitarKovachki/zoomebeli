@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>New Product</h1>
@stop

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h5 class="box-title">Търсене</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/admin/products" role="form form-group" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="title" id="">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="row">
                    @for ($i = 1; $i < 4; $i++)

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="attribute[{{$i}}]">Attribute {{$i}}</label>

                            <select class="form-control select2" name="attribute[{{$i}}]"  class="form-control" id="">
                            <option value="0">Choose attribute</option>
                            @foreach ($attributes as $attribute)
                            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                            @endforeach
                            </select>

                        </div>
                    </div>
                    @endfor
                </div>
                <div class="row">
                    @for ($i = 1; $i < 10; $i++)

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="image[{{$i}}]">Image {{$i}}</label>
                            <input type="file" name="image[{{$i}}]">
                        </div>
                    </div>
                    @endfor
                </div>
                <div class="row">

                    @foreach ($categories as $category)

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="{{$category->id}}">
                                <input id="{{$category->id}}" type="checkbox" value="{{$category->id}}" name="categories[]">
                                {{$category->parent_id ? $categories->where('id', $category->parent_id)->first()->name."->": '' }}{{$category->name}}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h4>Product variations</h4>
                @for ($i = 0; $i < 5; $i++)
                <div class="row">


                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="size[]">Size</label>
                            {{-- <label for="exampleInputEmail1">Current Price</label> --}}
                            <input type="text" name="size[]"  class="form-control" id="">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="base_price[]">Base Price</label>
                            {{-- <label for="exampleInputEmail1">Current Price</label> --}}
                            <input type="text" name="base_price[]"  class="form-control" id="">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="weight[]">Weight (g)</label>
                            {{-- <label for="exampleInputEmail1">Current Price</label> --}}
                            <input type="text" name="weight[]"  class="form-control" id="">
                        </div>
                    </div>
                </div>
                    @endfor

                @csrf
                <input type="submit" value="Save" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@endsection
