$(".table").DataTable({

    "language": {



        "sSearch": "Buscar:",
        "sEmptyTable": "No hay datos en la Tabla",
        "sZeroRecords": "No se encontraron resultados",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
        "SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },

        "sLoadingRecords": "Cargando...",
        "sLengthMenu": "Mostrar _MENU_ registros"



    }


})

$("#usuario").change(function () {

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();

    datos.append("VerificarUsuario", usuario);

    $.ajax({
        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function (resultado) {
            if (resultado) {
                $("#usuario").parent().after('<div class="alert alert-danger">El usuario ya existe</div>');
                $("#usuario").val("");
            }
        }
    })

})
$(".table").on("click", ".EditarUsuario", function () {
    var Uid = $(this).attr("Uid");
    var datos = new FormData();

    datos.append("Uid", Uid);

    $.ajax({
        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function (resultado) {
            $("#id").val(resultado["id"]);
            $("#apellido").val(resultado["apellido"]);
            $("#nombre").val(resultado["nombre"]);
            $("#documento").val(resultado["documento"]);
            $("#clave").val(resultado["clave"]);
            $("#rol").val(resultado["rol"]);
        }
    })

})

$(".table").on("click", ".BorrarUsuario", function(){

    var Uid = $(this).attr("Uid");
    var Ufoto = $(this).attr("Ufoto");

    swal({

        type : "warning",
        title: '¿Esta seguro de eliminar el usuario?',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33'
    }).then(function(resultado){
        if(resultado.value){
            window.location= "index.php?url=Usuarios&Uid="+Uid+"&Ufoto="+Ufoto;
        }
    })
})






