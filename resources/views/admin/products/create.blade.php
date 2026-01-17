@extends('admin.layouts.app')

@section('title', 'Ürün Ekle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Yeni Ürün Oluştur</h3>
    </div>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (Türkçe)</label>
                        <input type="text" name="name_tr" class="form-control" value="{{ old('name_tr') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (İngilizce)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Ürün Kategorisi</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Kategori Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name_tr }} / {{ $category->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kısa Açıklama (Türkçe)</label>
                        <textarea name="short_description_tr" class="form-control" rows="3">{{ old('short_description_tr') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kısa Açıklama (İngilizce)</label>
                        <textarea name="short_description_en" class="form-control" rows="3">{{ old('short_description_en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (Türkçe)</label>
                        <textarea name="description_tr" class="form-control" rows="5">{{ old('description_tr') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (İngilizce)</label>
                        <textarea name="description_en" class="form-control" rows="5">{{ old('description_en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Uygulama Alanları (Türkçe)</label>
                        <textarea name="applications_tr" class="form-control" rows="4">{{ old('applications_tr') }}</textarea>
                        <small class="form-hint">List of applications for this product</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Uygulama Alanları (İngilizce)</label>
                        <textarea name="applications_en" class="form-control" rows="4">{{ old('applications_en') }}</textarea>
                        <small class="form-hint">List of applications for this product</small>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Ana Resim</label>
                <input type="file" name="image" class="form-control">
                <small class="form-hint">Upload product main image</small>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Teknik Dökümanlar (PDF)</label>
                        <input type="file" name="pdfs[]" class="form-control" multiple accept=".pdf">
                        <small class="form-hint">Birden fazla PDF yükleyebilirsiniz. Maksimum dosya boyutu: 5MB. Dosya adları otomatik oluşturulur.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sıra</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" checked>
                            <span class="form-check-label">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.products.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Ürün Oluştur</button>
        </div>
    </form>
</div>
@endsection
