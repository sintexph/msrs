@sintexemail

    @slot('content')
        Hello {{ $receiver }} 
        <br>  
        <br>        
        This is to inform you that you have a pending Service Request for Approval.

        <hr>

        Click on the link to continue
    @endslot 



    @slot('brand', 'Maintenance Service Request System')

    @slot('url')
        http://127.0.0.1:8000/
    @endslot

@endsintexemail