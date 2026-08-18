<x-app-layout class="bg-gray-100">
    <div class="flex flex-col sm:justify-center items-center py-10" >
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:">
            @livewire('accounts.create')
        </div>
    </div>
</x-app-layout>
