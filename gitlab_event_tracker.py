import requests
import json
from datetime import date, timedelta
#if github
# userName = "silnex"
# reposName = "sundrytoolbox"
# https://api.github.com/repos/SilNex/sundrytoolBox/events
#fi github

def getUserID(userName):
    apiLink = "https://gitlab_domain/api/v4/users"
    req = requests.get(apiLink, cookies = gitlabCookie)
    for userinfo in json.loads(req.text):
        if userinfo['username'] == userName:
            return userinfo['id']
    return "not found"

def checkUpdateEvent(userID):
    '''
    If update event then
        return True
    else
        return False
    '''
    yesterday = (date.today() - timedelta(1)).isoformat()
    apiLink = "https://gitlab_domain/api/v4/users/"+str(userID)+"/events?action=pushed&after="+yesterday
    req = requests.get(apiLink, cookies = gitlabCookie)
    event = json.loads(req.text)
    f = open(".lastupdatetime", "r+")
    if f.read() == event[0]['created_at']:
    return False
    f.close()
    f = open(".lastupdatetime", "w+")
    f.write(event[0]['created_at'])
    f.close()
    return True

userName="silnex"
userID = getUserID(userName)
if userID == "not found":
    print ("user not found")
    exit()
print(checkUpdateEvent(userID))
