@if(!empty($errors))
    @if($errors->any())
        <ul class="alert alert-danger alert-dismissible fade show" role="alert" style="list-style-type: none">
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            @endforeach
        </ul>
    @endif
@endif
