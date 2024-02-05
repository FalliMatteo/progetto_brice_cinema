function updateInputs(){
    if(document.getElementById("insert_input").checked){
        document.getElementById("form").action = "php/insert.php";
        document.getElementById("id").classList.add("blocked");
        document.getElementById("voto").classList.remove("blocked");
        document.getElementById("film").classList.remove("blocked");
        document.getElementById("username").classList.remove("blocked");
    }
    if(document.getElementById("delete_input").checked){
        document.getElementById("form").action = "php/delete.php";
        document.getElementById("id").classList.remove("blocked");
        document.getElementById("voto").classList.add("blocked");
        document.getElementById("film").classList.add("blocked");
        document.getElementById("username").classList.add("blocked");
    }
    if(document.getElementById("update_input").checked){
        document.getElementById("form").action = "php/update.php";
        document.getElementById("id").classList.remove("blocked");
        document.getElementById("voto").classList.remove("blocked");
        document.getElementById("film").classList.add("blocked");
        document.getElementById("username").classList.add("blocked");
    }
}