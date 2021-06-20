<div>
    <form wire:submit.prevent="storeMessage">
        <input type="text" wire:model="phone_number">
        @error('phone_number') <span class="error">{{ $message }}</span> @enderror

        <input type="text" wire:model="details">
        @error('details') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Save Contact</button>
    </form>
</div>