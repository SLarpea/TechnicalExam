<html>
  <head>
    <title>Import Contacts</title>
  </head>
  <body>
     <h2>Import Contacts</h2>

     <hr>

     @foreach (['success', 'danger', 'warning', 'info'] as $msg)
        @if ($message = Session::get($msg))
            <div class="alert alert-{{ $msg }}">{{ $message }}</div>
        @endif
    @endforeach

     <form method='post' action="{{ route('contact_informations.import_file') }}" enctype='multipart/form-data' >
       {{ csrf_field() }}
       <strong>File:</strong>
       <input type="file" name="file">
       <button type="submit">Submit</button>
     </form>

  </body>
</html>