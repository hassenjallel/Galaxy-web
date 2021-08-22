function admin(){
    var username = document.getElementById("username").value+"";
    var mdp = document.getElementById("mdp").value+"";
    if (username =="admin" &&  mdp =="admin"){
        location.href("index3.php");

        alert("admin");
    }else{
        alert("sorry , privet");
    }
}