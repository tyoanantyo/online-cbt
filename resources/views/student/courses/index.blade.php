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
                        <p class="font-extrabold text-[30px] leading-[45px]">My Courses</p>
                        <p class="text-[#7F8190]">Finish all given tests to grow</p>
                    </div>
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

                @forelse($my_courses as $course)
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
                            </p>
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
                            @if ($course->nextQuestionId !== null)
                                <a href="{{ route('dashboard.learning.course', ['course' => $course->id, 'question' => $course->nextQuestionId]) }}"
                                    class="w-full h-[41px] p-[10px_20px] bg-[#6436F1] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Start
                                    Test</a>
                            @else
                                <a href="{{ route('dashboard.learning.rapport.course', $course) }}"
                                    class="w-full h-[41px] p-[10px_20px] bg-cyan-500 rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Result</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>Belum ada kelas yang diberikan</p>
                @endforelse

            </div>
        </div>
    </section>

</body>

</html>
