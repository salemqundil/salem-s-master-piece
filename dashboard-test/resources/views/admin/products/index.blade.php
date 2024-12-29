@extends('admin.layouts.app')
@section('panel')

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content animate__animated animate__fadeInUp">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="importModalLabel">Upload Your File</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.import') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-4">
                        <div class="custom-file-drop-area" onclick="document.getElementById('formFile').click()">
                            <div class="file-icon">📁</div>
                            <h6 class="mb-2">Drag and drop your file here</h6>
                            <p class="text-muted mb-0">or click to browse</p>
                            <input class="form-control d-none" type="file" id="formFile" name="import_file" required>
                            <div class="invalid-feedback">
                                Please select a file to import.
                            </div>
                        </div>
                        <div id="selectedFileName" class="text-center mt-2 text-muted"></div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="submit-btn btn text-white">
                            <i class="bi bi-upload me-2"></i>Import File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two custom-data-table">
                        <thead>
                            <tr>
                                <th>@lang('Product Name')</th>
                                <th>
                                    <div class="mt-3">
                                        <form method="GET" action="{{ route('admin.product.index') }}">
                                            <select name="category_id" id="categoryFilter" class="bg-w"
                                                style="width: 200px;" onchange="this.form.submit()">
                                                <option class="text--black" value="">All Categories</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" class="text--black"
                                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </th>
                                <th>@lang('Price')</th>
                                <th>@lang('Discount Price')</th>
                                <th>@lang('Image')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $item)
                            <tr>
                                <td>{{__($item->name)}}</td>
                                <td data-category-id="{{__($item->category->id)}}">{{__($item->category->name)}}</td>
                                <td>
                                    $ {{__(showAmount($item->price))}}
                                </td>
                                <td> @if(isset($item->discount))
                                    {{__($item->discount)}}%
                                    @else
                                    <span>@lang('No')</span>
                                    @endif
                                </td>
                                <td><img src="{{$item->productImages[0]->image}}" alt="Product Image" class="rounded"
                                        style="width:50px;">
                                </td>

                                <td>
                                    @if($item->status == 1)
                                    <span class="badge badge--success">Active</span>
                                    @else
                                    <span class="badge badge--warning">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="button--group">
                                        <a href="{{route('admin.product.edit',$item->id)}}"
                                            class="btn btn-sm btn--primary"><i class="las la-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">No Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            @if ($products->hasPages())
            <div class="card-footer py-4">
                <nav class="float-end" id="number">
                    <ul class="pagination">
                        @for($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="page-item @if ($products->currentPage() == $i) active @endif">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor
                    </ul>
                </nav>
            </div>
            @endif

        </div><!-- card end -->
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
// Form validation
(function() {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()

// Display selected filename
document.getElementById('formFile').addEventListener('change', function() {
    const fileName = this.files[0]?.name;
    document.getElementById('selectedFileName').textContent = fileName || '';
});

// Drag and drop functionality
const dropArea = document.querySelector('.custom-file-drop-area');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
    dropArea.style.background = '#e9ecef';
}

function unhighlight(e) {
    dropArea.style.background = 'white';
}

dropArea.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    document.getElementById('formFile').files = files;
    document.getElementById('selectedFileName').textContent = files[0]?.name || '';
}

</script>

@endsection
@push('breadcrumb-plugins')
<style>
.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.modal-header {
    background: linear-gradient(45deg, rgb(94, 233, 233), #00adad);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 20px;
}

.modal-body {
    padding: 30px;
    background: #f8f9fa;
}

.form-control {
    border-radius: 10px;
    padding: 12px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #00adad;
    box-shadow: 0 0 0 0.2rem rgba(33, 147, 176, 0.2);
}

.custom-file-drop-area {
    border: 2px dashed #00adad;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    background: white;
    transition: all 0.3s ease;
    cursor: pointer;
}

.custom-file-drop-area:hover {
    background: #f8f9fa;
    border-color: #00adad;
}

.submit-btn {
    background: linear-gradient(45deg, rgb(94, 233, 233), #00adad);
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(33, 147, 176, 0.3);
    background: linear-gradient(45deg, rgb(94, 233, 233), #00adad);
}

.file-icon {
    font-size: 48px;
    color: #00adad;
    margin-bottom: 15px;
}
</style>
<a href="{{route('admin.product.create')}}" class="btn btn-sm btn--primary "><i class="las la-plus me-2"></i>@lang('Add
    New')</a>
<button type="button" class="btn btn-sm btn--primary " data-bs-toggle="modal" data-bs-target="#importModal">
    <i class="la la-cloud-upload me-2"></i>Import Data</button>
@endpush