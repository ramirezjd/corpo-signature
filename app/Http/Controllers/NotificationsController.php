<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
}
