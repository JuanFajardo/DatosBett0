#!/bin/python
import urllib, urllib2
import base64

url  = "http://127.0.0.1/datosBett0/public/index.php/Celular"
f = open("/var/www/html/datosBett0/public/celulares/CelularesApp", "r")

nombre = ""
cadena = ""
telefono = ""
for i in f:
    try:
        datos = i.split("|")
        for j in datos:
            try:
                dato = j.split("-")
                cadena = '{"nombre":"' + str(dato[0]) + '", "telefono":"' + str(dato[1]) + '", "origen":"sql", "archivo":"CelularApp", "extra":"App"}'
                nuevo = url + "/" + base64.b64encode(cadena)
                servidor = urllib.urlopen( nuevo ).read()
                print servidor
            except:
                print "Error: 2 For"
    except:
        print "Error: 1 For"
