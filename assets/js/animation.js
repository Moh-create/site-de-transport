const whatsapplogo = document.getElementsByClassName('float');
document.getElementById('message').hidden=true;

function myFunction(){

    if( document.getElementById('message').hidden == false){
        document.getElementById('message').hidden=true;
    }else{
        document.getElementById('message').hidden=false;
    }
    
}
