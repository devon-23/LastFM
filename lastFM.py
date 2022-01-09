#! /usr/bin/python3
import requests
import webbrowser
API_KEY = '092d316884d8385f35ad8b84f5f42ef8'
USER_AGENT = 'Devonnn'

headers = {
    'user-agent': USER_AGENT
}

payload = {
    'api_key': API_KEY,
    'method': 'track.getInfo',
    'user': 'devonbarks',
    'track': 'Summer Snow',
    'artist': 'Spirit of the Bear',
    'format': 'json'
}

r = requests.get('https://ws.audioscrobbler.com/2.0/', headers=headers, params=payload)
r.status_code

import json

def jprint(obj):
    # create a formatted string of the Python JSON object
    text = json.dumps(obj, sort_keys=True, indent=4)
    print(text)

jprint(r.json())

webbrowser.open('lastFM.py')