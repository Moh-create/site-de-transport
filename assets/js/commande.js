
      document.getElementById('lesPointsRelais').hidden = true;
      document.getElementById('adresseLivraison').hidden = true;

    function ClickPointRelais(){

       let verification =  document.getElementById('modeLivraison').children[0][0].checked;

       if(verification)
       {
        document.getElementById('lesPointsRelais').hidden = false;
  

       }else {

        document.getElementById('lesPointsRelais').hidden = true;
       }

    }


    function clickAdresseLivraison(){

        let verification =  document.getElementById('modeLivraison').children[1][0].checked;



        if(verification)
        {
        document.getElementById('adresseLivraison').hidden = false;

        }else {

        document.getElementById('adresseLivraison').hidden = true;
        }

    }










    const selectElement = document.getElementById('modeLivraison').children[0][1];   
    let info;
  
    selectElement.addEventListener('change', function() {   
        
        if(document.getElementById('infoPointRelais') !=  null)
        {
            let element = document.getElementById('infoPointRelais');
            element.remove();
        }

        var xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
                const lesPointRelais = JSON.parse(this.responseText);

                for(let i = 0; i< lesPointRelais.length; i++)
                {
                    if(lesPointRelais[i].id == selectElement.value)
                    {

                        let pointRelaisLecture = lesPointRelais[i];
                  
                        
                        let infoPointRelais  = document.getElementById('infoPointRelais');

                        if(infoPointRelais == null)
                        {
                            info = document.createElement("div");
                            info.id = "infoPointRelais";
                            selectElement.parentNode.appendChild(info);
                            
                            console.log(pointRelaisLecture);

                            Object.keys(pointRelaisLecture).forEach(function(key) {
                                console.table('Key : ' + key + ', Value : ' + pointRelaisLecture[key]);

                                if(pointRelaisLecture[key] != "" && key != "id" && pointRelaisLecture[key] != null ){

                                    if(key == "pays"){
                                        let c = pointRelaisLecture[key]
                                        Object.keys(c).forEach(function(k) {


                                            let paragraphe = document.createElement("p");
                                            if(k != "codePays"){

                                            paragraphe.innerText = ` ${key} :  ${c[k]}`;
                                            document.getElementById('infoPointRelais').appendChild(paragraphe);
                                            }


                                        });


                                    }else{


                                    let paragraphe = document.createElement("p");
                                    paragraphe.innerText = ` ${key} :  ${pointRelaisLecture[key]}`;
                                    document.getElementById('infoPointRelais').appendChild(paragraphe);

                                    }

                                }

                            });


                            let boutton = document.createElement("button");
                            boutton.classList.add("btn-primary");
                            boutton.classList.add("btn");
                            boutton.textContent = "Commander";
                            document.getElementById('infoPointRelais').appendChild(boutton);



                               
                        }

                    }

                }

                
            }
        };
        xhttp.open("GET", "../assets/json/pointRelais.json", true);
        xhttp.send();

       

              
    });

    

    const bouttonModeLivrasion = document.getElementById('modeLivraison').children[1][0];

    
    bouttonModeLivrasion.addEventListener('click', function(event) {         

        if(document.getElementById('modeLivraison').children[0][0].checked == true && document.getElementById('modeLivraison').children[1][0].checked == true)
        {
            event.preventDefault();

            let createSpan =  document.createElement('span');
            createSpan.innerHTML = "Veuillez choisir un des solutions proposées";


            if(document.getElementById('modeLivraison').children[2] == null) 
            {
                document.getElementById('modeLivraison').appendChild(createSpan);

            }

            

        }




    });



    const boutonPointRelais = document.getElementById('modeLivraison').children[0][0];

    
    boutonPointRelais.addEventListener('click', function(event) {         

        if(document.getElementById('modeLivraison').children[0][0].checked == true && document.getElementById('modeLivraison').children[1][0].checked == true)
        {
            event.preventDefault();

            let createSpan =  document.createElement('span');
            createSpan.innerHTML = "Veuillez choisir un des solutions proposées";


            if(document.getElementById('modeLivraison').children[2] == null) 
            {
                document.getElementById('modeLivraison').appendChild(createSpan);

            }
            

        }

 

    });




