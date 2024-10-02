<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado Departamentos</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('comunas.index')}}">Comunas</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('municipios.index')}}">Municipios</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Departamentos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('paises.index')}}">Paises</a>
            </li>
            
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <!----- FINALIZA MENU----> 
    
    <div class="container">
    <h1>Listado Departamentos</h1>

    <a href="{{ route('departamentos.create') }}" class="btn btn-success">Add</a>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Code</th>
            <th scope="col">Departamento</th>
            <th scope="col">pais</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento)
          <tr>
            <th scope="row">{{$departamento->depa_codi}}</th>
            <td>{{$departamento->depa_nomb}}</td>
            <td>{{$departamento->pais_nomb}}</td>
            <td>
                <a href="{{route('departamentos.edit',['departamento'=>$departamento->depa_codi])}}" class="btn btn-info">Editar</a>
                <form action="{{route('departamentos.destroy', ['departamento'=>$departamento->depa_codi])}}" method="POST" style="display: inline-block">
                @method('delete')
                @csrf
                <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </div>
  </body>
</html>