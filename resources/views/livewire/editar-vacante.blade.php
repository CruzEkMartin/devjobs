<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante' >
    <!-- titulo de la vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Título Vacante" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <!-- salario mensual -->
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select id="salario" wire:model="salario"
            class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            <option>-- Seleccione --</option>
            @foreach ($salarios as $salario )
            <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>


    <!-- categoria -->
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select id="categoria" wire:model="categoria"
            class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            <option>-- Seleccione --</option>
            @foreach ($categorias as $categoria )
            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <!-- empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Shopify" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <!-- día para postularse -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <!-- descripcion del puesto -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
        <textarea wire:model="descripcion" id="descripcion" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-72" placeholder="Descripción general del puesto, experiencia" ></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

<!-- imagen -->
<div>
    <x-input-label for="imagen" :value="__('Imagen')" />
    <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*" />

    <div class="my-5 w-80">
        <x-input-label :value="__('Imagen Actual')" />
        <img src="{{ asset('storage/vacantes/'.$imagen) }}" alt="{{ 'Imagen Vacante ' . $titulo }}">
    </div>

<div class="my-5 w-80">
    @if ($imagen_nueva)
        Imagen Nueva:
        <img src="{{ $imagen_nueva->temporaryUrl() }}">
    @endif
</div>

    <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
</div>


<x-primary-button class="w-full justify-center">
    {{ __('Guardar Cambios') }}
</x-primary-button>

</form>
