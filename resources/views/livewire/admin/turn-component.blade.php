<div class="max-w-[80rem] mx-auto">
    <div class="flex items-end justify-end pt-10">
        <button wire:click="toggleModal" class="py-2 px-8 bg-blue-600 rounded-lg text-white font-bold">
            Nuevo Turno
        </button>
    </div>
    <div class="grid grid-cols-4 gap-6 my-10">
        {{-- {{$turns}} --}}
        @foreach ($turns as $turn)
            <div
                class="h-auto border w-[20rem] shadow-2xl rounded-2xl bg-green-300 flex flex-col  p-4 text-green-900 font-bold">
                <span class="font-black text-3xl capitalize">{{ $turn['date'] }}</span>
                @foreach ($turn['pharmacies'] as $pharmacy)
                    <div>
                        <p>{{ $pharmacy['name'] }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
        {{-- {{ json_encode($turns) }} --}}
        {{-- {{json_encode($allDatesTurns)}} --}}
        @foreach ($allDatesTurns as $item)
            <div class="h-auto border w-[20rem] bg-[#e1e1e1] shadow-2xl rounded-2xl flex flex-col  p-4 ">
                <span class="font-black text-3xl capitalize">{{ $item['date'] }}</span>
                @foreach ($item['pharmacies'] as $pharmacy)
                    <div>
                        <p>{{ $pharmacy['name'] }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <div class="flex space-x-4 justify-between items-center">
                <h2 class="text-teal-600 uppercase font-bold">
                    Nuevo Turno
                </h2>
                <a class="cursor-pointer text-gray-600 hover:rounded-md hover:text-red-600"
                    wire:click.prevent="$set('open', false)">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <title>Cerrar Ventana</title>
                        <path
                            d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                    </svg>
                </a>
            </div>
        </x-slot>
        <x-slot name="content">
            @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <x-label>
                        Fecha de Nacimiento
                    </x-label>
                    <x-input wire:model.live="date" class="w-full" type="date" />
                    <x-input-error for="date.after_or_equal" />
                </div>

                <div>
                    <x-label>
                        Seguro de Salud
                    </x-label>
                    <select
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  w-full "
                        wire:model.live="pharmacy_id">
                        <option hidden value="">Seleccione una opcion</option>
                        @foreach ($pharmacies as $pharmacy)
                            <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="pharmacy_id" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="save">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>
