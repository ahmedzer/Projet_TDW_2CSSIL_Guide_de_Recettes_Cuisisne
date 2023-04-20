
function updateColors() {

    $(document).ready(function () {
        let color =$(".titreRecette").css("color");
        $('ul li a .icon .fa:last-child').css("color",color);
        $('ul li a .name span:before').css("color",color);
        $('.titreRecette').css("color",color);
        $('.infoNom').css("color",color);
        $('.containerI').css("background-color",color);
        $('.IngredContainer').css("background-color",color);
        $('.ingred_tete a').css("color",color);
        $('ul li a:hover .name span').css("color",color)
        $('ul li a:hover .icon .fa').css("color",color);
        $('ul li a .name').css("color",color)
        $('.Etape').css("background-color",color)

    })
}
updateColors();
function updateCardColor() {
    let tyepRecette = $('#typeR').attr("class")

    switch (tyepRecette) {
        case "t1": {
            $('.Card').css("background-color","#6da06f");
            console.log("ahmed")
            break;
        }
        case "t2": {
            $('.Card').css("background-color","#FF8243");
            console.log("ahmed")
            break;
        }
    }
}
updateCardColor()
//trié les recette selon la note utilisateurs
$(document).ready(function (){


    var divList = $(".Card");
    divList.sort(function(a, b){ return $(b).data("rating")-$(a).data("rating")}); //tirer par default avec la note utilisateurs
    $("#recetteListe").html(divList);

    ///////// trier avec le temp de preparation    *********************************************/
    $(document).on('click', '#timeFilter', function(events) {
        var divList = $(".Card");
        divList.sort(function(a, b){ return $(a).data("timeprep")-$(b).data("timeprep")});
        $("#recetteListe").html(divList);//le nouveau affichage
        $('#noteFilter').css("background-color","#888888");
        $('#CaloriesFilter').css("background-color","#888888");
        $('#timeFilter').css("background-color","#FF8243");
        $('#portionFilter').css("background-color","#888888");
        $('#healthFilter').css("background-color","#888888");
        $('#AllFilter').css("background-color","#888888");
    });

    ///////// trier avec les calories    *********************************************/
    $(document).on('click', '#CaloriesFilter', function(events) {
        var divList = $(".Card");
        divList.sort(function(a, b){ return $(a).data("calories")-$(b).data("calories")});
        $("#recetteListe").html(divList);//le nouveau affichage
        $('#noteFilter').css("background-color","#888888");
        $('#CaloriesFilter').css("background-color","#FF8243");
        $('#timeFilter').css("background-color","#888888");
        $('#healthFilter').css("background-color","#888888");
        $('#portionFilter').css("background-color","#888888");
        $('#AllFilter').css("background-color","#888888");
    });

    ///////// trier avec Health    *********************************************/
    $(document).on('click', '#healthFilter', function(events) {
        var divList = $(".Card");
        divList.sort(function(a, b){ return $(b).data("health")-$(a).data("health")});
        $("#recetteListe").html(divList);//le nouveau affichage
        $('#noteFilter').css("background-color","#888888");
        $('#CaloriesFilter').css("background-color","#888888");
        $('#timeFilter').css("background-color","#888888");
        $('#portionFilter').css("background-color","#888888");
        $('#healthFilter').css("background-color","#FF8243");
        $('#AllFilter').css("background-color","#888888");
    });

    //trier avec portion /////////////////////////////////////////////////////////////////
    $(document).on('click', '#portionFilter', function(events) {
        var divList = $(".Card");
        divList.sort(function(a, b){ return $(b).data("portion")-$(a).data("portion")});
        $("#recetteListe").html(divList);//le nouveau affichage
        $('#noteFilter').css("background-color","#888888");
        $('#CaloriesFilter').css("background-color","#888888");
        $('#timeFilter').css("background-color","#888888");
        $('#portionFilter').css("background-color","#FF8243");
        $('#healthFilter').css("background-color","#888888");
        $('#AllFilter').css("background-color","#888888");
    });

    //trier avec note utilisateurs /////////////////////////////////////////////////////////////////
    $(document).on('click', '#noteFilter', function(events) {
        var divList = $(".Card");
        divList.sort(function(a, b){ return $(b).data("rating")-$(a).data("rating")});
        $("#recetteListe").html(divList);//le nouveau affichage
        $('#noteFilter').css("background-color","#FF8243");
        $('#CaloriesFilter').css("background-color","#888888");
        $('#timeFilter').css("background-color","#888888");
        $('#portionFilter').css("background-color","#888888");
        $('#healthFilter').css("background-color","#888888");
        $('#AllFilter').css("background-color","#888888");
    });

    //tout afficher
    $(document).on('click', '#AllFilter', function(events) {
        let listRecettes = $('.Card');
        for (let i=0;i<listRecettes.length;i++) {
            listRecettes[i].style.display = "inline"
        }
        var divList = $(".Card");
        divList.sort(function(a, b){ return $(b).data("rating")-$(a).data("rating")});
        $("#recetteListe").html(divList);//le nouveau affichage
        $('#noteFilter').css("background-color","#888888");
        $('#CaloriesFilter').css("background-color","#888888");
        $('#timeFilter').css("background-color","#888888");
        $('#portionFilter').css("background-color","#888888");
        $('#healthFilter').css("background-color","#888888");
        $('#AllFilter').css("background-color","#FF8243");
    });

    //saison filtre *************************************************************/
    $(document).on('change',"#SelectSaiason", function (event) {
        data= $('#SelectSaiason option:selected').val()
        let listRecettes = $('.Card');
        for (let i=0;i<listRecettes.length;i++) {
                listRecettes[i].style.display = "inline"
        }
        for (let i=0;i<listRecettes.length;i++) {
            if(!listRecettes[i].dataset.saison.toString().includes(data.toString())) {
                listRecettes[i].style.display = "none"
            }
        }
    });


    //fete par default

        $("#SelectFete").val($("#SelectFete option:first").val());
        data= $('#SelectFete option:selected').val()
    if(typeof(data)!=="undefined") {
        let listRecettes = $('.Card');
        for (let i=0;i<listRecettes.length;i++) {
            listRecettes[i].style.display = "inline"
        }
        for (let i=0;i<listRecettes.length;i++) {
            if(!listRecettes[i].dataset.feteId.toString().includes(data.toString())) {
                listRecettes[i].style.display = "none"
            }
        }
    }

    //filtrer les recette selon les fetes
    $(document).on('change',"#SelectFete", function (event) {
        data= $('#SelectFete option:selected').val()
        let listRecettes = $('.Card');
        for (let i=0;i<listRecettes.length;i++) {
            listRecettes[i].style.display = "inline"
        }
        for (let i=0;i<listRecettes.length;i++) {
            if(!listRecettes[i].dataset.feteId.toString().includes(data.toString())) {
                listRecettes[i].style.display = "none"
            }
        }
    });

///health ingredient
    $(document).on('click', '#healthFilterI', function(events) {
        let listRecettes = $('.ingredient');
        for (let i=0;i<listRecettes.length;i++) {
            listRecettes[i].style.display = "inline"
        }
        var divList = $(".ingredient");
        divList.sort(function(a, b){ return $(b).data("health")-$(a).data("health")});
        $("#ingredContain").html(divList);//le nouveau affichage
        $('#CaloriesFilterI').css("background-color","#888888");
        $('#coutFilterI').css("background-color","#888888");
        $('#healthFilterI').css("background-color","#FF8243");
    });
    ///calories ingredient
    $(document).on('click', '#CaloriesFilterI', function(events) {
        let listRecettes = $('.ingredient');
        for (let i=0;i<listRecettes.length;i++) {
            listRecettes[i].style.display = "inline"
        }
        var divList = $(".ingredient");
        divList.sort(function(a, b){ return $(a).data("cal")-$(b).data("cal")});
        $("#ingredContain").html(divList);//le nouveau affichage
        $('#healthFilterI').css("background-color","#888888");
        $('#coutFilterI').css("background-color","#888888");
        $('#CaloriesFilterI').css("background-color","#FF8243");
    });

    ///cout ingredient
    $(document).on('click', '#coutFilterI', function(events) {
        let listRecettes = $('.ingredient');
        for (let i=0;i<listRecettes.length;i++) {
            listRecettes[i].style.display = "inline"
        }
        var divList = $(".ingredient");
        divList.sort(function(a, b){ return $(a).data("cout")-$(b).data("cout")});
        $("#ingredContain").html(divList);//le nouveau affichage
        $('#healthFilterI').css("background-color","#888888");
        $('#coutFilterI').css("background-color","#FF8243");
        $('#CaloriesFilterI').css("background-color","#888888");
    });
})
/***********************************Idéé recette ************************************************************************/
$(document).ready(function(){ //changement d'element selectionné

    $('#selectIngred').change(function (){
        data= $('#selectIngred option:selected').text()
        addIngredToUl($(this).val(),data) //ajouter l element selectionné a la liste
        if($('ul#selectedIngred li').length>0) {
            $('#searchIngred').css("display","block")
        }
        else {
            $('#searchIngred').css("display","none")
        }
    })


})
if($('ul#selectedIngred li').length>0) {
    $('#searchIngred').css("display","block")

}
else {
    $('#searchIngred').css("display","none")
}

