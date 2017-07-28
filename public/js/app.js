////codigo javascript
var app=angular.module('appmusica',['ui.router']);
//$scope= relaciona la capa de vista y el controlador
//        para uso de variables y funciones (controlador=>vista) 
//$http= para hacer llamadas asincronas al servidor(ajax)
app.controller('pruebaController',function($scope,$http,$state){
    function cargar1(){
        $http.get('/persona/ApiListaPersona').then((server)=>{
            console.log(server);
            console.log(server.data);
            $scope.lista=server.data;
        });
    }
    cargar1();
    $scope.video={};
    $scope.onclickReproducir=function(item){
        $scope.video=item;
    }


    $scope.onclickBorrar=function(id){
        if(confirm('estas seguro de borrar')){
            ///url /musica/2/ApiBorrar
            $http.delete('/estudiantes/'+id+'/ApiBorrarEstudiante').then(server=>{
                if(server.data.estado==1)
                    cargar1();
            });
        }
        else{

        }
    }

    $scope.onclickBorrar1=function(id){
        if(confirm('estas seguro de borrar')){
            ///url /musica/2/ApiBorrar
            $http.delete('/persona/'+id+'/ApiBorrarPersona').then(server=>{
                if(server.data.estado==1)
                    cargar1();
            });
        }
        else{

        }
    }


    $scope.musica={};
    $scope.onclickEnviar=function(){
            console.info("estructura de persona",$scope.musica);
            $http.post( ($scope.editar==false?'/persona/ApiCrearPersona':'/persona/ApiEditarPersona'),$scope.musica).then(function(server){
                if(server.data.estado==1){
                    cargar1();
                    $state.go('button');
                }
            });
            $scope.editar=false;   
            $('#myModal').modal('hide');    
            $scope.musica={};
    }

    $scope.editar=false;
    $scope.onclickeditar=function(item){
        $http.get('/persona/'+item.id+'/ApiGetPersona').then(function(server){
            $scope.musica=server.data;
            $scope.editar=true;
        });
    }

    function cargar2(){
        $http.get('/formulario/ApiListaVideo').then((server)=>{
            console.log(server);
            console.log(server.data);
            $scope.lista=server.data;
        });
    }
    cargar2();


});



app.config(function($stateProvider){
    $stateProvider
    .state('video',{
        views:{
            'contenido':{
                templateUrl:'/formulario/video',
            }
        }
    })
});