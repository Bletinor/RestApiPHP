# RestApiPHP

 > Rest API escrita en PHP. Prueba técnica para pasantía en ATL Software

## Using the API

The API can be tested by downloading the sql file in the _db foler and changing the parameters in the config/config.php file to match your own.

## Summary

This is a simple REST API written in PHP for managing a contact list. The API allows the client to read all or a single contact, delete, add, and update a contact. It also has a method to update the phone numbers of an already-created contact.

The api/contact folder contains the API methods to interact with the database.

In the config/config.php file the parameters and function to connect to a database are defined.

The contact class is defined in models/contact.php. The class defines all properties of a contact object, functions to interact with the object (read, create, delete, etc). This functions are called by the API.

## Security

All queries are parameterized to prevente SQL injection.

## Bonuses

The first bonus is applied in the definition of the contact class, in the functions that require an input like post().

The second bonus is the updatePhoneNum() in the models/contact.php file. This function is used to add phone numbers to contacts that are already created.
