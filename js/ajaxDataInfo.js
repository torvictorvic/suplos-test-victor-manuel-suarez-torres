$(document).ready(function(){
    showData();
    $("button").click(function(e){
        console.clear();
        e.preventDefault();
        let url = "ajax/ajaxSearch.php?c="+$('#selectCiudad').val()+"&t="+$('#selectTipo').val()+"&r="+$('#rangoPrecio').val();
        $.get(url, function(data, status){
            if (status=="success") {
                let res = data.split("[SEP]");
                $('#infoDataAjax').html(res[0]);
                $('#totalDataAjax').html("<h5>Resultados de la b&uacute;squeda: "+res[1]+"</h5>");
            }
        });
    });
});

function saveBd(posArray){
    let url = "ajax/ajaxSave.php?pos="+posArray+"&t=1";
    $.get(url, function(data, status){
        if (status=="success") {
            if (parseInt(data)==1) {
                $('#infoAjax').html("Data guardada con exito &#33;");
                $("#infoAjax").css("background-color", "#229100");
                showData();
            } else {
                $('#infoAjax').html("Ya existe #33;");
                $("#infoAjax").css("background-color", "red");
            }
            $("#infoAjax").show().delay(5000).fadeOut();
        }
    });
}

function showData() {
    let url = "ajax/ajaxSave.php?t=2";
    $.get(url, function(data, status){
        if (status=="success") {
            let res = data.split("[SEP]");
            $('#infoDataAjaxBd').html(res[0]);
            $('#totalDataAjaxBd').html("<h5>Bienes guardados: "+res[1]+"</h5>");
        }
    });
}
