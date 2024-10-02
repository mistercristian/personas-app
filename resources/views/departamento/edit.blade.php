<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Comuna</title>
  </head>
  <body>
    <div class="container">
    <h1>Editar Comuna</h1>
    <form method="POST" action="{{route('departamentos.update',['departamento'=>$departamento->depa_codi])}}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="codigo" class="form-label">Codigo</label>
          <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id" disabled="disable" value="{{$departamento->depa_codi}}">
          <div id="idHelp" class="form-text">Codigo Departamento</div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Departamento</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Nombre Departamento" value="{{$departamento->depa_nomb}}">
            
          </div>

        <label for="pais" class="form-label">Pais:</label>
        <select class="form-select" id="pais" name="code" required>
            <option selected disabled value="">Seleccionar Uno...</option>
            @foreach ($paiss as $pais )
            @if ($pais->pais_codi ==$departamento->pais_codi)
            <option selected value="{{$pais->pais_codi}}">{{$pais->pais_nomb}}</option>
            @else
            <option value="{{$pais->pais_codi}}">{{$pais->pais_nomb}}</option>   
            
            @endif   
            @endforeach
        </select>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('departamentos.index')}}" class="btn btn-warning">Cancelar</a>
            
            
          </div>
        
      </form>


    </div>

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>