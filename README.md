# Ecommerce rest api 

Ecommerce-rest-api is an authenticated rest api which supports CRUD operation of all .

# What is REST API

# Rest = Representational state transfer

REST stands for “Representational State Transfer” and is the set of rules that developers follow when creating an API. REST is read using JSON as we covered previously. 

# Api   =  Application Programming interface

API stands for Application Programming Interface. APIs are used for one program to communicate with another. The advantage of API is that you don't need to know how it works inside the API I'm using. Just know how to send a request to API and what kind of response will come.


                            Endpoints

                            HTTP	  Path	         Action	  Used        for

                            GET	    /sellers	     get	    get         seller details
                            GET	    /token	       get	    get         token for seller
                            POST	  /sellers	     create	  creating    a seller
                            POST	  /sellers	     update	  update      the seller mentioning the id
                            POST	  /products	     get	    get         product details
                            POST	  /products	     create	  create       a new product
                            POST	  /products	     update	  updating     an existing product specifying id
                            DELETE	/products	     delete	  delete       product specifying id
