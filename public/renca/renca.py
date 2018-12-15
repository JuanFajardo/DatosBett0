#!/bin/python
# -*- coding: utf-8 -*-

import urllib, urllib2
import requests
import base64
import re
from PIL import Image
from io import BytesIO
from bs4 import BeautifulSoup

def datosImagen( html ):
    try:
        for img in html.find_all('img'):
            imagen = str(img['src'])
            link = "http://snia.mmaya.gob.bo/web/modulos/RENCA/file/"
            url = ""
            if len(img.attrs) > 1 :
                array = ({});
                url = link + imagen
                respuesta = requests.get( url )
                hexx = Image.open(BytesIO(respuesta.content))
                bs64 = base64.b64encode( hexx.tobytes() )
                numero = len(bs64)
                fotografia = ""
                if numero == 99856 or numero == 169744:
                    fotografia = "NO"
                else:
                    fotografia = "SI"
                array = ({"link_url":url, "foto":bs64, "fotografia":fotografia})
                return array
    except:
        print "ErrorImagen : " + datetime.datetime.now()

def datosScript(html, op, nit, renca):
    try:
        link = "http://snia.mmaya.gob.bo/web/modulos/RENCA/file/RENCAfunciones.php"
        script = html.find_all('script')
        arrayTitulo = ({"nro":"", "fecha":"", "grado":"", "titulo":"", "nit":nit, "renca":renca, "op":"titulo"})
        arrayTramite = ({"nro":"", "tramite":"", "fecha":"", "observacion":"", "nit":nit, "renca":renca, "op":"tramite"})
        if op == 1:
            pg = re.findall(r'\d+', str(script[2].text.strip()))[0]
            post = urllib.urlencode({"ban":"1", "id_consul": str(pg) })
        elif op == 3:
            tramites = re.findall(r'\d+', str(script[3].text.strip()))[0]
            post = urllib.urlencode({"ban":"3", "id_renca": str(tramites) })
        pagina = urllib.urlopen(link, post).read()
        sopa = BeautifulSoup(pagina, "lxml")
        contador = 0
        if len(pagina) > 692 and op == 1:
            for td in sopa.find_all('td'):
                if contador == 0:
                    contador = contador + 1
                    arrayTitulo.update({"nro" : str( td.text.encode('utf-8').strip() )})
                elif contador == 1:
                    contador = contador + 1
                    arrayTitulo.update({"fecha" : str( td.text.encode('utf-8').strip() )})
                elif contador == 2:
                    contador = contador + 1
                    arrayTitulo.update({"grado" : str( td.text.encode('utf-8').strip() )})
                elif contador == 3:
                    contador = contador + 1
                    arrayTitulo.update({"titulo" : str( td.text.encode('utf-8').strip() )})
                    contador = 0

                    return htmlPost(arrayTitulo)
        elif op == 3:
            for td in sopa.find_all('td'):
                if contador == 0:
                    contador = contador + 1
                    arrayTramite.update({"nro" : str( td.text.encode('utf-8').strip() )})
                elif contador == 1:
                    contador = contador + 1
                    arrayTramite.update({"tramite" : str( td.text.encode('utf-8').strip() )})
                elif contador == 2:
                    contador = contador + 1
                    arrayTramite.update({"fecha" : str( td.text.encode('utf-8').strip() )})
                elif contador == 3:
                    arrayTramite.update({"observacion" : str( td.text.encode('utf-8').strip() )})
                    contador = 0
                    return htmlPost(arrayTramite)
    except:
        print "ErrorSCRIPT : " + datetime.datetime.now()

def htmlPost( array ):
    try:
        link 	= "http://127.0.0.1/datosBett0/public/index.php/Renca"
	post 	= urllib.urlencode( array )
	llamar 	= urllib2.urlopen( link, post  ).read()
	print llamar
    except urllib2.HTTPError as e:
	print e

link = "http://snia.mmaya.gob.bo/web/modulos/RENCA/file/DetalleRENCA.php?id_renca="
for i in range(3448, 3901):
	try:
		page = urllib.urlopen( link + str(i) ).read()
		sopa = BeautifulSoup(page, "lxml")
		datosImagen(sopa)
		j = 0
		nit = nombre = direccion = celular = correo = departamento = observacion = nro_renca = id_renca = fecha_habilitado = tipo_consultor = titulo = ""
		for td in sopa.find_all('td'):
		    j = j + 1
		    dato = ((td.text).strip()).split(':')
		    if  j == 3:
		        nit 		= str( dato[1].encode('utf-8').strip() )
		    elif j == 8:
		        nombre 		= str( dato[1].encode('utf-8').strip() )
		    elif j == 9:
		        direccion	= str( dato[1].encode('utf-8').strip() )
		    elif j == 10:
		        celular 	= str( dato[1].encode('utf-8').strip() )
		    elif j == 11:
		        correo 		= str( dato[1].encode('utf-8').strip() )
		    elif j == 12:
		        departamento	= str( dato[1].encode('utf-8').strip() )
		    elif j == 13:
		        observacion 	= str( dato[1].encode('utf-8').strip() )
		    elif j == 14:
		        nro_renca 	= str( dato[1].encode('utf-8').strip() )
		        id_renca 	= str(i)
		    elif j == 15:
		        fecha_habilitado= str( dato[2].encode('utf-8').strip() )
		    elif j == 16:
		        tipo_consultor 	= str( dato[1].encode('utf-8').strip() )
		    elif j == 17:
			try:
		        	titulo 		= str( dato[1].encode('utf-8').strip() )
			except:
				titulo		= "NO TIENE"


		array = ({ "nit":str(nit), "nombre": nombre, "direccion": direccion, "celular":celular, "correo":correo, "departamento": departamento, "observacion":observacion, "id_renca":id_renca, "fecha_habilitado": fecha_habilitado, "tipo_consultor": tipo_consultor, "titulo": titulo })
		array.update( datosImagen( sopa) )
		htmlPost(array)
		datosScript(sopa, 1, nit, id_renca)
		datosScript(sopa, 3, nit, id_renca)
	except:
        	print "ErrorFOR : " +str(i) + " | " + datetime.datetime.now()
