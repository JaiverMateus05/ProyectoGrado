$("#select2").select2();

$("#select2-1").select2();

$(".row").on("click",".EliminarAula", function(){
    var Aid = $(this).attr("Aid");

    swal({
        type: "warning",
        title: "¿Esta seguro de que quiere eliminar el aula?",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#d33",
        confirmButtonText: "Aceptar",
        confirmButtonColor: "#3085d6"
    }).then(function(resultado){
        if(resultado.value){
            window.location = "index.php?url=Aulas&Aid="+Aid;
        }
    })
})


$("#date").datepicker({

    autoclose: true
    
})