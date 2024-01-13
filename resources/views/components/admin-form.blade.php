<!-- components/admin-form.blade.php -->

<form method="POST" action="{{ $action }}">
    @csrf
    {{ $slot }}
    <x-primary-button type="submit">{{ $buttonText }}</x-primary-button>
</form>
