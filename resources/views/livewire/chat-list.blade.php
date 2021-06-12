<div>
    <h5 class="mt-3"><strong>Lista de Mensajes</strong></h5>
    @foreach ($messages as $message)
        <p class="p-5" style="background: lightslategray"> {{$message['usuario']}}  :  {{$message['mensaje']}} </p>
    @endforeach


    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('d74d68bd626d420c3a7d', {
          cluster: 'us2'
        });
    
        var channel = pusher.subscribe('chat-chanel');
        channel.bind('chat-event', function(data) {
          //generar el evento para actualizar la lista de comentarios
          window.livewire.emit('messageReceived', data);
        });
      </script>
</div>
