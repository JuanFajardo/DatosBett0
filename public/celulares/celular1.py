#!/bin/python
import urllib, urllib2
import base64

url  = "http://127.0.0.1/datosBett0/public/index.php/Celular"
f = open("/var/www/html/datosBett0/public/celulares/Celulares", "r")

nombre = ""
cadena = ""
telefono = ""
for i in f:
    try:
        if ("Contacto +" not in i) and len(i) >10 : 
		nombre   =  (str(i).rstrip('\n')).strip()
		telefono =  ""
        elif "Contacto +" in i:
                telefono =  (((str(i).split('+'))[1]).rstrip('\n')).strip()

	if len(telefono) > 1:
		cadena = '{"nombre":"'+nombre+'", "telefono":"'+telefono+'", "origen":"txt", "archivo":"celular", "extra":"nada"}'
                nuevo = url + "/" + base64.b64encode(cadena)
                #print nuevo 
                servidor = urllib.urlopen( nuevo ).read()
		print servidor
    except:
        print "Error : " + nombre + " -- " + celular

