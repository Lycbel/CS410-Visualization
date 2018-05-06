
import sys
import time 
import os.path
def process(drug,adr):
    return "-1"
 
drug = sys.argv[1];
adr = sys.argv[2];
filename = "data/"+drug+"_"+adr;

if(os.path.isfile(filename) ):
    print("1")
else:
    time.sleep(5) 
    print(process(drug,adr));
    

    