Blog Project with Symfony 3.3
======

A Symfony project created on July 7, 2017, 5:37 pm.

>Installing
    
    #add vendors
    composer install
       
    #create database
    php bin/console doctrine:database:create
        
    #add migrations(entities) to database
    php bin/console doctrine:schema:update --force
     
    #Add User
    php bin/console fos:user:create
    #or
    http://localhost:8000/register
       
    #Add role to user
    php bin/console fos:user:promote username ROLE_ADMIN
                
    #run on the server
    php bin/console server:run
    
    That's it!
   
   

>Frontend
![alt text](http://i.hizliresim.com/mkk6AY.png)


>Backend
![img](http://i.hizliresim.com/Ddd2gZ.png)
