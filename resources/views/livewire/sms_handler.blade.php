<div>
    <form wire:submit.prevent="storeMessage">
        <input type="text" wire:model="phone_number">
        @error('phone_number') <span class="error">{{ $message }}</span> @enderror

        <textarea  wire:model="details">
        @error('details') <span class="error">{{ $message }}</span> @enderror </textarea>

        <button type="submit">Send Message</button>
    </form>
</div>