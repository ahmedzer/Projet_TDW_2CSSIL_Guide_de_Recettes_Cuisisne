/**********************Page principal *************************************************************************/
$('.Gestion_Link').mouseenter(function (){
    $(this).find("p").css("color","#fcfcfc")
});
$('.Gestion_Link').mouseleave(function (){
    $(this).find("p").css("color","#6e6e6e")
})


$(document).ready(function() {
    $(".table").DataTable({
        language:{
            "lengthMenu":     "Afficher _MENU_ entrées",
            "emptyTable":     "Pas données trouvées",
            "search":         "Rechercher :  ",
            "info":           "Afficher _START_ a _END_ des _TOTAL_ entrées",
            "infoEmpty":      "Afficher 0 a 0 des 0 entrées",
            "infoFiltered":   "(filtré de _MAX_ entrées totale)",
            "paginate": {
                "first":      "Premier ",
                "last":       "Dernier ",
                "next":       "Suivant ",
                "previous":   "Précedent "
            },
        }
    });
    //changer le design des element de dataTalble
    let elements = document.getElementsByClassName('dataTables_wrapper no-footer')
    for(let i=0;i<elements.length;i++) {
        let subElements = elements[i].getElementsByTagName('input')
        //changer la zone de recherche ajouter la classe bootstrap
        for (let j=0;j<subElements.length;j++) {
            subElements[j].classList.add('form-control')
        }
        //changer le select
        let selects = elements[i].getElementsByTagName('select')
        for (let j=0;j<selects.length;j++) {
            selects[j].classList.add('form-select')
        }
    }


});



















/***************************************************Suppression des utilisateurs *********************************/
$(".userD, .userValidD, .userInValidD").click(function (){ //supprimer de la table user
    var $itemId = $(this).closest("tr").attr('id')

    let x= confirm("Voulez-vous vraiment supprimer l'utilisateur "+$itemId+"  ?")
    if(x===true) {
        deleteUser($itemId)
        $(this).attr("disabled","disabled");
        location.reload();

    }
});

/****************************************************modification *******************************************************/
$(".userE, .userValidE, .userInValidE").click(function (){//modification
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
        let x= confirm("Voulez-vous vraiment modifier l'utilisateur "+$itemId+"  ?")
        if(x) {
            let u_id = $tr.find("td:eq(1)").text()
            let u_name = $tr.find("td:eq(2)").text()
            let u_mail = $tr.find("td:eq(3)").text()
            let u_phone = $tr.find("td:eq(4)").text()
            let u_date = $tr.find("td:eq(5)").text()
            let u_valid = $tr.find("td:eq(6)").text()
            let u_pass = $tr.find("td:eq(7)").text()
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
            $tr.css("border","solid #e1e1e1 0px");
            updateUser(u_id,u_name,u_mail,u_phone,u_date,u_valid,u_pass)//envoyer les valeurs modifiées avec ajax
            location.reload()
        }
        else  {
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
        }
    }
})

//validatoion d'utilisateurs**********************************************************************************************
$(".userInValidV").click(function (){ //get user id to delete
    var $itemId = $(this).closest("tr").attr('id')

    let x= confirm("Voulez-vous vraiment valider l'utilisateur "+$itemId+"  ?")
    if(x===true) {
        validerUser($itemId)
        $(this).attr("disabled","disabled");
        location.reload();
    }
})

$(".userBan").click(function (){ //get user id to delete
    var $itemId = $(this).closest("tr").attr('id')

    let x= confirm("Voulez-vous vraiment bannir l'utilisateur "+$itemId+"  ?")
    if(x===true) {
        bannirUser($itemId)
        $(this).attr("disabled","disabled");
        location.reload();
    }
})

/****************************************** supprimer les users sélectionnés ***************************************************/

function check() { //affichage de bouton de suppression premier tableau

    if(getCheckedRows().length>0) {
        $('#deleteUserBut').css('display',' block')
    }
    else {
        $('#deleteUserBut').css('display','none')
    }
}





function checkTab2() { //affichage de bouton de suppression 2eme tableau

    if(getCheckedRowsTable2().length>0) {
        $('#deleteValidUsersBut').css('display',' block')
    }
    else {
        $('#deleteValidUsersBut').css('display','none')
    }
}

function check3() {
    if(getCheckedRowsTable3().length>0) {
        $('#deleteInValidUsersBut').css('display',' block')
    }
    else {
        $('#deleteInValidUsersBut').css('display','none')
    }
}

