const form = document.getElementById('formInscription');



form.addEventListener('submit',function(e){


  for(let i = 0;i<form.length;i++){

    if(i>0 && i<3){

      let chaineNomOuPrenom = form[i].value;
      if(!chaineNomOuPrenom.match(/^[a-zA-Z]{3,}$/)){
        e.preventDefault();
        let parentNomOuPrenom = form[i].parentElement.id;
        let idParent = document.getElementById(`${parentNomOuPrenom}`);

        let spadn = document.createElement("span");
        spadn.textContent = "Doit contenir au minimum 3 caractères"; 
        idParent.appendChild(spadn);


      }
    }

    if(i == 3){
      let emailSaisie = form[i].value;
      if(!emailSaisie.match(/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/)){
        e.preventDefault();
        let emailId = form[i].parentElement.id;
        let idParentEmail = document.getElementById(`${emailId}`);

        let spanEmail = document.createElement("span");
        spanEmail.textContent = "Erreur email"; 
        idParentEmail.appendChild(spanEmail);
      }
    }

    if(i == 8){
      let nomInput  = form[i].name;
      let adresseEtatOuCodePostalSaisie = form[i].value;
      if(nomInput == "codePostal"){
        if(!adresseEtatOuCodePostalSaisie.match(/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$|[0-9]{4}/)){
          e.preventDefault();
          let idParentCodePostal = document.getElementById('codePostal');
          let span = document.createElement("span");
          span.textContent = "Le code postal n'est pas conforme"; 
          idParentCodePostal.appendChild(span);

        }
      }
    }


  }

});

const pays =  document.getElementById('pays').children[1];

pays.addEventListener('change', function(e){


  if(pays.value == "CD"){
    document.getElementById('codePostal').hidden = false;
    let p = document.getElementById('codePostal').children[0];
    let c = document.getElementById('codePostal').children[1];
    c.name = "etat";
    p.innerHTML = "Etat";

    let element = document.getElementById('adresse');
    element.classList.remove("col-lg-12");
    
  }
  else {
    document.getElementById('codePostal').hidden = false;
    let p = document.getElementById('codePostal').children[0];
    let c = document.getElementById('codePostal').children[1];
    p.innerHTML = "Code Postal";
    c.name ="codePostal";

    let element = document.getElementById('adresse');
    element.classList.remove("col-lg-12");

  }
  



});   

