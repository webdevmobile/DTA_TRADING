{{-- Création des morceaux de vues qui permettront d'eviter la répétition pour le formulaire--}}
@php
    $label ??= null; //si nous n'avons pas de label, la valeur pas défaut sera nulle.
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(["form-group", $class])>
    @php
        $trainingsIds = $user->trainings()->pluck('id');
    @endphp
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" class="form-control form-select border-input select" multiple>
        <option value="">Selectionner la formation</option>
        @foreach ($trainings as $training)
            <option @selected($trainingsIds->contains($training->id)) value="{{ $training->id }}">{{ $training->name }}</option>
            {{-- <option @selected(old('category_id', $user->category_id) == $category->id) value="{{ $data->id }}">{{ $data->name }}</option> --}}
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
