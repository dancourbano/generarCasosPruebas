<!DOCTYPE html>
<html>

<header>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script
        src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<link href="{{ url('/') }}/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
<link href="https://bootswatch.com/3/paper/bootstrap.min.css" rel="stylesheet">
<script src="{{ url('/') }}/bootstrap3-editable/js/bootstrap-editable.js"></script>
</header>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://crudegenerator.in">Laravel Crud By Crud Generator</a>
      </div>
      <ul class="nav navbar-nav">
        <li  ><a href="{{Request::root()}}/testcase">Manage Testcase</a></li>
        <li class="active"> <a href="{{Request::root()}}/testcase/add-testcase">Add Testcase</a></li>
      </ul>
  </div>
</nav>
<div>
  
<form class="container">
  <head><h2>Generador de Documentos Casos de Pruebas para Correos</h2></head>
  <div class="form-group">
    <label for="exampleInputEmail1">Proyecto</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Proyecto</label>
    <select class="select form-control">
        <option value="1">CityPaq</option>
        <option value="2">Duapost</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Generar</button>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<br/>
    <table id="tableGenerator" class="table table-striped ">
       
        <thead>
            <tr>
                 
                <th>Test Name</th>
                <th>Description</th>
                <th>Preconditions</th>
                <th>Status</th>
                <th>Action/resultado</th>
                <th>Replicar</th>
            </tr>
        </thead>
        <tbody class="clonedInput">
             <tr>
                
                <td><a href="#" class="testName" data-type="text" data-placement="right" data-title="Enter Name">Name</a></td>
                <td><a href="#" class="description" data-type="textarea" data-placement="right">Description</a></td>
                <td><a href="#" class="preconditions" data-type="textarea" data-placement="right" data-title="Enter preconditions">Conditions</a></td>
                <td><select class="select form-control" id="selectStatus"><option value="1">OK</option><option value="2">Fallido</option></select></td>
                <td><a href="#myModal" data-toggle="modal" class="open-modal btn btn-success" data-id="1">Detalle</a></td>
                <td><button class="agregarFila btn btn-success">+</button><button  class="btn btn-success delete">-</button></td>
             </tr>
             <tr>
                
                <td><a href="#" class="testName" data-type="text" data-placement="right" data-title="Enter Name">Name</a></td>
                <td><a href="#" class="description" data-type="textarea" data-placement="right">Description</a></td>
                <td><a href="#" class="preconditions" data-type="textarea" data-placement="right" data-title="Enter preconditions">Conditions</a></td>
                <td><select class="select form-control" id="selectStatus"><option  value="1">OK</option><option value="2">Fallido</option></select></td>
                <td><a href="#myModal" data-toggle="modal" class="open-modal btn btn-success" data-id="2">Detalle</a>
                </td>
                <td><button class="agregarFila btn btn-success">+</button ><button  class="btn btn-success delete">-</button></td>
             </tr>
        </tbody>
    </table>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle Accion/resultado</h4>
      </div>
      <div class="modal-body">
      <button class="btn btn-primary" onclick="addRowModal()">Agregar Fila</button>
        <table class="table" id="tableModal">
            <thead>
                <tr>
                    <th>Accion</th>
                    <th>Resultado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveTableModal();">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
<script>
var arrayTableModal=[];
var testCaseId;
var tblPrincipal;
 $(document).ready(function() {
    //toggle `popup` / `inline` mode
    activarEditable();
    activarEditableModal();
    getAllDataByProject();
});
     function activarEditable(){
        $.fn.editable.defaults.mode = 'popup';     
    
        //make username editable
        $('.testName').editable();
        $('.description').editable({
            
            title: 'Enter description',
            rows: 10
        });
        $('.preconditions').editable({
            url: '/post',
            title: 'Enter preconditions',
            rows: 10
        });
     }
     function activarEditableModal(){
        $.fn.editable.defaults.mode = 'popup';     
    
        $('.description1').editable({
            
            title: 'Enter description',
            rows: 10
        });
        $('.accion1').editable({
            url: '/post',
            title: 'Enter preconditions',
            rows: 10
        });
     }
 
    
    
var cloneIndex=0;
function clone(){
    $(this).parents("tr").clone()
        .appendTo(".clonedInput")               
        .on('click', 'button.agregarFila', clone);
    cloneIndex++;
    activarEditable();
}
function addRowModal(){

     
    $('#tableModal > tbody:last-child').append('<tr><td><a href="#" class="accion1" data-type="textarea" data-placement="right">Accion1</a></td>'+
                    '<td><a href="#" class="description1" data-type="textarea" data-placement="right">Description1</a></td>'+
                '<td><button type="button" class="btn btn-success delete">'+
                    'Borrar</button></td></tr>');

    activarEditableModal();
}
 
$("button.agregarFila").on("click", clone);
$(document).on("click",'.delete',function(){
    $(this).closest('tr').remove(); 
});
function saveTableModal(){
    var arrTemp=[];
    var tbl = $('#tableModal>tbody> tr:has(td)').map(function(i, v) {
    var $td =  $('td', this);
        return {
                 id: ++i,
                 action: $td.eq(0).text(),
                 resolved: $td.eq(1).text(),
                               
               }
    }).get();
     
   
    guardarTablaPrincipal();
    tblPrincipal.forEach(function(item,idx,arr){  
        
        if(testCaseId==item.id){
            item.detalle=tbl;
            console.log("asdasd "+item.detalle[0].action);
        }
        
    });
    
    
     
}
//cargar Pruebas
$(document).on("click", ".open-modal", function () {
    var flag=false;
    testCaseId = $(this).data('id'); 
    
    $("#tableModal").find("tr:gt(0)").remove();
    tblPrincipal.forEach(function(tbl,index,arr){
        if(tbl.testCaseId==testCaseId){
            tbl.forEach(function(item,index,arr){
                console.log(item.id);        
                $("#tableModal>tbody").append('<tr><td><a href="#" class="accion1" data-type="textarea" data-placement="right">'+item.action+'</a></td>'+
                        '<td><a href="#" class="description1" data-type="textarea" data-placement="right">'+item.resolved+'</a></td>'+
                    '<td><button type="button" class="btn btn-success delete">Borrar</button></td></tr>');
                
            });
        }
    });
    activarEditableModal();
});
function getAllDataByProject(){
    /*$.ajax({
        type: 'GET',  // http method
        url: '',
        data: { myData: 'This is my data.' },  // data to submit
        success: function (data, status, xhr) {
            data
        },
        error: function (jqXhr, textStatus, errorMessage) {
                
        }
    });*/
}
function guardarTablaPrincipal(){
    tblPrincipal = $('#tableGenerator>tbody> tr:has(td)').map(function(i, v) {
    var $td =  $('td', this);
        return {
                id: $td.eq(4).children().data('id'),
                testName: $td.eq(0).children().text(),
                description: $td.eq(1).children().text(),
                preconditions: $td.eq(2).children().text(),
                status: $td.eq(3).children().val(),
                
        }
    }).get();
}
</script>
</html>