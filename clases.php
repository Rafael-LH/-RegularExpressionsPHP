. busca absolutamente todos los caracteres, nueros y caracteres especiales
\d busca caracteres numericos
\D busca todo lo que no sean caracteres
\w busca todo lo que pueda ser parte de una palabra incluyendo numeros pero no busca puntos, comas, dos puntos, @, corchetes,
   en pocas pabras no busca caracteres especiales  
\s busca los espacios
\S todo lo que NO sea espacios en blanco, que no contenga es una negacion a lo que tenemos arriba
\n saltos de linea 
\. busca puntos
: busca dos puntos
@ busca un arroba
^ que inicie con
$ que termine con 
* puede o no existir uno o muchos mas
+ uno o mas 
? cero o uno
^$ que inicie y que termine con
^()*$ que inicie y que termine con y al terminar que se vuelva a repetir
'/^(\d{4}\-01\-\d\d),(\w+),(\w+),(\d+),(\d+).*$/i'; la i al final de la expresion regular lo que quiere decir es que sean mayusculas y minusculas esto es para ahorrarnos a-zA-Z
[^a-z] estamos negando de la a la z
() agrupamos los matches
_ simple y sencillamente busca un guinon bajo
[a-zA-Z0-9\.] aqui lo que hacemos es buscar de la a a la z en minuscula y mayuscula, del 0 al 9 y despues con el diagonal invertida estamos 
              escapando de los caracteres lo cual solo me buscara un . y no todos los caracteres que hay incluyendo los caracteres especiales
[a-zA-Z0-9\.\:] estamos haciendo lo mismo de arriba mas escapar con la diagonal invertida y buscamos ahora los dos puntos :               
.* encuentra todos los caracteres, absolutamente todo 
\d+[a-z] aqui le estoy diciendo que me encuentre uno o mas digito y una palabra de la a la z
.+, me buscar todos los cadenas que tenga uno o mas caracter y una coma 
[^0-9a-z] esto quire decir que no contenga del 0-9 ni de la a-z 

^\[LOG.*\[LOG\].*user:@celismx.* de esta manera estoy accediendo a [LOG ENTRY] [LOG] [user:@celismx] Logged out solo busco palabras clave 
y lo que no me interza solamente pongo .* que quiere decir lo que sea
^\[LOG.*\[LOG\].*user:@\w+?\].*$ aqui otro ejemplo

^[a-z].*\.[pdf|jpeg|gif|png]{0,}$
estoy buscando extenciones de imagenes y pdf, me buscara que sea pdf, jpeg,gif,png
^.*(pdf|png|jpeg|gif)
de esta manera tambien me busca las extensiones de pdf,gif,jpeg y png pero de una forma mas corta que la de arriba


busqueda puntual de telefonos
^\+?\d{2,3}[^\da-z]?\d{2,3}[^\da-z]?\d{2,3}[^\da-z]?[#pe]?\d*$

busqeuda de URLs asegurando de que tenga un dominio y de ahi pues traemos lo que sea 
https?:\/\/[a-z]+[\w\-\.]+\.\w{2,5}/?\S*

busqueda puntual de Email 
^([\w\._]{5,30}\+?\w{0,10}@[\w._]{3,}\.\w{2,5})$

coordenadas 1
^(\-?\d{1,3}\.\d{1,6},\s?\-?\d{1,3}\.\d{1,6},.*)$
coordenadas 2
^\-?[0-9]{2}\s\d{1,2}'\s\d{1,2}\.\d{2}"[WE],\s-?\d{1,2}\s\d{2}'\s\d{2}\.\d{2}"[NS]$

\******************************TEMA MUY IMPORTANTE*********************************\
Busqueda y Remplazo (TEMA MUY IMPORTANTE)
Nosotros podemos buscar dentro de un csv registros con expresiones regulares y remplazar lo que no necesitemos por ejemplo
solo tomar lo que necesitamos y remplazar con un insert into devidiendo lo que queremos agrupando los match con los ()
la expresion regular para hacer esto seria la siguiente:

^\d+::([\w\s,\(\)'\.\-&!\/\:]+)\s\((\d\d\d\d)\)::.*$

depues en nuestro editor poner en replace all lo siguiente:
INSERT INTO Movies(title, date) VALUES($1, $2);
donde $1 representa el primer match de agrupamiento y el $2 el segundo match de agrupamiento 
de esta manera nuestro csv quedaria para todos los registros de esta manera

insert into peliculas(title, date) values(Toy Story, 1995)

ya solo para importar el csv en nuestro gestor de bases de datos


\*******************OBTENIENDO VARIABLES QUE MANDAMOS POR GET EN LA URL*******************\
temos la siguiente url:
http://b3co.com/?s=fotografia&mode=search&module=blog

haremos una expresion regular para traernos las variables que estan por get y su valor, para esto creamos dos grupos de matchs con ()
quedara de la siguiente manera nuestra expresion regular:
[\?&](\w+)=([^&\n]+)

remplazamos con \n$1 = $2 llamando a las dos clases que creamos (el \n es solo para que de un salto de linea)
y el resultado es el siguiente:
s=fotografia      
mode=search      
module=blog

si nos fijamos estamos obteniendo el nombre de la variable y su valor, esto gracias a las dos grupos de matches 


RegExp JS
http://2ality.com/2017/05/regexp-named-capture-groups.html