@extends('admin.layouts.app')

@section('title', 'Referans Düzenle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Referans Düzenle</h3>
    </div>
    <form action="{{ route('admin.references.update', $reference) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                        <input type="text" name="name_tr" class="form-control" value="{{ old('name_tr', $reference->name_tr) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (İngilizce)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $reference->name_en) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kategori (Türkçe)</label>
                        <input type="text" name="category_tr" class="form-control" value="{{ old('category_tr', $reference->category_tr) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kategori (İngilizce)</label>
                        <input type="text" name="category_en" class="form-control" value="{{ old('category_en', $reference->category_en) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (Türkçe)</label>
                        <textarea name="description_tr" class="form-control" rows="5">{{ old('description_tr', $reference->description_tr) }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (İngilizce)</label>
                        <textarea name="description_en" class="form-control" rows="5">{{ old('description_en', $reference->description_en) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Resim</label>
                @if($reference->image)
                <div class="mb-2">
                    <img src="{{ asset($reference->image) }}" alt="" style="max-height: 150px;">
                </div>
                @endif
                <input type="file" name="image" class="form-control">
                <small class="form-hint">Upload new image to replace current one</small>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sıra</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $reference->order) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" {{ $reference->is_active ? 'checked' : '' }}>
                            <span class="form-check-label">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.references.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Referans Güncelle</button>
        </div>
    </form>
</div>
@endsection
