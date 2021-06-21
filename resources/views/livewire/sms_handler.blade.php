<section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
  <header class="flex items-center justify-between">
    <h2 class="text-lg leading-6 font-medium text-black">Send Message</h2>
  </header>
<div class="bg-white dark:bg-gray-800 rounded-tl-xl sm:rounded-t-xl p-4 pb-6 sm:p-8 lg:p-4 lg:pb-6 xl:p-8 space-y-6 sm:space-y-8 lg:space-y-6 xl:space-y-8">
  
    <form wire:submit.prevent="storeMessage" class="relative">
        <div >
            <label for="phone_nmuber">Phone Number</label>
            <input type="text" wire:model="phone_number" class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10">
            @error('phone_number') <span class="error">{{ $message }}</span> @enderror
        </div>
        <br>
        <div >
            <label for="message">Message</label>
            <textarea  rows=6 wire:model="details" class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10">
            @error('details') <span class="error">{{ $message }}</span> @enderror </textarea>
        </div>
        <br>
        <div >
            <button class="w-1/4 flex items-center justify-center rounded-md bg-black text-white pt-3 pb-3" type="submit">Send Message</button>
        </div>
    </form>
</div>
</section>
