<?php

use Illuminate\Support\Facades\Route;

Route::get('/','MyController@login');
Route::get('login','MyController@loginID')->name('login');
Route::post('logincheck','MyController@loginCheck')->middleware('role');
Route::get('logout','MyController@logOut')->name('logout');
Route::get('dashboard','MyController@Dashboard')->name('dash')->middleware('login');



Route::group(['middleware' => ['admin']], function () {

    Route::post('getincome','MyController@GetIncome');
    Route::get('income','AccountingController@Income');
    Route::get('expense','AccountingController@Expense');
Route::get('all-products','MyController@AllProduct');
Route::get('all-employee','EmployeeController@AllEmployee');
Route::post('all-employee/add','EmployeeController@AddEmployee');
Route::post('all-employee/update','EmployeeController@UpadteEmployee');
Route::get('all-employee/status/{id}','EmployeeController@EmployeeStatus');
Route::get('all-employee/delete/{id}','EmployeeController@EmployeeDelete');
Route::get('all-employee/get/{id}','EmployeeController@EmployeeGet');

Route::get('all-table','TableController@AllTable');
Route::post('all-table/add','TableController@AddTable');
Route::post('all-table/update','TableController@UpadteTable');
Route::get('all-table/status/{id}','TableController@TableStatus');
Route::get('all-table/delete/{id}','TableController@TableDelete');
Route::get('all-table/get/{id}','TableController@TableGet');

Route::get('all-supplier','SupplierController@AllSupplier');
Route::post('all-supplier/add','SupplierController@AddSupplier');
Route::post('all-supplier/update','SupplierController@UpadteSupplier');
Route::get('all-supplier/status/{id}','SupplierController@SupplierStatus');
Route::get('all-supplier/delete/{id}','SupplierController@SupplierDelete');
Route::get('all-supplier/get/{id}','SupplierController@SupplierGet');

Route::get('all-products','ProductController@AllProduct');
Route::post('all-products/add','ProductController@AddProduct');
Route::post('all-products/update','ProductController@UpadteProduct');
Route::get('all-products/status/{id}','ProductController@ProductStatus');
Route::get('all-products/delete/{id}','ProductController@ProductDelete');
Route::get('all-products/get/{id}','ProductController@ProductGet');


Route::get('all-unit','UnitController@AllUnit');
Route::post('all-unit/add','UnitController@AddUnit');
Route::post('all-unit/update','UnitController@UpadteUnit');
Route::get('all-unit/status/{id}','UnitController@UnitStatus');
Route::get('all-unit/delete/{id}','UnitController@UnitDelete');
Route::get('all-unit/get/{id}','UnitController@UnitGet');


Route::get('vat','VatController@AllVat');
Route::post('vat/add','VatController@AddVat');
Route::post('vat/update','VatController@UpadteVat');
Route::get('vat/status/{id}','VatController@VatStatus');
Route::get('vat/delete/{id}','VatController@VatDelete');
Route::get('vat/get/{id}','VatController@VatGet');

Route::get('discount','DiscountController@AllDiscount');
Route::post('discount/add','DiscountController@AddDiscount');
Route::post('discount/update','DiscountController@UpadteDiscount');
Route::get('discount/status/{id}','DiscountController@DiscountStatus');
Route::get('discount/delete/{id}','DiscountController@DiscountDelete');
Route::get('discount/get/{id}','DiscountController@DiscountGet');


Route::get('all-dish','DishController@AllDish');
Route::post('all-dish/add','DishController@AddDish');
Route::post('all-dish/update','DishController@UpadteDish');
Route::get('all-dish/status/{id}','DishController@DishStatus');
Route::get('all-dish/delete/{id}','DishController@DishDelete');
Route::get('all-dish/get/{id}','DishController@DishGet');
Route::get('recipe','DishController@RecipeDish');
Route::get('add-recipe/{id}','DishController@RecipeAdd');
Route::post('add-recipe','DishController@NewRecipeAdd');
Route::get('delete-recipe/{id}','DishController@RecipeDelete');




Route::get('all-item','StockController@AllItem');
Route::post('all-item/add','StockController@AddItem');
Route::post('all-item/update','StockController@UpadteItem');
Route::get('all-item/status/{id}','StockController@ItemStatus');
Route::get('all-item/delete/{id}','StockController@ItemDelete');
Route::get('all-item/get/{id}','StockController@ItemGet');

Route::get('all-item-stock','StockController@AllStock');
Route::post('all-item-stock/add','StockController@AddStock');
Route::post('all-item-stock/update','StockController@UpadteStock');
Route::get('all-item-stock/status/{id}','StockController@StockStatus');
Route::get('all-item-stock/delete/{id}','StockController@StockDelete');
Route::get('all-item-stock/get/{id}','StockController@StockGet');


    Route::get('all-stock','StockController@AllDetails');
    Route::get('stock-details/{id}','StockController@StockDetails');
    Route::get('supplier-stock/{id}','StockController@StockSupDetails');


    Route::get('application','ApplicationController@Application');




    Route::get('expense-details/{id}','AccountingController@ExpenseDetails');
    Route::post('expense/add','AccountingController@AddExpense');
    Route::post('expense/update','AccountingController@UpdateExpense');
    Route::get('expense/get/{id}','AccountingController@ExpenseGet');
});

Route::group(['middleware' => ['waiter']], function () {

Route::get('order','OrderController@OrderDish');
Route::get('all-orders','OrderController@AllOrder');
Route::get('unpaid-orders','OrderController@UnpaidOrder');
Route::get('details-order/{id}','OrderController@DetailsOrder');
Route::get('order/order-add','OrderController@OrderDishadd');
Route::get('order/type/{id}','OrderController@DishType');
Route::get('order/dish/{id}','OrderController@DishInfo');
Route::post('order/order-add','OrderController@OrderAdd');
Route::get('all-orders/get-order-details/','OrderController@GetOrder');
Route::get('or-can/{id}','OrderController@OrderCancel');
Route::get('deliver/{id}','OrderController@OrderDeliver');
Route::post('order/pay-add','PaymentController@PayAdd');
Route::get('payafter/{id}','PaymentController@PayAfter');
});


Route::group(['middleware' => ['kitchen']], function () {

Route::get('kitchen-live','KitchenController@Kitchen');
Route::get('kitchen-live/status','KitchenController@KitchenStatus');
Route::get('change/{id}','KitchenController@KitchenChange');
    Route::get('kitchen/{id}','KitchenController@KitchenAd');
});

