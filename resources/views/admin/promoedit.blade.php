@extends('admin.layout')

@section('content')



    <div class="top-bar">
        <h3>Promo {{$promo->id}}</h3>

    </div>



    <div class="well no-padding">

        <!-- Forms: Form -->
        <form method="post" action="/admin/promoedit" class="form-horizontal">
            <input  name="id" value="{{$promo->id}}"  type="hidden">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">



            <!-- Forms: Normal input field -->
            <div class="control-group">
                <label class="control-label" for="inputNormal">Код</label>
                <div class="controls">
                    <input type="text" name="code" value="{{$promo->code}}" placeholder="..." class="input-block-level">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="inputInline">Лиммит</label>
                <div class="controls">
                    <input type="number" name="limit" value="{{$promo->limit}}" placeholder="..." class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputInline">Использовано</label>
                <div class="controls">
                    <input type="number" name="used" value="{{$promo->used}}" placeholder="..." class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputInline">Сумма</label>
                <div class="controls">
                    <input type="number" name="reward" value="{{$promo->reward}}" placeholder="..." class="input-block-level">
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </div>
        </form>
    </div>
    </div>

    </div>

@endsection
