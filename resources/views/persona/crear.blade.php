<div class='form'>
<form action="/persona/post" method='post' name="miform" >
    {{csrf_field()}}
    mostrar token
    {{csrf_token()}}
            @foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach

    <div class="form">
        <label for="">Nombres</label>
        <input class="form-control" required  name="nombres" ng-model="musica.nombres">
        <div ng-show="miform.nombres.$invalid"   class="alert alert-danger">
            <ul>
                <li ng-show="miform.nombre.$error.required" > campo obligatorio</li>
            </ul>
        </div>
        <li>{{ $errors->first('nombres') }}</li>
    </div>
    <div class="form">
        <label for="" >Apellido Paterno</label>
        <input class="form-control"  type="text" max="10" name="Ape_paterno" ng-model="musica.Ape_paterno">
        <div ng-show="miform.Ape_paterno.$invalid"   class="alert alert-danger">
            <ul>
                <li ng-show="miform.loggin.$error.required" > campo obligatorio</li>
            </ul>
        </div>
    </div>
      <div class="form">
        <label for="" >Apellido Materno</label>
        <input class="form-control"  type="text" max="10" name="Ape_materno" ng-model="musica.Ape_materno">
        <div ng-show="miform.Ape_materno.$invalid"   class="alert alert-danger">
            <ul>
                <li ng-show="miform.loggin.$error.required" > campo obligatorio</li>
            </ul>
        </div>
    </div>
    <input type="button" ng-disabled="miform.$invalid" ng-click="onclickEnviar()" value="Enviar" class="btn success">
</form>
</div>