$(document).on('click',"#Disconnect",function () {

    let x= confirm("Voulez vous vraiment se déconnecter ?");
    if (x) {
        $.ajax({
            url: "http://localhost/project/Routers/UserProfileRoute.php",
            type:"POST",
            data: {
                disconnect:1,
            },
            success: function () {

            }
        })
    }
})



$(document).on('click', '.btn', function(events){

    $(this).closest("li").remove()
    if($('ul#selectedIngred li').length>0) {
        $('#searchIngred').css("display","block")

    }
    else {
        $('#searchIngred').css("display","none")
    }
});
function checkforText(requiredText) { //verifier si l'ingred existe deja dans la list des selectionnés
    let found = false;
    $("#selectedIngred li").each((id, elem) => {
        if (elem.innerText === requiredText) {
            console.log("true")
            found = true;
        }
    });
    return found;
}


function addIngredToUl(ingredId,ingredName) {//function d'ajout d'un li a ul
    if(!checkforText(ingredName) && ingredId!=='0') {
        $("#selectedIngred").append('<li class="list-group-item" id="'+ingredId+'">'+ingredName+'<button class="btn"><i class="fa fa-trash"></i></button></li>');
    }
}


function addIngredToUl2(ingredId,ingredName) {//function d'ajout d'un li a ul avec les autres champs
    if(!checkforText(ingredName) && ingredId!=='0') {
        $("#selectedIngred2").append('<li class="list-group-item" id="'+ingredId+'">'+ingredName+'<input class="form-control" type="number" style="width: 40%" placeholder="Quantité en gramme"><input class="form-control" type="text" style="width: 40%" placeholder="Quantité en text"><button class="btn" style="margin-left: 5%;"><i class="fa fa-trash"></i></button></li>');
    }
}
//rechercher

