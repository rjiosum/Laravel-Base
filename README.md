# Base Controller & Model For Laravel Projects
Base controller and model for small to medium size laravel projects. 
Base model automatically populates uuid column of an entity (if the column exists).
It also resolves route model binding with id, uuid or slug. 
e.g we can access a product using any of the following end points:

/product/:id

/product/:uuid

/product/:slug
  
### Prerequisites
```
  Make sure to use a version of laravel >= 5.8.*
```

### How to use
 - Download as zip and extract.
 
 - Copy `BaseController.php` in app/Http/Controllers directory, extend all your controllers with BaseControllers.
 
 - Copy `BaseModel.php` in app/Models/ directory, extend all your models with BaseModel.
 
 - Copy `FlashMessages.php` in app/Traits/ directory.
 