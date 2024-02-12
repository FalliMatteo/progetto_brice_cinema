function updateInputs(){
    if(document.getElementById("insert_recensione_input").checked){
        document.getElementById("form").action = "php/insertRecensione.php";
        document.getElementById("id").classList.add("blocked");
        document.getElementById("voto").classList.remove("blocked");
        document.getElementById("film").classList.remove("blocked");
        document.getElementById("username").classList.remove("blocked");
    }
    if(document.getElementById("delete_recensione_input").checked){
        document.getElementById("form").action = "php/deleteRecensione.php";
        document.getElementById("id").classList.remove("blocked");
        document.getElementById("voto").classList.add("blocked");
        document.getElementById("film").classList.add("blocked");
        document.getElementById("username").classList.add("blocked");
    }
    if(document.getElementById("update_recensione_input").checked){
        document.getElementById("form").action = "php/updateRecensione.php";
        document.getElementById("id").classList.remove("blocked");
        document.getElementById("voto").classList.remove("blocked");
        document.getElementById("film").classList.add("blocked");
        document.getElementById("username").classList.add("blocked");
    }
}

function showAttributes(){
    let attributes = document.getElementsByClassName("id_film");
    if(document.getElementById("id_film_box").checked){
        for(let i=0; i<attributes.length; i++){
            attributes[i].classList.add("blocked");
        }
    }else{
        for(let i=0; i<attributes.length; i++){
            attributes[i].classList.remove("blocked");
        }
    }
    attributes = document.getElementsByClassName("anno_produzione_film");
    if(document.getElementById("anno_produzione_film_box").checked){
        for(let i=0; i<attributes.length; i++){
            attributes[i].classList.add("blocked");
        }
    }else{
        for(let i=0; i<attributes.length; i++){
            attributes[i].classList.remove("blocked");
        }
    }
    attributes = document.getElementsByClassName("genere_film");
    if(document.getElementById("genere_film_box").checked){
        for(let i=0; i<attributes.length; i++){
            attributes[i].classList.add("blocked");
        }
    }else{
        for(let i=0; i<attributes.length; i++){
            attributes[i].classList.remove("blocked");
        }
    }
}