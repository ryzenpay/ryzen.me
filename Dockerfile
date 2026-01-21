FROM nginx:alpine

COPY nginx.conf /etc/nginx/conf.d/default.conf

COPY images/* /usr/share/nginx/html/images/

COPY *.html /usr/share/nginx/html