@extends('admin.layouts.app')

@section('title', 'Referans Ekle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Yeni Referans Oluştur</h3>
    </div>
    <form action="{{ route('admin.references.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="name_tr" class="form-control" value="{{ old('name_tr') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (İngilizce)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kategori (Türkçe)</label>
                        <input type="text" name="category_tr" class="form-control" value="{{ old('category_tr') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kategori (İngilizce)</label>
                        <input type="text" name="category_en" class="form-control" value="{{ old('category_en') }}">
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

            <div class="mb-3">
                <label class="form-label">Resim</label>
                <input type="file" name="image" class="form-control">
                <small class="form-hint">Upload reference image</small>
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
            <a href="{{ route('admin.references.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Referans Oluştur</button>
        </div>
    </form>
</div>
@endsection
