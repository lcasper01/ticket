<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $roles = User::find($id)->roles;
        $tickets = Ticket::get();
        return view('layouts.tickets.main', compact('tickets', 'roles'));
    }

    public function show_ticket(int $ticketid)
    {
        $id_user = Auth::user()->id;
        $roles = User::find($id_user)->roles;
        $ticket = Ticket::where('id', $ticketid)->first();
        return view('layouts.tickets.show_ticket', compact('ticket', 'roles'));
    }


    public function create()
    {
        $id = Auth::user()->id;
        $users = User::where('id', '!=', $id)->get();
        return view('layouts.tickets.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $data['file_name'] = $path;
        }
        Ticket::create($data);
        return redirect()->route('ticket_list')->with('message', 'Тикет создан');
    }

    public function edit(Ticket $ticket)
    {
        return view('layouts.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, int $id)
    {
        $data = $request->only('title', 'body');
        $data['slug'] = Str::slug($data['title']);
        $ticket = Ticket::where('id', $id);
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $data['file_name'] = $path;
        }
        $ticket->update($data);
        return redirect()->route('ticket_list')->with('message', 'Тикет изменен');
    }

    public function status(int $id)
    {
        $ticket = Ticket::where('id', $id);
        $data['status'] = true;
        $ticket->update($data);
        return back()->with('message', 'Состояние тикета изменено на "Выполнен"');
    }

    public function delete(int $id)
    {
        $ticket = Ticket::where('id', $id);
        $ticket->delete();
//        return back()->with('message', 'Тикет удален');
    }

}
