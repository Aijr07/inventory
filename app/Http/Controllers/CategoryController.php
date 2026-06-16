<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use App\Http\Controllers\Api\BaseController; // Import BaseController
use Exception;

class CategoryController extends BaseController { // Ganti extends ke BaseController
    protected CategoryService $svc;

    public function __construct(CategoryService $svc) {
        $this->svc = $svc;
    }

    public function index() {
        return $this->success($this->svc->all(), "Berhasil menarik semua data Kategori");
    }

    public function store(StoreCategoryRequest $req) {
        $cat = $this->svc->create($req->validated());
        return $this->success($cat, "Kategori berhasil dibuat", 201);
    }

    public function show($id) {
        try {
            $cat = $this->svc->find($id);
            return $this->success($cat, "Berhasil menarik satu data kategori");
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    public function update(UpdateCategoryRequest $req, $id) {
        $cat = $this->svc->update($id, $req->validated());
        return $this->success($cat, "Kategori berhasil diperbarui");
    }

    public function destroy($id) {
        $this->svc->delete($id);
        return $this->success(null, "Kategori berhasil dihapus", 200);
    }
}