<div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
    <form class="search flex items-center w-[400px] h-[52px] p-[10px_16px] rounded-full border border-[#EEEEEE]">
        <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
            placeholder="Search by report, student, etc" name="search">
        <button type="submit" class="ml-[10px] w-8 h-8 flex items-center justify-center">
            <img src="{{ asset('images/icons/search.svg') }}" alt="icon">
        </button>
    </form>
    <div class="flex items-center gap-[30px]">
        <div class="flex gap-[14px]">
            <a href=""
                class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                <img src="{{ asset('images/icons/receipt-text.svg') }}" alt="icon">
            </a>
            <a href=""
                class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                <img src="{{ asset('images/icons/notification.svg') }}" alt="icon">
            </a>
        </div>
        <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
        <div class="flex gap-3 items-center">
            <div class="flex flex-col text-right">
                <p class="text-sm text-[#7F8190]">Howdy</p>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
            </div>
            <div class="w-[46px] h-[46px]">
                <img src="{{ asset('images/photos/default-photo.svg') }}" alt="photo">
            </div>
        </div>
    </div>
</div>
