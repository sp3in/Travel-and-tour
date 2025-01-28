# Use the official PHP image
FROM php:8.2-apache

# Copy the application code into the container
COPY . /var/www/html/

# Expose port 80 for HTTP
EXPOSE 80
