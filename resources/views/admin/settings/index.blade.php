@extends('admin.layouts.app')

@section('title', 'Ayarlar')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @foreach($settings as $group => $groupSettings)
    <div class="card mb-3">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst($group) }} Ayarları</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($groupSettings as $setting)
                <div class="col-md-6 mb-3">
                    <label class="form-label">{{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                    @if($setting->type === 'textarea' || $setting->type === 'html')
                        <textarea name="settings[{{ $setting->key }}]" class="form-control" rows="3">{{ $setting->value }}</textarea>
                    @elseif($setting->type === 'image')
                        @if($setting->value)
                            <div class="mb-2">
                                <img src="{{ asset($setting->value) }}" alt="" style="max-height: 50px;">
                            </div>
                        @endif
                        <input type="file" name="settings[{{ $setting->key }}]" class="form-control">
                        <input type="hidden" name="settings[{{ $setting->key }}_current]" value="{{ $setting->value }}">
                    @elseif($setting->type === 'password')
                        <input type="password" name="settings[{{ $setting->key }}]" class="form-control" value="{{ $setting->value }}" placeholder="Şifreyi girin">
                        <small class="text-muted">Mevcut: {{ $setting->value ? str_repeat('*', 8) : 'Henüz ayarlanmadı' }}</small>
                    @elseif($setting->type === 'select')
                        @if($setting->key === 'mail_encryption')
                            <select name="settings[{{ $setting->key }}]" class="form-control">
                                <option value="tls" {{ $setting->value === 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ $setting->value === 'ssl' ? 'selected' : '' }}>SSL</option>
                                <option value="" {{ $setting->value === '' ? 'selected' : '' }}>None</option>
                            </select>
                        @else
                            <input type="text" name="settings[{{ $setting->key }}]" class="form-control" value="{{ $setting->value }}">
                        @endif
                    @else
                        <input type="{{ $setting->type === 'email' ? 'email' : 'text' }}" name="settings[{{ $setting->key }}]" class="form-control" value="{{ $setting->value }}">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    
    <div class="card">
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Ayarları Kaydet</button>
        </div>
    </div>
</form>
@endsection


