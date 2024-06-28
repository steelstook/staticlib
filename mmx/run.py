from bs4 import BeautifulSoup
import json, sys, os
from urllib import request
output = 'json/' + os.path.basename(sys.argv[1])
if os.path.exists(output):
  sys.exit("err")

with open(sys.argv[1]) as fp:
    soup = BeautifulSoup(fp, 'html.parser')

#list = soup.findAll('div', attrs={'class':'form-group','iclass':'form-group'})
#print(len(list))
data = {}
for list in soup.findAll('div', attrs={'class':'form-group'}):
    #print({ list.label.get_text().strip(): list.div.get_text().strip()})
    data[list.label.get_text().strip()] = list.div.get_text().strip();
link = []
for list in soup.findAll('a'):
    link.append({list.get("download") : list.get("href")})

data["link"] = link;
with open(output, 'w', encoding='utf-8') as f:
    json.dump(data, f, ensure_ascii=False, indent=4)

os.remove(sys.argv[1]);

#data['photo'] = 
photo = (soup.find(id='profilePhotoFile').get('src'))
#data['signature'] 
signature = (soup.find(id="signatureFile").get('src'))

with request.urlopen(photo) as response:
    img = response.read();
with open("photo/" + os.path.basename(sys.argv[1]), "wb") as f:
    f.write(img)

with request.urlopen(signature) as response:
    sign = response.read();

with open("signature/" + os.path.basename(sys.argv[1]), "wb") as f:
    f.write(sign)

#print(img)

#print(soup.prettify())
#print(json.dumps(data))
print(sys.argv[1])
