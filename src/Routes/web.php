<?php

Route::resource('domains','DomainsController');

Route::prefix('domain/{domain_id}')->group(function () {
    Route::resource('permissions', 'PermissionController');
});

