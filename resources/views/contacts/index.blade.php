<html>
<head>
    <title>Contact Information</title>
</head>
<body>
    <h2>All Contacts</h2>
    <a href="{{ route('contact_informations.create') }}"> Add New Contact</a>
    <a href="{{ route('contact_informations.import') }}"> Import from file</a>

    <hr>
    @foreach (['success', 'danger', 'warning', 'info'] as $msg)
        @if ($message = Session::get($msg))
            <div class="alert alert-{{ $msg }}">{{ $message }}</div>
        @endif
    @endforeach

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Title</td>
                <td>Firstname</td>
                <td>Lsstname</td>
                <td>Number</td>
                <td>Company</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->title }}</td>
                <td>{{ $contact->firstname }}</td>
                <td>{{ $contact->lastname }}</td>
                <td>{{ $contact->number }}</td>
                <td>{{ $contact->company }}</td>
                <td>
                    <form action="{{ route('contact_informations.destroy',$contact->id) }}" method="POST">   
                        <a class="btn btn-primary" href="{{ route('contact_informations.edit',$contact->id) }}">Edit</a>   
                        @csrf
                        @method('DELETE')      
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this contact?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</body>
</html>