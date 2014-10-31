GWU DEGREE MAP
===============

###Usage

This application is free to use under the MIT license. The framework used here
is the (CodeIgniter PHP framework)[CodeIgniter]. The controllers, models, and views
can be found under the degreemap_app folder.

The main controller is in degreemap_app/controllers/pages.php. 

The database create commands can be found in the root file create_db.sql. To create the database, execute the these MySQL commands in a MySQL editor or shell prompt.  

> Note: A sample username and password can be found in the same file. 

If you would like to populate the database with test data (after it's been created of course), then
you can execute the following code anywhere in your main view or index action in the pages controller: 

```
$this->course_model->putTest();
```

This function will use the associative array in the course model to populate the columns in 
the database. 

###Dependencies

This application was tested on (PHP Ver 5.6)[PHP] with (MySQL)[MySQL] using the (CodeIgniter PHP framework)[CodeIgniter].

[CodeIgniter]: https://ellislab.com/codeigniter
[MySQL]: http://www.mysql.com/
[PHP]: http://php.net/