<form class="md:w-1/2 space-y-5">
    <!-- titulo de la vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"
            placeholder="Título Vacante" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <!-- salario mensual -->
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select id="salario" name="salario"
            class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>


    <!-- categoria -->
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select id="categoria" name="categoria"
            class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <!-- empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Shopify" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <!-- día para postularse -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" name="ultimo_dia" :value="old('ultimo_dia')"/>
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <!-- descripcion del puesto -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
        <textarea name="descripcion" id="descripcion" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-72" placeholder="Descripción general del puesto, experiencia" ></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

<!-- imagen -->
<div>
    <x-input-label for="imagen" :value="__('Imagen')" />
    <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" />
    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
</div>


<x-primary-button class="w-full justify-center">
    {{ __('Crear Vacante') }}
</x-primary-button>

</form>
