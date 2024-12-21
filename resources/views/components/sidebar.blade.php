<div id="sidebar"
    class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
    <div class="w-full flex flex-col gap-[30px]">
        <a href="index.html" class="flex items-center justify-center">
            <img src="{{ asset('images/logo/logo.svg') }}" alt="logo">
        </a>
        <ul class="flex flex-col gap-3">
            <li>
                <h3 class="font-bold text-xs text-[#A5ABB2]">DAILY USE</h3>
            </li>
            <li>
                <a href="{{ route('dashboard.courses.index') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                    <div>
                        <img src="{{ asset('images/icons/home-hashtag.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Overview</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.courses.index') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                    <div>
                        <img src="{{ asset('images/icons/note-favorite.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Courses</p>
                </a>
            </li>
            <li>
                <a href=""
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                    <div>
                        <img src="{{ asset('images/icons/profile-2user.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Students</p>
                </a>
            </li>
            <li>
                <a href=""
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                    <div>
                        <img src="{{ asset('images/icons/sms-tracking.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Messages</p>
                    <div class="notif w-5 h-5 flex shrink-0 rounded-full items-center justify-center bg-[#F6770B]">
                        <p class="font-bold text-[10px] leading-[15px] text-white">12</p>
                    </div>
                </a>
            </li>
            <li>
                <a href=""
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                    <div>
                        <img src="{{ asset('images/icons/chart-2.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Analytics</p>
                </a>
            </li>
        </ul>
        <ul class="flex flex-col gap-3">
            <li>
                <h3 class="font-bold text-xs text-[#A5ABB2]">OTHERS</h3>
            </li>
            <li>
                <a href=""
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                    <div>
                        <img src="{{ asset('images/icons/3dcube.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Rewards</p>
                </a>
            </li>
            <li>
                <a href=""
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                    <div>
                        <img src="{{ asset('images/icons/code.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">A.I Plugins</p>
                </a>
            </li>
            <li>
                <a href=""
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                    <div>
                        <img src="{{ asset('images/icons/setting-2.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Settings</p>
                </a>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="p-[10px_16px] flex items-center gap-[14px] w-full rounded-full h-11 transition-all duration-300 hover:bg-cyan-500">
                        <div>
                            <img src="{{ asset('images/icons/security-safe.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold transition-all duration-300">Logout</p>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <a href="">
        <div class="w-full flex gap-3 items-center p-4 rounded-[14px] bg-[#0A090B] mt-[30px]">
            <div>
                <img src="{{ asset('images/icons/crown-round-bg.svg') }}" alt="icon">
            </div>
            <div class="flex flex-col gap-[2px]">
                <p class="font-semibold text-white">Get Pro</p>
                <p class="text-sm leading-[21px] text-[#A0A0A0]">Unlock features</p>
            </div>
        </div>
    </a>
</div>
