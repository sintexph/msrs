@sintexemail

    @slot('content')
        Hello {{ $receiver }} 
        <br>  
        <br> 
        -------APPROVAL MESSAGE HERE AND REQUEST INFO------

        <hr>

        <p><a href="{{ $url }}">{{ $url }}</a></p>
        <small>This approval link is valid only for 30 days</small>
    @endslot 



    @slot('brand', 'Maintenance Service Request System')

    @slot('url')
        http://127.0.0.1:8000/
    @endslot

@endsintexemail