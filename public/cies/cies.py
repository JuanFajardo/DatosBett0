
#!/bin/python
import urllib, urllib2
import base64

url = "https://www.cies.org.bo/llaves/test8.php"
url2 = "http://127.0.0.1/datosBett0/public/index.php/Cies"
for i in range(6000000, 6999999):
	post   =  urllib.urlencode({'u': str(i)})
	pagina =  urllib.urlopen(url, post).read()
	if len(pagina) > 55:
		nuevo = url2 + "/" + base64.b64encode(pagina)
		#print str(i) print nuevo
		servidor  = urllib.urlopen( nuevo ).read()
		print servidor
