# What is REST API

# Rest = Representational state transfer

REST stands for “Representational State Transfer” and is the set of rules that developers follow when creating an API. REST is read using JSON as we covered previously. 

# Api   =  Application Programming interface

API stands for Application Programming Interface. APIs are used for one program to communicate with another. The advantage of API is that you don't need to know how it works inside the API I'm using. Just know how to send a request to API and what kind of response will come.

# Ecommerce rest api 

Ecommerce-rest-api is an authenticated rest api which supports CRUD operation of all .

                            Endpoints

                            HTTP	    Path	                   Action	    Used        for

                            GET	        /users/index.json	         get	    get         users details
                            GET	        /users/view/1.json	         get	    get         user  specific 
                            GET	        /token	                     get	    get         token for users
                            POST	    /users/add.json	             create	    creating    a Users
                            put	        /users/edit.json	         update	    update      the User update the id
                            DELETE	    /users/1.json	             delete	   delete       User specifying id
                            
                            GET 	    /products/index.json	     get	    get         product details
                            POST 	    /products/add.json	         create	    create       a new product
                            PUT 	    /products/edit.json	         update	   updating     an update product specifying id
                            DELETE	    /products/1.json	         delete	   delete       product specifying id


# Summary

1. A user can create,read,view,update and delete his own products.
2. An Admin can create, read, update and delete all products.
3. Requests are authenticated on the basis of tokens.
4. Tokens have a life of one hour.

# Schema Design
https://docs.google.com/document/d/1JIxKaWqGI-_psXmHjmsMBkagEn2Tu0ZHQ6Pf1W3uf5o/edit# 

# Usage

Get request / users to get all users
http://localhost:8765/users.json

Response:

{
    "users": [
        {
            "id": 1,
            "name": "Admin",
            "email": "mdashrafudding@gmail.com",
            "date_of_birth": "2020-07-15T11:07:45+00:00",
            "phone": "0175351119",
            "status": 1,
            "created": "2020-07-15T05:17:58+00:00",
            "modified": "2020-07-15T05:17:58+00:00"
        },
        {
            "id": 2,
            "name": "Ashraf",
            "email": "TAMIM@gmail.com",
            "date_of_birth": "2020-07-15T05:39:12+00:00",
            "phone": "0175351119",
            "status": 1,
            "created": "2020-07-15T05:39:39+00:00",
            "modified": "2020-07-15T05:40:04+00:00"
        }
    ]
}


