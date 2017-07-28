@extends('layout')
@section('contenido')
<br>
<br>
<br>
<br>

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


<h1>Lista de personas</h1>
<table>
    <tr>
        <th>Nombre</th>
        <th>ApellidoPaterno</th>
        <th>ApellidoMaterno</th>
        <th>CioNit</th>
        <th>Telefono</th>
        <th>Direccion</th>
    </tr>
   

     <tr ng-repeat="item in lista">
        <td>@{{item.Nombres}}</td>
        <td>@{{item.Ape_paterno}}</td>
        <td>@{{item.Ape_materno}}</td>
        <td>@{{item.ci_nit}}</td>
        <td>@{{item.telefono}}</td>
        <td>@{{item.direccion}}</td>
        <td><a href="#" class="btn btn-success glyphicon glyphicon-trash"  ng-click="onclickBorrar1(item.id)" ></a></td>
        <td><a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-success glyphicon glyphicon-refresh"  ui-sref="nuevoPersona"  ng-click="onclickeditar(item)" ></a></td>
        <div> <button data-toggle="modal" data-target="#myModal" class="btn btn-succes" ui-sref="nuevoPersona" >nuevo</button></div>
    </tr>
</table>