FROM nginx:alpine

COPY images/* /usr/share/nginx/html/images/

COPY index.html /usr/share/nginx/html
COPY health.html /usr/share/nginx/html