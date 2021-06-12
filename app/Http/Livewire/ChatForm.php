<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{
    public $name;
    public $message;

    public function mount()
    {
        $this->name = '';
        $this->message = '';
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|min:3|string',
            'message' => 'required|min:5',
        ]);
    }

    public function sendMessage()
    {   
        //Primero validamos 

        $this->validate([
            'name' => 'required|min:3|string',
            'message' => 'required|min:5',
        ]);

        //este evento se escucha en la vista usando JS para mostrar una notificacion de que el mensaje se ha enviado
        $this->emit('messageSended');

        //este evento se envia a otro componente para notificar que hemos recibido un nuevo mensaje y que debe actualizarse para mostrarlo (por eso se lo pasamos como parametro)

        $datos = [
            "usuario" => $this->name,
            "mensaje" => $this->message,
        ];

        //$this->emit('messageReceived', $datos);  
        
        //esto seria si quisieramos generar un evento local, pero como estamos ineteresado en crear un evento para distintos usuarios que se conecten a un mismo canal, debemos emitir este evento desde JS en la vista, cuando reciba el evento generado gloablmente

        // A continuacion creamos un evento usando pusher
        \event(new \App\Events\EnviarMensaje($this->name, $this->message));
    }

    public function render()
    {
        return view('livewire.chat-form');
    }
}
