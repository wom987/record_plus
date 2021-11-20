var URL='http://127.0.0.1:8000/';
$('#userType').change(function(){
    if($('#userType').find(":selected").text()=="Administrador"){
        $('#music_container').hide();
    }else{
        $('#music_container').show();
    }
});
$( document ).ready(function() {
    if($('#userType').find(":selected").text()=="Administrador"){
        $('#music_container').hide();
    }else{
        $('#music_container').show();
    }
});
//delete user
function deleteUser(id) {
    alertify.confirm(
        "¿Desea eliminar el registro?",
        "Nota: Esta accion no se puede revertir",

        function () {
            try {
                fetch(URL + "users/" + id, {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    method: "DELETE",
                    data: {
                        _token: $("meta[name='csrf-token']").attr("content"),
                    },
                    dataType: "json",
                })
                    .then((response) => {
                        response.json();
                    })
                    .then((data) => {
                        alertify.error("Registro Eliminado!");
                    })
                    .then(() => {
                        $("#sid" + id).remove();
                    });
            } catch (error) {
                console.log(error);
            }
        },
        function () {
            alertify.success("Accion cancelada!");
        }
    );
}
//delete disk
function deleteDisk(id) {
    alertify.confirm(
        "¿Desea eliminar el registro?",
        "Nota: Esta accion no se puede revertir",

        function () {
            try {
                fetch(URL + "disks/" + id, {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    method: "DELETE",
                    data: {
                        _token: $("meta[name='csrf-token']").attr("content"),
                    },
                    dataType: "json",
                })
                    .then((response) => {
                        response.json();
                    })
                    .then((data) => {
                        alertify.error("Registro Eliminado!");
                    })
                    .then(() => {
                        $("#sid" + id).remove();
                    });
            } catch (error) {
                console.log(error);
            }
        },
        function () {
            alertify.success("Accion cancelada!");
        }
    );
}