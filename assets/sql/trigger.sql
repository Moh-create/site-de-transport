CREATE TRIGGER `ajoutPointRelaisEurope` BEFORE INSERT ON `utilisateur`
 FOR EACH ROW BEGIN
declare `numeroLastId`   int;
declare numMinPointRelaisFr int;
declare numMaxPointRelaisFr int;

declare p int;
declare h int;
set h = 0;
select idPointRelais into numeroLastId FROM `utilisateur` where id = (SELECT max(id) FROM `utilisateur`);

if (numeroLastId IS null) then
	SELECT min(idPointRelais) into numMinPointRelaisFr from `pointrelais` where codePays ='FR';
    
    SET New.idPointRelais = numMinPointRelaisFr;  
ELSE

    IF(numeroLastId is NOT null) THEN
    	SELECT max(idPointRelais) into numMaxPointRelaisFr from `pointrelais` where codePays ='FR';

    	If(numeroLastId = numMaxPointRelaisFr) then
            	SELECT min(idPointRelais) into numMinPointRelaisFr from `pointrelais` where codePays ='FR';
                SET New.idPointRelais = numMinPointRelaisFr;
    	ELSE
      
            	while numeroLastId <= numMaxPointRelaisFr  && h = 0
                	Do
                	set numeroLastId = numeroLastId + 1;
                	SELECT idPointRelais into p from `pointrelais` where codePays ='FR' and idPointRelais = numeroLastId;

                	if(p is not null)THEN
                    		set numeroLastId = p;
                    		SET New.idPointRelais = numeroLastId;
                    		set h = 1;
                	END IF;

             	END WHILE;    				
	    END IF;

    END IF;

END IF;

END