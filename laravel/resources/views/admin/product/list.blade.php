@extends('template.admin')
@section('body')

<div class="d-flex justify-content-between">
          <h3 class="mb-4">Products</h3>
          <div>
            <a href="#" class="btn btn-outline-success rounded-0">Manage Categories</a>
            <a href="product_add.html" class="btn btn-primary rounded-0">Add Product</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-primary-subtle text-primary">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-box"></i>
                  20
                </div>
                PRODUCTS
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-danger-subtle text-danger">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-box-open"></i>
                  3
                </div>
                RUNNING OUT
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-success-subtle text-success">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-boxes"></i>
                  5
                </div>
                CATEGORIES
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-dark-subtle text-dark">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-archive"></i>
                  0
                </div>
                ARCHIVE
              </div>
            </div>
          </div>
        </div>
        
        <div class="card rounded-0 border-0 shadow-sm">
          <div class="card-body">
            <table class="table text-center">
              <thead>
                <tr>
                  <th class="text-start" colspan="2">Product</th>
                  <th>Price</th>
                  <th>Instock</th>
                  <th>Rating</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="align-middle">
                <tr>
                  <td style="width:64px">
                    <img src="assets/img/products/iphone.webp" class="w-100">
                  </td>
                  <td class="text-start">
                    <strong>
                      iPhone 15 Pro Max 256GB Gold Rose
                    </strong>
                    <br>
                    <small>
                      Id: <strong>1</strong> | 
                      Category: <a href="#" class="text-decoration-none fw-bold">Điện thoại</a> 
                    </small>
                  </td>
                  <td c>
                    24,000,000đ
                    <br><del>25,000,000đ</del>
                  </td>
                  <td>
                    50
                  </td>
                  <td>
                    4.6<br>
                    <i class="fas fa-star fa-xs text-warning"></i>
                    <i class="fas fa-star fa-xs text-warning"></i>
                    <i class="fas fa-star fa-xs text-warning"></i>
                    <i class="fas fa-star fa-xs text-warning"></i>
                    <i class="far fa-star fa-xs text-warning"></i>
                  </td>
                  <td>
                    <a href="#" target="_blank" class="btn btn-primary btn-sm">
                      <i class="fas fa-eye fa-fw"></i>
                    </a>
                    <a href="#" class="btn btn-outline-warning btn-sm">
                      <i class="fas fa-pencil fa-fw"></i>
                    </a>
                    <a href="#" class="btn btn-outline-danger btn-sm">
                      <i class="fas fa-times fa-fw"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>




@endsection
