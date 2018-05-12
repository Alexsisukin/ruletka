@extends('admin.layout')

@section('content')


    <style>td {
            white-space: nowrap;
            word-wrap: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
        }</style>


    <div class="top-bar">
        <h3>Бонус коды</h3>

    </div>


    <div class="well no-padding">


        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Код</th>
                <th>Лиммит</th>
                <th>Использовали</th>
                <th>Сумма </th>
            </tr>
            </thead>
            <tbody>


            @foreach($promo as $i)


                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->code}}</td>
                    <td>{{$i->limit}}</td>
                    <td>{{$i->used}}</td>
                    <td>{{$i->reward}}</td>
                    <td><a href="/admin/promo/{{$i->id}}">Редактировать</a></td>
                </tr>
            @endforeach


            </tbody>
        </table>


    {{$promo->render()}}
    <!-- / Add News: WYSIWYG Edior -->

    </div>
    <!-- / Add News: Content -->


    </div>

    </div>


@endsection
