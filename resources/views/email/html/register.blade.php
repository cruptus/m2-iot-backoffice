<div >
    <h1 style="color: black">Bonjour, {{ $user->name }}</h1>
    <br />
    <p style="color: black">Un administrateur vient de créer votre compte sur la plateforme SmartOrder.</p>
    <p style="color: black">Pour pouvoir y accèder, vous devez créer votre mot de passe via le lien ci-dessous.</p>
    <a href="{{ route('register', $user->token) }}" style="color: rgb(255,102,0)">{{ route('register', $user->token) }}</a>
    <br />
    <p style="color: black">A bientôt,</p>
    <br />
    <p><b>L'équipe SmartOrder</b></p>
</div>