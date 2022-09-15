import wget

url = "https://prices.csgotrader.app/latest/prices_v6.json"

response = wget.download(url, "public_html/prices.json")

open("public_html/prices.json", "wb")
