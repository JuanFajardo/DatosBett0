#!/bin/python
import urllib
import requests
import base64
import re
from PIL import Image
from io import BytesIO
from bs4 import BeautifulSoup

def datosImagen( html ):
    for img in html.find_all('img'):
        imagen = str(img['src'])
        link = "http://snia.mmaya.gob.bo/web/modulos/RENCA/file/"
        url = ""
        if len(img.attrs) > 1 :
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
                99856            
            #print '{"link_url":"'+url+'", "fotografia":"'+fotografia+'"}'
             
def datosScript(html, op):
    link = "http://snia.mmaya.gob.bo/web/modulos/RENCA/file/RENCAfunciones.php"
    script = html.find_all('script')
    if op == 1:
        pg = re.findall(r'\d+', str(script[2].text.strip()))[0]
        post = urllib.urlencode({"ban":"1", "id_consul": str(pg) })
    elif op == 3:
        tramites = re.findall(r'\d+', str(script[3].text.strip()))[0]
        post = urllib.urlencode({"ban":"3", "id_renca": str(tramites) })
    pagina = urllib.urlopen(link, post).read()
    sopa = BeautifulSoup(pagina, "lxml")
    for td in sopa.find_all('td'):
        print td.text

link = "http://snia.mmaya.gob.bo/web/modulos/RENCA/file/DetalleRENCA.php?id_renca="
for i in range(83, 87): #3901):
	page = urllib.urlopen( link + str(i) ).read()
	sopa = BeautifulSoup(page, "lxml")
        datosImagen(sopa)
        j = 0
        nit = nombre = direccion = celular = correo = departamento = observacion = nro_renca = id_renca = fecha_habilitado = tipo_consultor = titulo = ""
	for td in sopa.find_all('td'):
            j = j + 1
            dato = ((td.text).strip()).split(':')
            if  j == 3:
                nit = (dato[1]).strip()
            elif j == 8:
                nombre = (dato[1]).strip()
            elif j == 9:
                direccion = (dato[1]).strip()
            elif j == 10:
                celular = (dato[1]).strip()
            elif j == 11:
                correo = (dato[1]).strip()
            elif j == 12:
                departamento = (dato[1]).strip()
            elif j == 13:
                observacion = (dato[1]).strip()
            elif j == 14:
                nro_renca = (dato[1]).strip()
                id_renca = str(i)
            elif j == 15:
                fecha_habilitado = (dato[2]).strip()
            elif j == 16:
                tipo_consultor = (dato[1]).strip()
            elif j == 17:
                titulo = (dato[1]).strip()
        #datosScript(sopa, 1)
        datosScript(sopa, 3)

        print '[{"nit":"'+str(nit)+'", "nombre":"' + nombre + '"'

            
            
            
