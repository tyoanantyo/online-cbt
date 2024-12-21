<!doctype html>
<html>
<x-script></x-script>

<body class="font-inter text-[#0A090B]">
    <section id="content" class="flex">

        <x-sidebar></x-sidebar>

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">

            <x-profile></x-profile>

            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="index.html" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage
                        Courses</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">New Course</a>
                </div>
            </div>
            <div class="header flex flex-col gap-1 px-5 mt-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">New Course</h1>
                <p class="text-[#7F8190]">Provide high quality for best students</p>
            </div>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="py-5 px-5 bg-red-700 text-red-500">
                            {{ $error }}

                        </li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.courses.update', $course) }}"
                class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10">
                @csrf
                @method('PUT')
                <div class="flex gap-5 items-center">
                    <input type="file" name="cover" id="icon" class="peer hidden" onchange="previewFile()"
                        data-empty="true">
                    <div class="relative w-[100px] h-[100px] rounded-full overflow-hidden  ">
                        <div class="relative file-preview z-10 w-full h-full">
                            <img src="{{ Storage::url($course->cover) }}"
                                class="thumbnail-icon w-full h-full object-cover" alt="thumbnail">
                        </div>
                        <span
                            class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 text-center font-semibold text-sm text-[#7F8190]">Icon
                            <br>Course</span>
                    </div>
                    <button type="button"
                        class="flex shrink-0 p-[8px_20px] h-fit items-center rounded-full bg-[#0A090B] font-semibold text-white"
                        onclick="document.getElementById('icon').click()">
                        Add Icon
                    </button>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Course Name</p>
                    <div
                        class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/icons/note-favorite-outline.svg') }}"
                                class="w-full h-full object-contain" alt="icon">
                        </div>
                        <input value="{{ $course->name }}" type="text"
                            class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                            placeholder="Write your better course name" name="name" required>
                    </div>
                </div>
                <div class="group/category flex flex-col gap-[10px]">
                    <p class="font-semibold">Category</p>
                    <div
                        class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/icons/bill.svg') }}" class="w-full h-full object-contain"
                                alt="icon">
                        </div>
                        <select id="category"
                            class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{ asset('images/icons/arrow-down.svg') }}')] bg-no-repeat bg-right"
                            name="category_id" required>
                            <option value="{{ $course->category->id }}" selected>{{ $course->category->name }}
                            </option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" class="font-semibold">
                                    {{ $category->name }}
                                </option>

                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Course Type</p>
                    <div class="flex gap-5 items-center">
                        <a href="#"
                            class="group relative flex flex-col w-full items-center gap-5 p-[30px_16px] border border-[#EEEEEE] rounded-[30px] transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]"
                            data-group="course-type" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden">
                                <img src="{{ asset('images/icons/onboarding.svg') }}" class="w-full h-full"
                                    alt="icon">
                            </div>
                            <span class="text-center mx-auto font-semibold">Onboarding</span>
                            <div
                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-[24px] right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </a>
                        <a href="#"
                            class="group relative flex flex-col w-full items-center gap-5 p-[30px_16px] border border-[#EEEEEE] rounded-[30px] transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]"
                            data-group="course-type" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden">
                                <img src="{{ asset('images/icons/module.svg') }}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="text-center mx-auto font-semibold">CBT Module</span>
                            <div
                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-[24px] right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </a>
                        <a href="#"
                            class="group relative flex flex-col w-full items-center gap-5 p-[30px_16px] border border-[#EEEEEE] rounded-[30px] transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]"
                            data-group="course-type" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden">
                                <img src="{{ asset('images/icons/job.svg') }}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="text-center mx-auto font-semibold">Job-Ready</span>
                            <div
                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-[24px] right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Publish Date</p>
                    <div class="flex gap-[10px] items-center">
                        <a href="#"
                            class="group relative flex w-full items-center gap-[14px] p-[14px_16px] border border-[#EEEEEE] rounded-full transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]"
                            data-group="publish-date" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[24px] h-[24px] flex shrink-0 overflow-hidden">
                                <img src="{{ asset('images/icons/clock.svg') }}" class="w-full h-full"
                                    alt="icon">
                            </div>
                            <span class="font-semibold">Active Now</span>
                            <div
                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </a>
                        <a href="#"
                            class="group relative flex w-full items-center gap-[14px] p-[14px_16px] border border-[#EEEEEE] rounded-full transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B] disabled:border-[#EEEEEE]"
                            data-group="publish-date" aria-checked="false" onclick="event.preventDefault()" disabled>
                            <div class="w-[24px] h-[24px] flex shrink-0 overflow-hidden">
                                <img src="{{ asset('images/icons/calendar-add-disabled.svg') }}"
                                    class="w-full h-full" alt="icon">
                            </div>
                            <span class="font-semibold text-[#EEEEEE]">Schedule for Later</span>
                            <div
                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="group/access flex flex-col gap-[10px]">
                    <p class="font-semibold">Access Type</p>
                    <div
                        class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/icons/security-user.svg') }}"
                                class="w-full h-full object-contain" alt="icon">
                        </div>
                        <select id="access"
                            class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{ asset('images/icons/arrow-down.svg') }}')] bg-no-repeat bg-right"
                            name="access" required>
                            <option value="" disabled selected hidden>Choose the access type</option>
                            <option value="Invitation Only" class="font-semibold">Invitation Only</option>
                        </select>
                    </div>
                </div>
                <label class="font-semibold flex items-center gap-[10px]"><input type="radio" name="tnc"
                        class="w-[24px] h-[24px] appearance-none checked:border-[3px] checked:border-solid checked:border-white rounded-full checked:bg-[#2B82FE] ring ring-[#EEEEEE]"
                        checked />
                    I have read terms and conditions
                </label>
                <div class="flex items-center gap-5">
                    <a href=""
                        class="w-full h-[52px] p-[14px_20px] bg-[#0A090B] rounded-full font-semibold text-white transition-all duration-300 text-center">Add
                        to Draft</a>
                    <button type="submit"
                        class="w-full h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Save
                        Course</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        function previewFile() {
            var preview = document.querySelector('.file-preview');
            var fileInput = document.querySelector('input[type=file]');

            if (fileInput.files.length > 0) {
                var reader = new FileReader();
                var file = fileInput.files[0]; // Get the first file from the input

                reader.onloadend = function() {
                    var img = preview.querySelector('.thumbnail-icon'); // Get the thumbnail image element
                    img.src = reader.result; // Update src attribute with the uploaded file
                    preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
                }

                reader.readAsDataURL(file);
                fileInput.setAttribute('data-empty', 'false');
            } else {
                preview.classList.add('hidden'); // Hide preview if no file selected
                fileInput.setAttribute('data-empty', 'true');
            }
        }
    </script>

    <script>
        function handleActiveAnchor(element) {
            event.preventDefault();

            const group = element.getAttribute('data-group');

            // Reset all elements' aria-checked to "false" within the same data-group
            const allElements = document.querySelectorAll(`[data-group="${group}"][aria-checked="true"]`);
            allElements.forEach(el => {
                el.setAttribute('aria-checked', 'false');
            });

            // Set the clicked element's aria-checked to "true"
            element.setAttribute('aria-checked', 'true');
        }
    </script>

</body>

</html>
