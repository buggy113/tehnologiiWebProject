TEMA 2

Am adaugat functionalitati de server si baze de date proiectului.

Adaugarea posibilitatii de inregistrare a unui cont. Dupa inregistrare se redirectioneaza catre Login.

Adaugarea posibilitatii de login, verificarea pe server daca userul exista, creare sesiune user curent. Ulterior se poate face logout din dreapta sus, Contul Meu -> Logout

Resetarea parolei este posibila prin pagina dedicata. Am adaugat script php pentru trimis mail. 

Configurarea contului se poate face dand click pe Contul meu in dreapta sus de pe orice pagina.

Vizualizarea produselor se poate face in doua moduri:
	- pe categorii
	- toate produsele

	Accesarea acestor vederi se face din pagina principala( index.php din meniul din dreapta.
	
Cosul de cumparaturi se poate accesa din dreapta-sus.
Daca nu este nimeni logat se redirectioneaza catre login page.
	
Exista posibilitatea de a sterge obiecte din cos din pagina cosului sau de a goli tot cosul.

Este facuta si cumpararea de produse, default la crearea contului fiecare user are 10000 RON, in momentul cumpararii scade( evident).

In pagina de afisare a produselor se poate face si filtrare/sorteare 

Un administrator la logare are in meniul Contul meu posibilitatea de a accesa paginile administrare user si Istoric plati.

Din pagina administrare useri are posibilitatea de a sterge useri sau de a modifica Nume, adresa de mail..etc

In pagina de istoric plati i se afiseaza platile efectuate, valoarea, si data in care au fost efectuate.	


Am folosit si ajax pentru apeluri asincrone : -in pagina de admin.php afisarea si stergerea userilor - apelam asincron pagina showUsers.php care introduce cod in <div id="userTable">(AICI!)</div>.

SQL:

	Baza de date folosita este MySQL. Structura proiectului:
	
		users - tabel cu date dspr. useri 
		categorii produse 
		istoric - date despre istoricul platilor
		produse - 
		cart_entry - se retin intrarile in cosul de cumparaturi, se retin toate intrarile de la toti userii, urmand ca separarea sa se faca pe baza interogarii
		
	La produse
		in campul Detalii sunt stocate specificatiile produselor sub forma: <specificatie1>:<valoare1>;<specificatie2>:<valoare2>, urmand ca parsarea sa se faca in php (si se face :))
	
	Pentru procesarile server side am folosit PHP. In momentul dezvoltarii am folosit XAMPP - serverul apache, mysql, si mercury pt. mail.
		