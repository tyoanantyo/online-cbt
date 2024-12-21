<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
</head>

<body class="font-inter text-[#0A090B]">
    <section id="content" class="flex">

        <x-sidebar></x-sidebar>

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <x-profile></x-profile>
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Manage Course</p>
                        <p class="text-[#7F8190]">Provide high quality for best students</p>
                    </div>
                    <a href="{{ route('dashboard.courses.create') }}"
                        class="h-[52px] p-[14px_20px] bg-[#06B6D4] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">Add
                        New Course</a>
                </div>
            </div>
            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                    <div class="flex shrink-0 w-[300px]">
                        <p class="text-[#7F8190]">Course</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">Date Created</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[170px]">
                        <p class="text-[#7F8190]">Category</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[120px]">
                        <p class="text-[#7F8190]">Action</p>
                    </div>
                </div>

                @forelse ($courses as $course)
                    <div class="list-items flex flex-nowrap justify-between pr-10">
                        <div class="flex shrink-0 w-[300px]">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full">
                                    <img src="{{ Storage::url($course->cover) }}" class="object-cover" alt="thumbnail">
                                </div>
                                <div class="flex flex-col gap-[2px]">
                                    <p class="font-bold text-lg">{{ $course->name }}</p>
                                    <p class="text-[#7F8190]">Beginners</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex shrink-0 w-[150px] items-center justify-center">
                            <p class="font-semibold">
                                {{ \Carbon\Carbon::parse($course->created_at)->format('F j, Y') }}</p>
                        </div>
                        @if ($course->category->name == 'Programming')
                            <div class="flex shrink-0 w-[170px] items-center justify-center">
                                <p class="p-[8px_16px] rounded-full bg-[#FFF2E6] font-bold text-sm text-[#F6770B]">
                                    {{ $course->category->name }}</p>
                            </div>
                        @elseif($course->category->name == 'Product Design')
                            <div class="flex shrink-0 w-[170px] items-center justify-center">
                                <p class="p-[8px_16px] rounded-full bg-[#EAE8FE] font-bold text-sm text-[#6436F1]">
                                    {{ $course->category->name }}</p>
                            </div>
                        @elseif($course->category->name == 'Web Development')
                            <div class="flex shrink-0 w-[170px] items-center justify-center">
                                <p class="p-[8px_16px] rounded-full bg-[#D5EFFE] font-bold text-sm text-[#066DFE]">
                                    {{ $course->category->name }}</p>
                            </div>
                        @elseif($course->category->name == 'Data Science')
                            <div class="flex shrink-0 w-[170px] items-center justify-center">
                                <p class="p-[8px_16px] rounded-full bg-[#EAE8FE] font-bold text-sm text-cyan-500">
                                    {{ $course->category->name }}</p>
                            </div>
                        @endif
                        <div class="flex shrink-0 w-[120px] items-center">
                            <div class="relative h-[41px]">
                                <div
                                    class="menu-dropdown w-[120px] max-h-[41px] overflow-hidden absolute top-0 p-[10px_16px] bg-white flex flex-col gap-3 border border-[#EEEEEE] transition-all duration-300 hover:shadow-[0_10px_16px_0_#0A090B0D] rounded-[18px]">
                                    <button onclick="toggleMaxHeight(this)"
                                        class="flex items-center justify-between font-bold text-sm w-full">
                                        menu
                                        <img src="{{ asset('images/icons/arrow-down.svg') }}" alt="icon">
                                    </button>
                                    <a href="{{ route('dashboard.courses.show', $course) }}"
                                        class="flex items-center justify-between font-bold text-sm w-full">
                                        Manage
                                    </a>
                                    <a href="course-students.html"
                                        class="flex items-center justify-between font-bold text-sm w-full">
                                        Students
                                    </a>
                                    <a href="{{ route('dashboard.courses.edit', $course) }}"
                                        class="flex items-center justify-between font-bold text-sm w-full">
                                        Edit Course
                                    </a>
                                    <form method="POST" action="{{ route('dashboard.courses.destroy', $course) }}"
                                        class="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center justify-between font-bold text-sm w-full text-[#FD445E]">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>

        </div>
    </section>

    <script>
        function toggleMaxHeight(button) {
            const menuDropdown = button.parentElement;
            menuDropdown.classList.toggle('max-h-fit');
            menuDropdown.classList.toggle('shadow-[0_10px_16px_0_#0A090B0D]');
            menuDropdown.classList.toggle('z-10');
        }

        document.addEventListener('click', function(event) {
            const menuDropdowns = document.querySelectorAll('.menu-dropdown');
            const clickedInsideDropdown = Array.from(menuDropdowns).some(function(dropdown) {
                return dropdown.contains(event.target);
            });

            if (!clickedInsideDropdown) {
                menuDropdowns.forEach(function(dropdown) {
                    dropdown.classList.remove('max-h-fit');
                    dropdown.classList.remove('shadow-[0_10px_16px_0_#0A090B0D]');
                    dropdown.classList.remove('z-10');
                });
            }
        });
    </script>
</body>

</html>
