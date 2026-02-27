<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function index()
    {
        return response()->json(SupportTicket::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $ticket = SupportTicket::create($request->all());
        return response()->json($ticket, 201);
    }

    public function update(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $ticket->update($request->only('status'));
        return response()->json($ticket);
    }

    public function destroy($id)
    {
        SupportTicket::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
