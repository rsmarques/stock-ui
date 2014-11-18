# StockUI

Simple project that simulates the behavior of a stock during a day.

## Implementation

* REST-based application implemented with Laravel
* InfluxDB as main database system

## Requirements

In order to build the application a installation of [Composer]{https://getcomposer.org/} and [InfluxDB](http://influxdb.com/) is required.

## Usage

1. Configure your InfluxDB credentials/ports on server.php
2. composer install
3. php artisan serve
4. Launch the application in your browser (by default, the server is binded to the port 8000)
5. Have fun!
