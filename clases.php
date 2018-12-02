. busca absolutamente todos los caracteres, nueros y caracteres especiales
\d busca caracteres numericos
\D busca todo lo que no sean caracteres
\w busca todo lo que pueda ser parte de una palabra incluyendo numeros pero no busca puntos, comas, dos puntos, @, corchetes,
   en pocas pabras no busca caracteres especiales  
\s busca los espacios
\. busca puntos 
: busca dos puntos
@ busca un arroba
^ que inicie con
$ que termine con 
+ uno o mas 
? cero o uno
^$ que inicie y que termine con
^()*$ que inicie y que termine con y al terminar que se vuelva a repetir
[^a-z] estamos negando de la a la z
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