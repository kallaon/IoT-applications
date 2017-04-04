# IoT-applications
Web application for visualization of measurement data in IoT applications


Front-End je nanovo nahodený, takže veľa linkov neexistuje

pre test api :

- - - - - - -- 
registracia
- - - - - - - -

http://localhost/testo/api/test

užívateľa vytvorí pomocou : 

body parametre:
{
  name, password, email
}
______________________________________

--------------
login
---------------
http://localhost/testo/api/login

body parametre:
{
  name, email
}
____________________________
-------------
pirdanie hodnoty
--------------

http://localhost/testo/api/value

body parametre:
{
  id_device, value
}

head parametre:
{
 Key: Authorization Value: api klúč z loginu
}
