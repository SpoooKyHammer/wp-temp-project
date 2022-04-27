function keyUp(){
    var f = document.getElementById("un")
    f.value = f.value.toUpperCase()
}


function setVal(){
    var field = document.getElementById("field")
    var val = field.value
    field.value = val
}

function logout(){
    window.location.href = "../html/login.html"
    // alert("Sucessfully logged out")
}


function userExists(){
    alert("Username already taken")
    window.location.href = "../html/login.html"
}