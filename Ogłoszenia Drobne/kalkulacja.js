function przelicz(){
    let l  = parseFloat(document.getElementById("ilosc").value);
    let s = document.getElementById("staly").checked;
    let suma=0;

    if(s == false){
        if(l<41){
            suma=l * 3;
        }else{
            suma = l*2;
        }
    }else{
        if(l<41){
            suma=l * 3;
        }else{
            suma = l*1.70;
        }
    }
    document.getElementById("wynik").innerHTML = suma;

}

function res(){
    document.getElementById("wynik").innerHTML = "___";
}