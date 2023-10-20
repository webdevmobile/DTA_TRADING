{{-- Création des morceaux de vues qui permettront d'eviter la répétition pour le formulaire--}}
@php
    $label ??= null; //si nous n'avons pas de label, la valeur pas défaut sera nulle.
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= '';
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea class="form-control border-input p-3" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" cols="" rows="">{{ old($name, $value) }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
