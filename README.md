# Society Management System



![Build Status](http://img.shields.io/travis/badges/badgerbadgerbadger.svg?style=flat-square)  ![License](https://camo.githubusercontent.com/cb297629267ecb0a0487565f93e92f515a29d302/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f76657273696f6e2d312e322e332d626c7565)


This project is of society management system in which society members can have facilities like approve visitor, track visitor history, notice board, book events, track of their income & expenses, complaints status etc.
Committee member will be interacting with society members for bills (maintenance bill, gas bill etc.), manage apartment, members of apartment, resolve complaints and track of visitors and staff. 
Security & staff will be monitoring of parking spot, entry exit time, track of visitors.

After download/clone project, perform following steps:
1. composer install
2. npm install
3. php artisan migrate --seed

For runing project, perform following steps:
1. php artisan websocket:serve
2. php artisan serve
