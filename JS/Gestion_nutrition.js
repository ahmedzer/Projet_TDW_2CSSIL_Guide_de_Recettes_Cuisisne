$(document).ready(function () {
    $(".table").DataTable({
        language: {
            "lengthMenu": "Afficher _MENU_ entrées",
            "emptyTable": "Pas données trouvées",
            "search": "Rechercher :  ",
            "info": "Afficher _START_ a _END_ des _TOTAL_ entrées",
            "infoEmpty": "Afficher 0 a 0 des 0 entrées",
            "infoFiltered": "(filtré de _MAX_ entrées totale)",
            "paginate": {
                "first": "Premier ",
                "last": "Dernier ",
                "next": "Suivant ",
                "previous": "Précedent "
            },
        }
    });
    let elements = document.getElementsByClassName('dataTables_wrapper no-footer')
    for (let i = 0; i < elements.length; i++) {
        let subElements = elements[i].getElementsByTagName('input')
        //changer la zone de recherche ajouter la classe bootstrap
        for (let j = 0; j < subElements.length; j++) {
            subElements[j].classList.add('form-control')
        }
        //changer le select
        let selects = elements[i].getElementsByTagName('select')
        for (let j = 0; j < selects.length; j++) {
            selects[j].classList.add('form-select')
        }
    }

    let result = $('#resultDiv').data("result")
    if(result === 200) {
        $('#resultDiv').remove()
    }
    if(result=== 201) {
        alert("Erreur dans l'insertion de la recette")
    }

    $('#InsertIngredForm').on('submit',function () {
        console.log("sub")

    })
})

$('.IngredD').click(function (){
    let $ingred_id = $(this).closest("tr").attr('id')
    let x= confirm("Voulez-vous vraiment supprimer l'ingrédient  "+$ingred_id+"  ?")
    if(x===true) {
        deleteIngred($ingred_id)
        $(this).attr("disabled","disabled");
        location.reload();
    }
})

function deleteIngred(id_ingred) {
    $.ajax({
        url:"http://localhost/project/Routers/Gestion_nutrition_Route.php",
        type:"POST",
        data: {
            id_ingred_delete:id_ingred,
        },
        success: function (){

        }
    })
}
/************************************************ Modifier ingred ********************************************************/

$('.IngredE').click(function () {
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
        let x= confirm("Voulez-vous vraiment modifier l'ingrédient "+$itemId+"  ?")
        if(x) {
            let id_ingred = $tr.find("td:eq(1)").text()
            let nom_ingred = $tr.find("td:eq(2)").text()
            let health_note_ingred = $tr.find("td:eq(3)").text()
            let cout_ingred= $tr.find("td:eq(4)").text()
            let saison_i = $tr.find("td:eq(5)").text()
            let calories = $tr.find("td:eq(6)").text()
            let proteines = $tr.find("td:eq(7)").text()
            let glucides = $tr.find("td:eq(8)").text()
            let lipides = $tr.find("td:eq(9)").text()
            let eau = $tr.find("td:eq(10)").text()
            let fibres = $tr.find("td:eq(11)").text()
            let vitamines = $tr.find("td:eq(12)").text()
            let description_ingred = $tr.find("td:eq(13)").text()
            let image_ingred = $tr.find("td:eq(14)").text()
            let type_ingred = $tr.find("td:eq(15)").text()


            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
            $tr.css("border","solid #e1e1e1 0px");

            mettreAjourIngred(id_ingred,
                nom_ingred,
                health_note_ingred,
                cout_ingred,
                saison_i,
                calories,
                proteines,
                glucides,
                lipides,
                eau,
                fibres,
                vitamines,
                description_ingred,
                image_ingred,
                type_ingred)
            location.reload()
        }
        else  {
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
        }
    }
})

function mettreAjourIngred(id_ingred,
nom_ingred,
health_note_ingred,
cout_ingred,
saison_i,
calories,
proteines,
glucides,
lipides,
eau,
fibres,
vitamines,
description_ingred,
image_ingred,
type_ingred) {



    $.ajax({
        url:"http://localhost/project/Routers/Gestion_nutrition_Route.php",
        type:"POST",
        data: {
            id_ingred :id_ingred,
            nom_ingred:nom_ingred,
            health_note_ingred:health_note_ingred,
            cout_ingred: cout_ingred,
            saison_i:saison_i,
            calories: calories,
            proteines: proteines,
            glucides: glucides,
            lipides: lipides,
            eau: eau,
            fibres: fibres,
            vitamines: vitamines,
            description_ingred: description_ingred,
            image_ingred: image_ingred,
            type_ingred: type_ingred
        },
        success: function (){

        }
    })
}

