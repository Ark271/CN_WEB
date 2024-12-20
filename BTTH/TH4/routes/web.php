<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

// Định nghĩa route cho các chức năng quản lý vấn đề
    Route::get('/', [IssueController::class, 'index'])->name('issues.index'); // Hiển thị danh sách vấn đề (phân trang)
    Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create'); // Form thêm mới vấn đề
    Route::post('/issues', [IssueController::class, 'store'])->name('issues.store'); // Lưu vấn đề mới
    Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');
    Route::get('/{issue}/edit', [IssueController::class, 'edit'])->name('issues.edit'); // Form cập nhật vấn đề
    Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update'); // Cập nhật vấn đề
    Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy'); // Xóa vấn đề
