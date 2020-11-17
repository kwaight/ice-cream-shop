<?php

Route::get('/{any}', [\App\Http\Controllers\SpaController::class, 'index'])->where('any', '.*');
