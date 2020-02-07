
<!DOCTYPE html>
    <html lang="en">
    <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          <title>Contact Us</title>
    </head>
        <body>

          <div style="width: 500px; margin: 0 auto; margin-top: 90px;">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if(Session::has('message'))
                {{Session::get("message")}}
            @endif

          <h3>Tags Management  <a href="{{ route('createTag_GET') }}" class="btn btn-primary float-right">Add</a></h3>

          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tag Name</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if( count( $tags ) > 0 )
                    @foreach( $tags as  $key=> $tag )
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $tag->tag }}</td>
                            <td><p><a href="javascript:;" class="text-primary">Edit</a>|<a href="javascript:;" class="text-primary">Delete</a></p></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No Records found.</td>
                    </tr>
                @endif
            </tbody>
            </table>
        </div>
    </body>
    </html>
