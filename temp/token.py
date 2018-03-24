#!/usr/bin/python3
import datetime
import requests # http://docs.python-requests.org/

# replace with your client information: developer.whereismytransport.com/clients
CLIENT_ID = '8e411440-0548-49ed-ab08-d82546a6fa7b' 
CLIENT_SECRET = '10SMVl6YGIYohIcJmUkukabN25VutFCTsY80mX4GFD4='

payload = {
	"client_id": CLIENT_ID,
	"client_secret": CLIENT_SECRET,
	"grant_type": "client_credentials",
	"scope": "transportapi:all"
}

r = requests.post( 'https://identity.whereismytransport.com/connect/token', data=payload)
if r.status_code != 200:
	raise Exception("Failed to get token")

access_token = r.json()['access_token']