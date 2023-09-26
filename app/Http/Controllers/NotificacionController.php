<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        //obtenemos las notificaiones no leídas
        $notificaciones = auth()->user()->unreadNotifications;

        //obtenemos el historial de notificaciones leidas
        $historialNotificaciones = auth()->user()->readNotifications;

        //marcamos las notificaciones no leidas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones,
            'historialNotificaciones' => $historialNotificaciones
        ]);
    }
}
