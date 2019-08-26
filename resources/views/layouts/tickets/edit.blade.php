@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Редактирование тикета</h2>
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                      action="{{ route('update_ticket', ['ticket' => $ticket->id]) }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title" class="col-md-4 control-label">Заголовок</label>

                        <div class="col">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $ticket->title}}"
                                   required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body" class="col-md-4 control-label">Описание</label>

                        <div class="col">
                            <textarea name="body" id="body" cols="30" rows="3" class="form-control"
                                      required>{{ $ticket->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <input type="file" multiple name="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Сохранить
                            </button>
                            <a href="{{ route('ticket_list') }}" class="btn btn-primary">
                                Отмена
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection