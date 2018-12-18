#!/bin/python
import urllib, urllib2
import os
import base64

url = "https://www.cies.org.bo/llaves/test8.php"
url2 = "http://127.0.0.1/datosBett0/public/index.php/Cies"
for i in range(6388553, 6999999):
	try:
		post   =  urllib.urlencode({'u': str(i)})
		pagina =  urllib.urlopen(url, post).read()
		if len(pagina) > 55:
			nuevo    = url2 + "/" + base64.b64encode(pagina)
			servidor = urllib.urlopen( nuevo ).read()
			if len(servidor) < 15:
				print servidor
			else:
				try:
					path = os.getcwd()
					path = path + '/' + str(i) + '.txt'
					with open(path, 'w') as escribir:
    						escribir.write( servidor )
				except:
					print "Error Insercion de Datos: "	+ str(i)
	except:
		print "Error Extraccion de Datos : " + str(i)
