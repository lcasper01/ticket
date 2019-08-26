@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if (session('message'))
                    <div class="col alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_ticket', ['ticket' => $ticket->id]) }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title" class="col-md-4 control-label">Заголовок</label>

                        <div class="col">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $ticket->title}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body" class="col-md-4 control-label">Описание</label>

                        <div class="col">
                            <textarea name="body" id="body" cols="30" rows="3" class="form-control" readonly>{{ $ticket->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-md-4 control-label">Ответственный</label>
                        <div class="col">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $ticket->responsible_user}}" readonly>
                        </div>
                    <div class="form-group">
                        @isset($ticket->file_name)
                            <label for="body" class="col-md-4 control-label">Дополнительные данные</label>
                            <div class="col">
                            <a href="{{asset('/storage/'. $ticket->file_name)}}">Файл</a>
                            </div>
                        @endisset
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            @foreach($roles as $role)
                                @if($role->name=='Admin')
                                    <a href="{{ route('edit_ticket', ['id' => $ticket->id]) }}"
                                       class="btn btn-info btn-sm mybtn">Редактировать</a>
                                    <a href="{{ route('status_ticket', ['id' => $ticket->id]) }}"
                                       class="btn btn-info btn-sm mybtn">Выполнен</a>
                                @endif
                            @endforeach
                            <a href="{{ route('ticket_list') }}" class="btn btn-info btn-sm mybtn">
                                Отмена
                            </a>
            </div>
        </div>
@endsection