function getCheckedRows() { //recupere les lignes cuachées pour les supprimer du premier tableau
    let x=[];
    $('.userCheck').each(function (index) {
        if($(this)[0].checked){
            let $item = $(this).closest("tr").attr('id')
            x.push($item)
            console.log($item)
        }
    })
    return x
}


function getCheckedRowsTable2() { //recupere les lignes cuachées pour les supprimer du 2eme tableau
    let x=[];
    $('.ValiduserCheck').each(function (index) {
        if($(this)[0].checked){
            let $item = $(this).closest("tr").attr('id')
            x.push($item)
            console.log($item)
        }
    })
    return x
}

function getCheckedRowsTable3() { //recupere les lignes cuachées pour les supprimer du 3eme tableau
    let x=[];
    $('.IvaliduserCheck').each(function (index) {
        if($(this)[0].checked){
            let $item = $(this).closest("tr").attr('id')
            x.push($item)
            console.log($item)
        }
    })
    return x
}


/**********************************************Ajax   **********************************************************/
function updateUser(u_id, u_name, u_mail, u_phone, u_date, u_valid, u_pass) {//update user ajax
    $.ajax({
        async:false,
        url : "http://localhost/project/Routers/Gestion_user_route.php",//envoyer les donnée au routeur
        type: "POST",
        data: {
            u_id:u_id,
            u_name:u_name,
            u_mail:u_mail,
            u_phone:u_phone,
            u_date:u_date,
            u_valid:u_valid,
            u_pass:u_pass
        },
        success:function (){
        }
    });
}
function deleteUser(u_id) {///envoyer le user id a supprimer au routeur
    $.ajax({
        async:false,
        url : "http://localhost/project/Routers/Gestion_user_route.php",
        type: "POST",
        data: {
            u_id_to_delete:u_id,
        },
        success:function (dataResult){
        }
    });
}

function validerUser(u_id) {// envoyer le id a valider
    $.ajax({
        async:false,
        url : "http://localhost/project/Routers/Gestion_user_route.php",
        type: "POST",
        data: {
            u_id_to_valid:u_id,
        },
        success:function (dataResult){
        }
    });
}

function bannirUser(u_id) {// envoyer le id a valider
    $.ajax({
        async:false,
        url : "http://localhost/project/Routers/Gestion_user_route.php",
        type: "POST",
        data: {
            u_id_to_ban:u_id,
        },
        success:function (dataResult){
        }
    });
}
function deleteUserList(){//supprimer la liste des utilisateurs selectionnés
    let list = getCheckedRows()
    let i;
    let x= confirm("Voulez-vous vraiment supprimer les utilisateurs sélectionnés ?")
    if(x) {
        for(i=0;i<list.length;i++) {
            $.ajax({
                async:false,
                url : "http://localhost/project/Routers/Gestion_user_route.php",
                type: "POST",
                data: {
                    u_id_to_delete:list[i],
                },
                success:function (dataResult){

                }
            });
        }
        location.reload();
    }
}
function deleteUserValidList(){
    let list = getCheckedRowsTable2()
    let i;
    let x= confirm("Voulez-vous vraiment supprimer les utilisateurs sélectionnés ?")
    if(x) {
        for(i=0;i<list.length;i++) {
            $.ajax({
                async:false,
                url : "http://localhost/project/Routers/Gestion_user_route.php",
                type: "POST",
                data: {
                    u_id_to_delete:list[i],
                },
                success:function (dataResult){

                }
            });
        }
        location.reload();
    }
}
function deleteUserInValidList() {
    let list = getCheckedRowsTable3()
    let i;
    let x= confirm("Voulez-vous vraiment supprimer les utilisateurs sélectionnés ?")
    if(x) {
        for(i=0;i<list.length;i++) {
            $.ajax({
                async:false,
                url : "http://localhost/project/Routers/Gestion_user_route.php",
                type: "POST",
                data: {
                    u_id_to_delete:list[i],
                },
                success:function (dataResult){

                }
            });
        }
        location.reload();
    }
}

/*****************************************************recherche filtrée ******************************************/
let filterCheck = false;
function filter() {
    if(filterCheck) {
        $('#filterSearch').css("display","none")
        filterCheck = false;
    }
    else {
        $('#filterSearch').css("display","inline-flex")
        filterCheck = true;
    }
}

function search(){
    filterCheck = true;
    filter()
    let searchFor = document.getElementById('searchBar').value.toString()
    let filterName = document.getElementById('filterName').value.toString()
    let filterEmail = document.getElementById('filteremail').value
    let filterPhone = document.getElementById('filterPhone').value.toString()
    let filterBirthDate = document.getElementById('filterBirthDate').value.toString()

    if(searchFor.length === 0 ){
        searchFor ="unset";
    }
    postSeach(searchFor,filterName,filterEmail,filterPhone,filterBirthDate)
}

