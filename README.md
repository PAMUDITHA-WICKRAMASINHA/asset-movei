## create model with migration

-   php artisan make:model ModelName -m

## create controller with resource

-   php artisan make:controller NameOfController --resource --model=ModelName

## create migration

-   php artisan make:migration create_users_table

## get fersh DB

-   php artisan migrate:fresh --seed

## create routes

-   use App\Http\Controllers\CategoryController;
-   Route::resource('categories', CategoryController::class);

-   GET /categories: -> Maps to the index method of CategoryController to display a listing of categories.
-   GET /categories/create: -> Maps to the create method of CategoryController to show the form for creating a new category.
-   POST /categories: -> Maps to the store method of CategoryController to store a newly created category in storage.
-   GET /categories/{category}: -> Maps to the show method of CategoryController to display a specific category.
-   GET /categories/{category}/edit: -> Maps to the edit method of CategoryController to show the form for editing a specific category.
-   PUT/PATCH /categories/{category}: -> Maps to the update method of CategoryController to update a specific category in storage.
-   DELETE /categories/{category}: -> Maps to the destroy method of CategoryController to remove a specific category from storage.
