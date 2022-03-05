
var TABLE_PADRES;
var ID_ELIMINAR_PADRE;
var CARGAR_ID_PADRE;


$(document).ready(function(){


TABLE_PADRES=$('#listPadres').DataTable({

        	"ajax":{
        		type:'get',
        		url:"http://api1-app.com/api/v1/padres",
        		dataSrc:'data',
        		cache: true	
        		},
        	  columns: [

                    		  /* {
                                    "targets": 0,
                                    "render": function ( data, type, row ) {
                                       
                                        return row.created_at;
                                    }
                                    
                                },*/

                    			{data:'dni_padre'},
                    			{data: 'nombres_padre'},
                    			{data:'apellido_paterno_padre'},
                                {data:'apellido_materno_padre'},
                                {data:'direccion_padre'},
                                {data:'celular_padre'},
                                {data:'email_padre'},
                                 

                                {
                                    "targets": 7,
                                    "render": function ( data, type, row ) {
                                        
                                    return "<a href='#' onclick=\"showEditarPadre('"+row.id+"')\">Editar</a> | <a href='#' onclick=\"confirmarEliminacion('"+row.id+"')\">Eliminar</a>"

                                    }
                                },  
        		]	


	    });
 
  });


function showNewPadre()
{

    var url="/views/padres/frm-new-padres.html";

    $('#modalContainer1').load(url, function(result){

        $('#mdCreate').modal({show:true, backdrop: 'static', size:'lg',keyboard:false});
 
   }); 
}

function showEditarPadre(id){

    CARGAR_ID_PADRE=id;

    var url="/views/padres/frm-editar-padres.html";

    $('#modalContainer1').load(url, function(result){

        $('#mdCreate').modal({show:true, backdrop: 'static', size:'lg',keyboard:false});

        loadDataPadre();
 
    }); 
}

function loadDataPadre()
{
     $.ajax({
        method:"GET",
        url:"http://api1-app.com/api/v1/padres/"+CARGAR_ID_PADRE
        }).done(function(response){

          $("#txtDniPadre").val(response.data.dni_padre);
          $("#txtNombrePadre").val(response.data.nombres_padre);
          $("#txtApellidoPaternoPadre").val(response.data.apellido_paterno_padre);
          $("#txtApellidoMaternoPadre").val(response.data.apellido_materno_padre);
          $("#txtDireccionPadre").val(response.data.direccion_padre);
          $("#txtCelularPadre").val(response.data.celular_padre);
          $("#txtEmailPadre").val(response.data.email_padre);

      
         });
}

function updateDataTable()
{

    TABLE_PADRES.ajax.reload();
}

function confirmarEliminacion(id)
{
    
    ID_ELIMINAR_PADRE=id;
    var url="/views/padres/frm-confirmar-eliminar.html";

    $('#modalContainer1').load(url, function(result){

        $('#mdCreate').modal({show:true, backdrop: 'static', size:'lg',keyboard:false});
 
   }); 
}

function eliminarPadre()
{
    console.log(ID_ELIMINAR_PADRE);

    $.ajax({
            method:"DELETE",
            url:"http://api1-app.com/api/v1/padres/"+ID_ELIMINAR_PADRE
            
            }).done(function(response){

           
        
            $('#mdCreate').modal('hide');

        updateDataTable();

        });
}