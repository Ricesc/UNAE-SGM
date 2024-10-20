@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert alert-{{ $message['level'] }} alert-dismissible {{ $message['important'] ? 'alert-important' : '' }}" role="alert">
            @if ($message['important'])
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif

            {!! $message['message'] !!}

            {{-- Botón para cerrar el mensaje de alerta --}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
