<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Municipio</title>
  </head>
  <body>
    <div class="container">
    <h1>Editar Municipio</h1>
    <form method="POST" action="{{route('municipios.update',['municipio'=>$municipio->muni_codi])}}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="codigo" class="form-label">Codigo</label>
          <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id" disabled="disable" value="{{$municipio->muni_codi}}">
          <div id="idHelp" class="form-text">Codigo Municipio</div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Municipio</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Nombre Municipio" value="{{$municipio->muni_nomb}}">
            
          </div>

        <label for="departamento" class="form-label">Departamento:</label>
        <select class="form-select" id="departamento" name="code" required>
            <option selected disabled value="">Seleccionar Uno...</option>
            @foreach ($departamentos as $departamento )
            @if ($departamento->depa_codi ==$municipio->depa_codi)
            <option selected value="{{$departamento->depa_codi}}">{{$departamento->depa_nomb}}</option>
            @else
            <option value="{{$departamento->depa_codi}}">{{$departamento->depa_nomb}}</option>   
            
            @endif   
            @endforeach
        </select>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('municipios.index')}}" class="btn btn-warning">Cancelar</a>
            
            
          </div>
        
      </form>


    </div>

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>