@extends('layout')
@section('contenido')
<div class="container">
 
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">
                        <form method="POST" action="storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ventanita</h4>
      </div>
      <div class="modal-body" ui-view="contenido" >
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<div class="container">
<br>
<br>
<br>
<br>
<h1>Lista de videos</h1>
<table>
    <tr>
        <th>Nombre del Video</th>
    </tr>
    <tr ng-repeat="item in lista">
        <td>@{{item.nombre}}</td>
        <td><button class="btn btn-success glyphicon glyphicon-search" data-toggle="modal" data-target="#myModal" ui-sref="video"  ng-click="onclickReproducir(item)" ></button</td>
    </tr>
</table>
</div>