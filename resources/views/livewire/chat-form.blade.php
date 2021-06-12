<div>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" wire:model = 'name'><br>
        @error('name') <small class="text-danger"> {{$message}} </small> @enderror
    </div>
    <div class="form-group">
        <label for="message">Message:</label>
        <input type="text" class="form-control" id="message" wire:model = 'message'><br>
        @error('message') <small class="text-danger"> {{$message}} </small> @enderror

    </div>


    <button class="btn btn-info" wire:click = "sendMessage">Enviar mensaje</button>

    <div class="alert alert-success collapse mt-3" role="alert" id="popudSuccess" style="position: absolute; top: 10px; right: 10px;">
       Tu mensaje Se ha enviado
    </div>

<script>
                 
    // Esto lo recibimos en JS cuando lo emite el componente
    // El evento "enviadoOK"
    $( document ).ready(function() {
        window.livewire.on('messageSended', function () {
            $("#popudSuccess").fadeIn("slow");                
            setTimeout(function(){ $("#popudSuccess").fadeOut("slow"); }, 3000);                                
        });
    });
    
</script>
</div>
