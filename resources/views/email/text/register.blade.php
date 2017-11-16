Bonjour, {{ $user->name }}

Un administrateur vient de créer votre compte sur la plateforme SmartOrder.
Pour pouvoir y accèder, vous devez créer votre mot de passe via le lien ci-dessous.
{{ route('register', $user->token) }}

A bientôt,

L'équipe SmartOrder.
