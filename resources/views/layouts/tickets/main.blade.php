@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert-success">
                {{session('message')}}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Наименование</th>
                <th scope="col">Описание</th>
                <th scope="col">Ответственный</th>
                <th scope="col">Состояние</th>
                <th scope="col">Действие</th>

            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td>{{$ticket->body}}
                        @isset($ticket->file_name)
                            <a href="{{asset('/storage/'. $ticket->file_name)}}">файл</a>
                        @endisset
                    </td>
                    <td>{{$ticket->responsible_user}}</td>
                    <td>
                        @if ($ticket->status==1)
                            Выполнен
                        @else
                            Не выполнен
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('show_ticket', ['id' => $ticket->id]) }}" class="btn btn-info btn-sm mybtn">Просмотр</a>
                        @if(Auth::user()->name==$ticket->responsible_user)
                            <a href="{{ route('status_ticket', ['id' => $ticket->id]) }}"
                               class="btn btn-info btn-sm mybtn">Выполнен</a>
                        @endif
                        @foreach($roles as $role)
                            @if($role->name=='Admin')
                                <a href="{{ route('edit_ticket', ['id' => $ticket->id]) }}"
                                   class="btn btn-info btn-sm mybtn">Редактировать</a>
                                <a href="{{ route('status_ticket', ['id' => $ticket->id]) }}"
                                   class="btn btn-info btn-sm mybtn">Выполнен</a>
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
