#!/usr/bin/env python
# -*- coding: cp1252 -*-

from bs4 import BeautifulSoup
import urllib, urllib2
import requests
import base64
from PIL import Image
from io import BytesIO
import datetime

from urllib import urlopen
from StringIO import StringIO

url = "https://sib.org.bo/sin/index.php?option=com_sib&view=guia&layout=detalle&id="
urlDato = "http://127.0.0.1/datosBett0/public/index.php/Sib"
for i in range (100047598, 100052906):
    try:
        array = ""
        link = url + str(i)
        pagina = urllib.urlopen(link).read()
        html = BeautifulSoup(pagina, "lxml")
        nombre = registro = especialidad = departamento = fecha_registro = universidad = fecha_diplomado = ""
        img = html.find_all('img')[0]

        imagen = str(img['src'])
        imgLink= "http://sib.org.bo"
        imgUrl = imgLink + imagen

        if "&amp;" in imgUrl:
            imgUrl = url.replace("&amp;", "&")

        data = urlopen( imgUrl ).read() 
        file = StringIO(data)
        img = Image.open(file)
        img.save( str(i)+".png" )

        bs64 = str(i)+".png"

        linea = html.find_all('div')[4]
        datos = str(linea.text.encode('utf-8')).split(':')
        if len(datos) == 13:
            nombre      = str(datos[0].split('Listado')[1]).split('Registro')[0].strip()
            registro    = str(datos[2].split('Especialidad')[0]).strip()
            especialidad= str(datos[4].split('Departamental')[0]).strip()
            departamento= str(datos[6].split('Fecha')[0]).strip()
            fecha_registro = str(datos[8].split('Universidad')[0]).strip()
            universidad = str(datos[10].split('Fecha')[0]).strip()
            fecha_diplomado= str(datos[12].split('IMPORTANTE')[0]).strip()
        elif len(datos) == 11:
            nombre      = str(datos[0].split('Listado')[1]).split('Especialidad')[0].strip()
	    registro    = "000"
            especialidad= str(datos[2].split('Departamental')[0]).strip()
            departamento= str(datos[4].split('Fecha')[0]).strip()
            fecha_registro = str(datos[6].split('Universidad')[0]).strip()
            universidad = str(datos[8].split('Fecha')[0]).strip()
            fecha_diplomado= str(datos[10].split('IMPORTANTE')[0]).strip()
        sib   = str(i)
        array = ({ "sib":sib, "nombre":nombre, "registro":registro, "especialidad":especialidad, "departamento":departamento, "fecha_registro":fecha_registro, "universidad":universidad, "fecha_diplomado":fecha_diplomado, "imgUrl":imgUrl, "imagen":bs64 })
	#print array
        post = urllib.urlencode( array )
        msj  = urllib2.urlopen( urlDato, post ).read()
        print msj
    except urllib2.HTTPError as e:
        print e
