{{-- Création des morceaux de vues qui permettront d'eviter la répétition pour le formulaire--}}
@php
    $label ??= null; //si nous n'avons pas de label, la valeur pas défaut sera nulle.
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= '';
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <input class="form-control border-input p-3 @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
