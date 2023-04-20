$('.NewsD').click(function (){
    let $news_id = $(this).closest("tr").attr('id')
    let x= confirm("Voulez-vous vraiment supprimer news  "+$news_id+"  ?")
    if(x===true) {
        deleteNews($news_id)
        $(this).attr("disabled","disabled");
        location.reload();
    }
})
function deleteNews(news_id) {
    $.ajax({
        url:"http://localhost/project/Routers/Gestion_newsRoute.php",
        type:"POST",
        data: {
            id_news_delete:news_id,
        },
        success: function (){

        }
    })
}
/*mettre a jour news *************************************************************************************/

$('.NewsE').click(function () {
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
        let x= confirm("Voulez-vous vraiment modifier news "+$itemId+"  ?")
        if(x) {
            let news_id = $tr.find("td:eq(1)").text()
            let news_titre = $tr.find("td:eq(2)").text()
            let contenu_news = $tr.find("td:eq(3)").text()
            let link_img= $tr.find("td:eq(4)").text()
            let link_post = $tr.find("td:eq(5)").text()
            let num = $tr.find("td:eq(6)").text()
            let externLink = $tr.find("td:eq(7)").text()
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
            $tr.css("border","solid #e1e1e1 0px");

            mettreAjourNews(news_id,news_titre,contenu_news,link_img,link_post,num,externLink)
            location.reload()
        }
        else  {
            $(this).text("Modifier")
            $tr.attr("contentEditable","false");
        }
    }
})

function mettreAjourNews(news_id,news_titre,contenu_news,link_img,link_post,num,externLink) {
    $.ajax({
        url: "http://localhost/project/Routers/Gestion_newsRoute.php",
        type: "POST",
        data: {
            news_id:news_id,
            news_titre: news_titre,
            contenu_news: contenu_news,
            link_img: link_img,
            link_post: link_post,
            num: num,
            externLink:externLink,
        },
        success:function (){

        }
    })

}

$(document).ready(function (){
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
    let result = $('#resultDiv').data("result")
    if(result === 200) {
        $('#resultDiv').remove()
        $('#InsertNewsForm')
    }
    if(result=== 201) {
        alert("Erreur dans l'insertion de la recette")
    }
})

$('#InsertNewsForm').on('submit',function () {
    console.log("sub")

})