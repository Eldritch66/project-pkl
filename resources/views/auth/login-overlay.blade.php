<div class="login-overlay">
    <div class="login-card">
        <h2>Masuk</h2>
        <p class="login-subtitle">Jaringan Informasi Kearsipan Daerah</p>

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="Masukkan password"
                autocomplete="current-password"
                required
                autofocus
            >

            @error('password')
                <p class="login-error">{{ $message }}</p>
            @enderror

            <button type="submit">Masuk</button>
        </form>
    </div>
</div>
