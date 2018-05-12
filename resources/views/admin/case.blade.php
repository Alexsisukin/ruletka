@extends('admin.layout')

@section('content')



    <div class="top-bar">
        <h3>Кейс {{$case->id}}-го уровня</h3>

    </div>



    <div class="well no-padding">

        <!-- Forms: Form -->
        <form method="post" action="/admin/casedit" class="form-horizontal">
            <input  name="id" value="{{$case->id}}"  type="hidden">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">



            <!-- Forms: Normal input field -->
            <div class="control-group">
                <label class="control-label" for="inputNormal">Name</label>
                <div class="controls">
                    <input type="text" name="name" value="{{$case->name}}" placeholder="..." class="input-block-level">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="inputInline">Price</label>
                <div class="controls">
                    <input type="number" name="price" value="{{$case->price}}" placeholder="..." class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputInline">Image</label>
                <div class="controls">
                    <input type="text" name="image" value="{{$case->image}}" placeholder="..." class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputNormal">Type</label>

                <select class="input-block-level" name="type" style="margin-left:30px;">
                      <option value="money" @if($case->type == 'def') selected @endif>Default</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </div>
        </form>
    </div>
    </div>

    </div>

@endsection
