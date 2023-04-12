function habilitar(){
    text_1=document.getElementById("text_1").value;
    text_2=document.getElementById("text_2").value;
    text_3=document.getElementById("text_3").value;
    val=0;

    if(text_1 ==""){
        val++;
    }

    if(text_2 ==""){
        val++;
    }

    if(text_3 ==""){
        val++;
    }

    if(val==0){
        document.getElementById("btn").disabled =false;
    }else{
        document.getElementById("btn").disabled =true;
    }
}

document.getElementById("text_1").addEventListener("keyup", habilitar);
document.getElementById("text_2").addEventListener("keyup", habilitar);
document.getElementById("text_3").addEventListener("keyup", habilitar);
document.getElementById("btn").addEventListener("click",()=>{
    alert("haz llenado todo");
});