function postSeach(searchFor,filterName,filterEmail,filterPhone,filterBirthDate) {
    if(!filterCheck && searchFor!=='') {
        $.ajax({
            type:'POST',
            async:false,
            url:"http://localhost/project/Routers/Gestion_Admin.php",
            data: {
                searchFor:searchFor,
                filterName: filterName,
                filterEmail : filterEmail,
                filterPhone : filterPhone,
                filterBirthDate : filterBirthDate
            },
            success: function (){
               // window.location.href = ;
                window.open("http://localhost/project/Routers/RechercheUserRoute.php?search="
                    +searchFor+"&filterName=" +filterName+
                    "&filterEmail=" +filterEmail +
                    "&filterPhone=" +filterPhone+
                    "&filterBirthDate="+filterBirthDate);
            },
            error: function (){
                console.log(this.error.text())
            }
        })
    }
}
/************************************************************* Gestion recette *************************************************/
//supprimer une recette
$('.recetteD').click(function (){
    $recette_id = $(this).closest("tr").attr('id')
    let x= confirm("Voulez-vous vraiment supprimer la recette  "+$recette_id+"  ?")
    if(x===true) {
        deleteRecette($recette_id)
        $(this).attr("disabled","disabled");
        location.reload();
    }
})
function deleteRecette(id_recette) {
    $.ajax({
        url: "http://localhost/project/Routers/Gestion_RecetteRoute.php",
        type:'POST',
        async: false,
        data: {
            recetteDeleteId:id_recette,
        },
        success: function (){

        }
    })
}

//Update recette ****************************************************************************/
$(".recetteE").click(function (){//modification
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
        let x= confirm("Voulez-vous vraiment modifier la recette "+$itemId+"  ?")
        if(x) {
            let recette_id = $tr.find("td:eq(1)").text()
            let recette_cat = $tr.find("td:eq(2)").text()
            let recette_titre = $tr.find("td:eq(3)").text()
            let recette_desc= $tr.find("td:eq(4)").text()
            let recette_img = $tr.find("td:eq(5)").text()
            let recette_valid = $tr.find("td:eq(6)").text()
            let recette_portion = $tr.find("td:eq(7)").text()
            let recette_temps = $tr.find("td:eq(8)").text()
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
            $tr.css("border","solid #e1e1e1 0px");

            mettreAjourRecette(recette_id,recette_cat,recette_titre,
                recette_desc,recette_img,recette_valid,
                recette_portion,recette_temps)
            location.reload()
        }
        else  {
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
        }
    }
})

function mettreAjourRecette(id_Recette,categorie_recette,titre_recette,
                            description_recette,image_recette,recette_valide,
                            portion,temps_preparation)
{//envoyer les donnée de la recette modifiée au routeur de recette

    $.ajax({
        url: "http://localhost/project/Routers/Gestion_RecetteRoute.php",
        type:"POST",
        async:false,
        data: {
            id_Recette: id_Recette,
            categorie_recette: categorie_recette,
            titre_recette : titre_recette,
            description_recette :description_recette,
            image_recette: image_recette,
            recette_valide:recette_valide,
            portion: portion,
            temps_preparation:temps_preparation,
        },
        success: function (){

        }
    })
}
function getCheckedRecettes() {
    let x=[];
    $('.RecetteCheck').each(function (index) {
        if($(this)[0].checked){
            let $item = $(this).closest("tr").attr('id')
            x.push($item)
            console.log($item)
        }
    })
    return x
}
function checkRecette() {
    this.checked=!this.checked;
    if(getCheckedRecettes().length>0) {
        $('#DeleteListR').css('display',' block')
    }
    else {
        $('#DeleteListR').css('display','none')
    }
}
$(document).on('click',"#DeleteListR",function () {
    let listRecettes = getCheckedRecettes();
    let x= confirm("Voulez-vous vraiment supprimer les recettes "+listRecettes+"  ?")
    if(x) {
        for(let i=0;i<listRecettes.length;i++) {
            $.ajax({
                url: "http://localhost/project/Routers/Gestion_RecetteRoute.php",
                type:'POST',
                async: false,
                data: {
                    recetteDeleteId:listRecettes[i],
                },
                success: function (){

                }
            })
        }
    }
})
//***************************************insert recette ********************************************************/

