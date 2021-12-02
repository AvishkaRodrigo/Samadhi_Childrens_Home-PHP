function displayItems(x,y,name1,name2){
    var isEmpty = document.getElementById(x).innerText;
        if (isEmpty == ""){
            document.getElementById(x).innerHTML = name1;
            document.getElementById(y).innerHTML = name2;
        }else{
            document.getElementById(x).innerHTML = "";
            document.getElementById(y).innerHTML = "";
        }
}   

function displayItems2(x,y,z,name1,name2,name3){
    var isEmpty = document.getElementById(x).innerText;
        if (isEmpty == ""){
            document.getElementById(x).innerHTML = name1;
            document.getElementById(y).innerHTML = name2;
            document.getElementById(z).innerHTML = name3;
        }else{
            document.getElementById(x).innerHTML = "";
            document.getElementById(y).innerHTML = "";
            document.getElementById(z).innerHTML = "";
        }
}   

function setpage(newpage){
    document.getElementById("innercontainer").setAttribute('data',newpage);
    try{
        window.onload = changeData;
    }catch
    {
        console.log('error');
    }
}

