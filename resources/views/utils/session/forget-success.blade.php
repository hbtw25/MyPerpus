@if (session()->has('alert') &&
        array_key_exists('config', session('alert')) &&
        json_decode(session('alert')['config'], true)['icon'] === 'success')
    {{ Session::forget('alert') }}
@endif
