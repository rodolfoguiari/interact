function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    //alert(event.keyCode)
    if(tecla>47 && tecla<58){
        return true;
    } else if(tecla==8 || tecla==0){
        return true;
    } else {
        return false;
    }
}

function SomenteNumeroEponto(e){
    var tecla=(window.event)?event.keyCode:e.which;
    
    if(tecla>47 && tecla<58){
        return true;
    } else if(tecla==8 || tecla==0 || tecla==46){
        return true;
    } else {
        return false;
    }
}

function SomenteNumeroPontoVirgula(e){
    var tecla=(window.event)?event.keyCode:e.which;
    
    if(tecla>47 && tecla<58){
        return true;
    } else if(tecla==8 || tecla==0 || tecla==46 || tecla==44){
        return true;
    } else {
        return false;
    }
}

function SomenteNumeroVirgula(e){
    var tecla=(window.event)?event.keyCode:e.which;
    
    if(tecla>47 && tecla<58){
        return true;
    } else if(tecla==44){
        return true;
    } else {
        return false;
    }
}

function SomenteNumeroPontoEstrela(e){
    var tecla=(window.event)?event.keyCode:e.which;
    
    if(tecla>47 && tecla<58){
        return true;
    } else if(tecla==8 || tecla==0 || tecla==46 || tecla==44 || tecla==42){
        return true;
    } else {
        return false;
    }
}

function SomenteNumeroX(e){
    var tecla=(window.event)?event.keyCode:e.which;   

    if(tecla>47 && tecla<58){
        return true;
    } else if(tecla==8 || tecla==0 || tecla==88 || tecla==120){
        return true;
    } else {
        return false;
    }
}

function SemPonto(e){
    var tecla=(window.event)?event.keyCode:e.which;

    if(tecla==46 || tecla==44){
        return false;
    } else {
        return true;
    }
}
