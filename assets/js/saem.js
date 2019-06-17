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
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
} 
function soloLetras(e,caracter_especial)
{
    key = e.keyCode || e.which;
    if(caracter_especial == "si")
    {
        
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz-+";
    }
    else
    {
       
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    }
    tecla = String.fromCharCode(key).toLowerCase();
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales)
    {
        if(key == especiales[i])
        {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
    {
        return false;
    }
}