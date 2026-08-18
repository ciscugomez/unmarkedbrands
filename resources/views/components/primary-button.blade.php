<button {{ $attributes->merge(['type' => 'submit', 'class' => ' text-center flex items-center font-regular px-4 py-2 text-white hover:bg-secondary bg-grayd text-white']) }}>
    {{ $slot }}
</button>
