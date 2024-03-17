@if (session()->has('alert') &&
        array_key_exists('config', session('alert')) &&
        json_decode(session('alert')['config'], true)['icon'] === 'error')
    {{ Session::forget('alert') }}
@endif
