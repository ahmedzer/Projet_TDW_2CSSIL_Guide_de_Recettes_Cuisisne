$(document).ready(function () {



   // $('#insertEtapeBtn').prop("disabled",true)
    $('#insertIngredBtn').css("display","none")
    $('#InsertRecetteForm').on('submit',function () {
        console.log("sub")
        return true;
    })
    let result = $('#resultDiv').data("result")
    if(result === 200) {
        $('#InsertRecetteForm').remove()
        $('#selectIngred2').prop("disabled",false)

    }
    if(result=== 201) {
        alert("Erreur dans l'insertion de la recette")
    }
    if( result === 202) {
        alert("Le format de l'image insérée n'est pas valide")
    }

    $('#selectIngred2').change(function (){
        data= $('#selectIngred2 option:selected').text()
        addIngredToUl2($(this).val(),data) //ajouter l element selectionné a la liste
        if($('ul#selectedIngred2 li').length>0) {
            $('#insertIngredBtn').css("display","block")
        }
        else {
            $('#insertIngredBtn').css("display","none")
        }
    })


})



function checkforText(requiredText) { //verifier si l'ingred existe deja dans la list des selectionnés
    let found = false;
    $("#selectIngred2 li").each((id, elem) => {
        if (elem.innerText === requiredText) {
            console.log("true")
            found = true;
        }
    });
    return found;
}

function addIngredToUl2(ingredId,ingredName) {//function d'ajout d'un li a ul avec les autres champs
    if(!checkforText(ingredName) && ingredId!=='0') {
        $("#selectedIngred2").append('<li class="list-group-item" id="'+ingredId+'">'+ingredName+'<input class="form-control" type="number" style="width: 40%" placeholder="Quantité en gramme"><input class="form-control" type="text" style="width: 40%" placeholder="Quantité en text"><button class="btn" style="margin-left: 5%;"><i class="fa fa-trash"></i></button></li>');
    }
}


$(document).on('click', '.btn', function(events){

    $(this).closest("li").remove()
    if($('ul#selectedIngred2 li').length>0) {
        $('#insertIngredBtn').css("display","block")
    }
    else {
        $('#insertIngredBtn').css("display","none")
    }
});

$(document).on('click', '#insertIngredBtn', function(events){//recupere la list des ingred selectionnés
    let ingred_id_list =[];
    let ingred_quantity_gramme =[];
    let ingred_quantity = []
    let lis = document.getElementById('selectedIngred2').getElementsByTagName('li')
    let recette_id = $('#resultDiv').data("recette-id")
    let valid = true
    for(let i=0;i<lis.length;i++) {
        ingred_id_list.push(lis[i].id)
        let inputs = lis[i].getElementsByTagName("input")
        if(inputs[0].value!=="" && inputs[1].value!=="") {
            ingred_quantity_gramme.push(inputs[0].value)
            ingred_quantity.push(inputs[1].value)
        }
        else  {
            valid = false
        }

    }
    if(valid) {
        sendIngredsToRoute2(ingred_id_list,ingred_quantity_gramme,ingred_quantity,recette_id)
        $('#InsertRecetteIngred').remove()
        $('#insertEtapeBtn').prop("disabled",false)
    }
    else  {
        alert("Verifier que vous avez completé tout les champs")
    }

});
function  sendIngredsToRoute2(ingred_id_list,ingred_quantity_gramme,ingred_quantity,recette_id) {
    $.ajax({
        url:"http://localhost/project/Routers/InsertRecetteRoute.php",
        type: "POST",
        data: {
            ingred_id_list:ingred_id_list,
            ingred_quantity_gramme: ingred_quantity_gramme,
            ingred_quantity:ingred_quantity,
            recette_id:recette_id,
        },
        success: function (){

        }
    })
}



/**************inserer etape ***************************************************/

function addEtapeToUl2() {
        $("#etapesSelect").append('<li class="list-group-item" id="xxx"><input class="form-control" type="number" style="width: 40%" placeholder="Numero de votre etape"><input class="form-control" type="text" style="width: 40%" placeholder="Description de votre etape"><button class="btn deleteEtape" style="margin-left: 5%;"><i class="fa fa-trash"></i></button></li>');
}
$(document).on("click","#insertEtapeBtn",function () {
    addEtapeToUl2()
})
$(document).on("click","#EndButton",function () {
    let valid = true
    let num_etapes =[]
    let description_etapes = []
    let etapes = document.getElementById('etapesSelect').getElementsByTagName('li')
    let recette_id = $('#resultDiv').data("recette-id")
    for (let i=0;i<etapes.length;i++) {
        let inputs = etapes[i].getElementsByTagName("input")
        if(inputs[0].value!=="" && inputs[1].value!=="") {
            num_etapes.push(inputs[0].value)
            description_etapes.push(inputs[1].value)
        }
        else  {
            valid = false
        }
    }
    if(etapes.length===0) {
        valid = false;
    }
    if(valid) {
        sendEtapesToRoute(num_etapes,description_etapes,recette_id)
        alert("Votre recette a été ajouté avec succès en attendant la validation de l'admin, merci pour votre confiance !!")
        location.reload()
    }
    else  {
        alert("Vérifier que vous avez compléter tous les champs des étapes")
        location.reload()
    }
})

function sendEtapesToRoute(num_etapes,description_etapes,recette_id ) {
    $.ajax({
        url:"http://localhost/project/Routers/InsertRecetteRoute.php",
        type: "POST",
        data: {
            recette_id:recette_id,
            num_etapes: num_etapes,
            description_etapes: description_etapes
        },
        success: function (){

        }
    })
}