$(document).on('click', '#searchIngred', function(events){//recupere la list des ingred selectionnés
    let ingred_list =[];
    let lis = document.getElementById('selectedIngred').getElementsByTagName('li')

    for(let i=0;i<lis.length;i++) {
        ingred_list.push(lis[i].id)
    }
    sendIngredsToRoute(ingred_list)

});


$(document).on('click', '#insertIngredBtn', function(events){//recupere la list des ingred selectionnés
    let ingred_id_list =[];
    let ingred_quantity_gramme =[];
    let ingred_quantity = []
    let lis = document.getElementById('selectedIngred2').getElementsByTagName('li')
    let valid = true
    for(let i=0;i<lis.length;i++) {
        ingred_id_list.push(lis[i].id)
        let inputs = lis[i].getElementsByTagName("input")
        if(inputs[0].value!=="" && inputs[1].value!=="") {
            ingred_quantity_gramme.push(inputs[0].value)
            ingred_quantity.push(inputs[1].value)
            valid = false;
        }
    }
    if(valid) {
        let body = document.getElementsByTagName("body")
        sendIngredsToRoute2(ingred_id_list,ingred_quantity_gramme,ingred_quantity)
    }
    else  {
        alert("Verifier que vous avez completé tout les champs")
    }
});

function sendIngredsToRoute(list_ingred) {

    $.ajax({
        url:"http://localhost/project/Routers/IdeeRecetteRoute.php",
        type:'POST',
        async:false,
        data: {
            ingredList:list_ingred,
        },
        success: function () {
            window.open("http://localhost/project/Routers/AllRecettesRoute.php?searchRecette=1");
        }
    })
}
/*********************************************************************************************************/
$(document).on('click','#AddToFav',function () {
    let textBtn = $(this).text()
    let r_id = $(this).attr("value")
    if(textBtn==="Ajouter a mes favoris") {
        $(this).text("Retirer de mes favoris")
        $.ajax({
            url: "http://localhost/project/Routers/RecetteRouter.php?r_id="+r_id,
            type: "POST",
            async: false,
            data: {
                add_fav:1,
            },
            success: function (){

            }
        })
    }
    else {
        if(textBtn==="Retirer de mes favoris") {
            $(this).text("Ajouter a mes favoris")
            $.ajax({
                url: "http://localhost/project/Routers/RecetteRouter.php?r_id="+r_id,
                type: "POST",
                async: false,
                data: {
                    add_fav:0,
                },
                success: function (){

                }
            })
        }
    }
})

$(document).on('click','#RmFromFav',function () {

    let confrm= confirm("Voulez vous vraiment retirer cette recette de votre favorite ?")
    if(confrm) {
        let recette_id = $(this).attr("value")
        let user_id = $('#id_info').data('userid')
        $.ajax({
            url:"http://localhost/project/Routers/UserProfileRoute.php",
            type: "POST",
            async:false,
            data :{
                recette_id: recette_id,
                user_id: user_id,
            },
            success: function () {

            }
        })
        location.reload()
    }
})
