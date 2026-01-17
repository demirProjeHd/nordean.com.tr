@extends('admin.layouts.app')

@section('title', 'Çözümler')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tüm Çözümler</h3>
        <div class="card-actions">
            <a href="{{ route('admin.solutions.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Çözüm Ekle
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>İkon</th>
                    <th>Resim</th>
                    <th>Title (TR)</th>
                    <th>Description (TR)</th>
                    <th>Durum</th>
                    <th class="w-1">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($solutions as $solution)
                <tr>
                    <td>{{ $solution->order }}</td>
                    <td>
                        @if($solution->icon)
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                {!! $solution->icon !!}
                            </svg>
                        </div>
                        @endif
                    </td>
                    <td>
                        @if($solution->image)
                        <img src="{{ asset($solution->image) }}" alt="" style="max-height: 50px;">
                        @endif
                    </td>
                    <td>{{ Str::limit($solution->title_tr, 40) }}</td>
                    <td>{{ Str::limit($solution->description_tr, 50) }}</td>
                    <td>
                        <span class="badge {{ $solution->is_active ? 'bg-green' : 'bg-red' }}">
                            {{ $solution->is_active ? 'Aktif' : 'Pasif' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <a href="{{ route('admin.solutions.edit', $solution) }}" class="btn btn-sm">Düzenle</a>
                            <form action="{{ route('admin.solutions.destroy', $solution) }}" method="POST" class="d-inline" onsubmit="return confirm('Emin misiniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Hiç çözüm bulunamadı.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
