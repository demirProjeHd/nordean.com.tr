@extends('admin.layouts.app')

@section('title', 'Referanslar')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tüm Referanslar</h3>
        <div class="card-actions">
            <a href="{{ route('admin.references.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Referans Ekle
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Resim</th>
                    <th>Name (TR)</th>
                    <th>Category (TR)</th>
                    <th>Description (TR)</th>
                    <th>Durum</th>
                    <th class="w-1">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($references as $reference)
                <tr>
                    <td>{{ $reference->order }}</td>
                    <td>
                        @if($reference->image)
                        <img src="{{ asset($reference->image) }}" alt="" style="max-height: 50px;">
                        @endif
                    </td>
                    <td>{{ Str::limit($reference->name_tr, 40) }}</td>
                    <td>{{ $reference->category_tr }}</td>
                    <td>{{ Str::limit($reference->description_tr, 50) }}</td>
                    <td>
                        <span class="badge {{ $reference->is_active ? 'bg-green' : 'bg-red' }}">
                            {{ $reference->is_active ? 'Aktif' : 'Pasif' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <a href="{{ route('admin.references.edit', $reference) }}" class="btn btn-sm">Düzenle</a>
                            <form action="{{ route('admin.references.destroy', $reference) }}" method="POST" class="d-inline" onsubmit="return confirm('Emin misiniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Hiç referans bulunamadı.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
