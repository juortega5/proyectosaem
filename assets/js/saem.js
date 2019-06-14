function sendForm(id_formulario,div_respuesta,destino)
{
    var datos =  $('#'+ id_formulario).serialize();
    $.ajax({
        data: datos,
        type: 'POST', 
        url : destino, 
        success : function (data) {
            $("#"+div_respuesta).html(data);
        }
    });
}

function loadView(metodo,div_respuesta,destino,buscar)
{
    $.ajax({
        data:{"metodo":metodo,"buscar":buscar},
        type: 'POST', 
        url : destino, 
        success : function (data) {
            $("#"+div_respuesta).html(data);
        }
    });
}