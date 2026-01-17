@extends('admin.layouts.app')

@section('title', 'Mesaj Görüntüle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Mesaj Detayları</h3>
        <div class="card-actions">
            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                Mesajlara Dön
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Alınma Tarihi</label>
            <div>{{ $message->created_at->format('F d, Y \a\t H:i') }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">İsim</label>
            <div>{{ $message->name }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">E-posta</label>
            <div>
                <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Telefon</label>
            <div>
                @if($message->phone)
                    <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a>
                @else
                    <span class="text-muted">Belirtilmemiş</span>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Mesaj</label>
            <div class="border rounded p-3 bg-light">
                {{ $message->message }}
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Durum</label>
            <div>
                <span class="badge {{ $message->is_read ? 'bg-green' : 'bg-yellow' }}">
                    {{ $message->is_read ? 'Okundu' : 'Okunmadı' }}
                </span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.messages.index') }}" class="btn btn-link">Mesajlara Dön</a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu mesajı silmek istediğinizden emin misiniz?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Mesajı Sil</button>
            </form>
        </div>
    </div>
</div>
@endsection
