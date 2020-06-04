<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(
		function () {


			/**
			 * Plano e Permission
			 */
			// Route::delete('permissions_mass_destroy', 'PermissionsController@massDestroy')->name('permissions.mass_destroy');
			Route::resource('roles', 'RolesController');
			Route::delete('roles_mass_destroy', 'RolesController@massDestroy')->name('roles.mass_destroy');

			/**
			 * Permissions x Profile
			 */
			Route::get('profiles/{profile}/permissions', 'PermissionProfileController@permissions')->name('profiles.permissions');
			Route::post('profiles/{profile}/permissions', 'PermissionProfileController@syncPermissionsProfile')->name('profiles.permissions.sync');

			/**
			 * Profile x Plans
			 */
			Route::get('profiles/{profile}/plans', 'PlanProfileController@plans')->name('profiles.plans');
			Route::post('profiles/{profile}/plans', 'PlanProfileController@syncProfilePlan')->name('profiles.plans.sync');
			Route::get('plans/{plan}/profiles', 'PlanProfileController@profiles')->name('plans.profiles');
			Route::post('plans/{plan}/profiles', 'PlanProfileController@syncPlanProfile')->name('plans.profiles.sync');

			/**
			 * Users
			 */
			Route::resource('users', 'UserController');
			// Route::delete('users_mass_destroy', 'UsersController@massDestroy')->name('users.mass_destroy');

			/**
			 * Routes Details Plans
			 */
			Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
			Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
			Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
			Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
			Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
			Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
			Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

			Route::resource('/plans', 'PlanController');

			Route::resource('user', 'UserController', ['except' => ['show']]);
			Route::resource('profiles', 'ProfileController');
			// Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
			// Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
			// Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);



			/**
			 * Routes Tenants
			 */
			Route::resource('/tenants', 'TenantsController');
		}
	);


Route::prefix('tenant')->namespace('Tenant')->middleware('auth')->group(
	function() {
		Route::resource('servers', 'ServerController');
		Route::resource('ctos', 'CtosController');
		Route::resource('instalations', 'InstalationController');
	}
);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
	return view('welcome');
});
