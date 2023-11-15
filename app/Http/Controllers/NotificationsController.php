<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notificaciones = $user->notifications;
        return view('notificaciones.index', [
            'root' => 'Notificaciones',
            'page' => '',
            'notificaciones' => $notificaciones,
        ]);
    }

    public function markRead(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        
        $currentUser = User::findOrFail(Auth::id());
        $notificacion = $currentUser->unreadNotifications->where('id', request('id'))->markAsRead();

        return [
            'success' => true,
            'id' => request('id'),
            'user' => $currentUser,
        ];
    }

    public function readAll()
    {
        $currentUser = User::findOrFail(Auth::id());
        $currentUser->unreadNotifications->markAsRead();

        return redirect('/notificaciones');
    }
}
