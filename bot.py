import requests
res = requests.get(
    'https://buff.163.com/api/market/goods/sell_order?game=csgo&goods_id=781649&page_num=1&page_size=100').json()
price_list = []
for price in res['data']['items']:
    price_list.append((price['price']))
print("$", float(price_list[0])*0.1445*0.95)
