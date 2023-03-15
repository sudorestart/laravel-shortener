<!DOCTYPE html>
<html>
<head>
    <title>Custom URL Processor</title>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>
<body>
   
<div class="container">
    <h1>Custom URL processor</h1>
   
    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('generate.short.link.post') }}">
            @csrf
            <div>
              <input type="url" name="link" class="form-control" placeholder="Enter URL" >
              <div>
                <button class="btn btn-success" type="submit">Generate Short Link</button>
              </div>
            </div>
        </form>
        
        
        <form method="POST" action="{{ route('expand.link') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link2" class="form-control" placeholder="Enter slug">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Expand Link</button>          
            </div>
            </div>
        </form>

        <form method="POST" action="{{ route('custom.link') }}">
            @csrf
            <div>
              <input type="url" name="link3" class="form-control" placeholder="Enter URL">
              <input type="text" name="link4" class="form-control" placeholder="Enter custom slug">
              <div>
                <button class="btn btn-success" type="submit">Process</button>
        
            
            </div>
            </div>
        </form>

      </div>
      <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            
            <style>
  .tb { border-collapse: collapse; width:300px; }
  .tb th, .tb td { padding: 5px; border: solid 1px #777; }
  .tb th { background-color: lightblue; }
            </style>

            <table class="table tb">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
               
                @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>                            
                            <a href= "{{  route('shorten.link', $row->code) }}"  target="_blank">{{ route('shorten.link', $row->code) }}   </a></td>
                            <td>{{ $row->link }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
</body>
</html>