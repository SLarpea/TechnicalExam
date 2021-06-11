<html>
<head>
    <title> Edit Contact</title>
</head>
<body>
    <h2>Add New Contact</h2>
    <a href="{{ route('contact_informations.index') }}">Back</a>

    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact_informations.update', $contactInformation->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="radio" name="title" value="Mr." {{ $contactInformation->title == 'Mr.' ? 'checked' : '' }}> Mr
                    <input type="radio" name="title" value="Ms." {{ $contactInformation->title == 'Ms.' ? 'checked' : '' }}>Ms
                    <input type="radio" name="title" value="Mrs." {{ $contactInformation->title == 'Mrs.' ? 'checked' : '' }}>Mrs
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Firstname:</strong>
                    <input type="text" id="fname" name="firstname" placeholder="Firstname" value="{{ $contactInformation->firstname }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lastname:</strong>
                    <input type="text" id="fname" name="lastname" placeholder="Lastname" value="{{ $contactInformation->lastname }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number:</strong>
                    <input type="tel" id="number" name="number" pattern="^(09|\+639)\d{9}$" value="{{ $contactInformation->number }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company:</strong>
                    <input type="text" id="company" name="company" placeholder="Company" value="{{ $contactInformation->company }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>


</body>
</html>