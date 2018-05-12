@extends('admin.layout')

@section('content')



    <div class="top-bar">
        <h3>Новый promo</h3>

    </div>



    <div class="well no-padding">

        <!-- Forms: Form -->
        <form method="post" action="/admin/addPromo" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- Forms: Normal input field -->
            <div class="control-group">
                <label class="control-label" for="inputNormal">Код</label>
                <div class="controls">
                    <input type="text" name="code" value="" placeholder="..." class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputNormal">Сумма</label>
                <div class="controls">
                    <input type="number" name="reward" value="" placeholder="..." class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputNormal">Лимит</label>
                <div class="controls">
                    <input type="number" name="limit" value="" placeholder="..." class="input-block-level">
                </div>
            </div>


            <!-- / Forms: Form Textarea -->


            <!-- Forms: Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </div>
            <!-- / Forms: Form Actions -->

        </form>
        <!-- / Forms: Form -->


        <!-- / Add News: WYSIWYG Edior -->

    </div>
    <!-- / Add News: Content -->




    </div>

    </div>

@endsection
