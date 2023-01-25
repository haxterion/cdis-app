@extends('master')
@section('title', 'Absensi - CDIS')

@section('content')

    <body class="text-center">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <main role="main" class="inner cover">
                <h1 class="cover-heading">Cari Absensi Tutor</h1>
                <div class="container">
                    
                    <input class="typeahead form-control" id="search" type="text">
                    <br/>
                    <a class="btn btn-primary btn-block" role="button">Link</a>
                </div>
            </main>

        </div>
    </body>
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";

        $("#search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#search').val(ui.item.label);
                console.log(ui.item.id);
                return false;
            }
        });
    </script>
    <script type="text/javascript">

    </script>
@endsection
