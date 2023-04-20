$('.diapoD').click(function (){
    let $diap_id = $(this).closest("tr").attr('id')
    let x= confirm("Voulez-vous vraiment supprimer diaporama  "+$diap_id+"  ?")
    if(x===true) {
        deleteDiap($diap_id)
        $(this).attr("disabled","disabled");
        location.reload();
    }
})
function deleteDiap(diap_id) {
    $.ajax({
        url:"http://localhost/project/Routers/GestionParamRoute.php",
        type:"POST",
        data: {
            id_diap_delete:diap_id,
        },
        success: function (){

        }
    })
}
/**********************edit diapo ***********************************************************/
$('.diapoE').click(function () {
    var $itemId = $(this).closest("tr").attr('id')
    var $tr = $(this).closest("tr")
    var $butText = $(this).text()
    if($butText==="Modifier") {
        $(this).text("Appliquer")
        $tr.attr("contentEditable","true") //donner la main a l'admin de modifier
        $tr.css("border","solid #000000 2px");
    }
    else { //appliquer les modifications
        //recuperer les champs
        let x= confirm("Voulez-vous vraiment modifier diaporama "+$itemId+"  ?")
        if(x) {
            let id_diapo = $tr.find("td:eq(1)").text()
            let titre_diapo = $tr.find("td:eq(2)").text()
            let description_diapo = $tr.find("td:eq(3)").text()
            let image_diapo= $tr.find("td:eq(4)").text()
            let lien_diapo = $tr.find("td:eq(5)").text()
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
            $tr.css("border","solid #e1e1e1 0px");

            mettreAjourDiapo(id_diapo,titre_diapo,description_diapo,image_diapo,lien_diapo)
            location.reload()
        }
        else  {
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
        }
    }
})

function mettreAjourDiapo(id_diapo,titre_diapo,description_diapo,image_diapo,lien_diapo) {
    $.ajax({
        url:"http://localhost/project/Routers/GestionParamRoute.php",
        type:"POST",
        data: {
            id_diapo:id_diapo,
            titre_diapo: titre_diapo,
            description_diapo: description_diapo,
            image_diapo: image_diapo,
            lien_diapo: lien_diapo
        }
    })
}

/**************gestion des parametres ******************************************************************/
$('.paramE').click(function () {
    var $itemId = $(this).closest("tr").attr('id')
    var $tr = $(this).closest("tr")
    var $butText = $(this).text()
    if($butText==="Modifier") {
        $(this).text("Appliquer")
        $tr.attr("contentEditable","true") //donner la main a l'admin de modifier
        $tr.css("border","solid #000000 2px");
    }
    else { //appliquer les modifications
        //recuperer les champs
        let x= confirm("Voulez-vous vraiment modifier le paramètre "+$itemId+"  ?")
        if(x) {
            let id_param = $tr.find("td:eq(0)").text()
            let titre_param = $tr.find("td:eq(1)").text()
            let valeur = $tr.find("td:eq(2)").text()
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
            $tr.css("border","solid #e1e1e1 0px");

            mettreAjourParam(id_param,titre_param,valeur)
            location.reload()
        }
        else  {
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
        }
    }
})

function mettreAjourParam(id_param,titre_param,valeur) {
    $.ajax({
        url:"http://localhost/project/Routers/GestionParamRoute.php",
        type:"POST",
        data: {
            id_param:id_param,
            titre_param: titre_param,
            valeur: valeur
        },
        success: function () {

        }
    })
}

$('#InsertDiapoForm').on('submit',function () {
    console.log("sub")

})