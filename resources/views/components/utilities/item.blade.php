<div class="d-flex align-items-center">
    <!-- Date -->
    <p class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4">
            </path>
            <circle cx="18" cy="18" r="4"></circle>
            <path d="M15 3v4"></path>
            <path d="M7 3v4"></path>
            <path d="M3 11h16"></path>
            <path d="M18 16.496v1.504l1 1"></path>
        </svg>
        {{ $date }}
    </p>
    <!--- Level -->
    <p class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-desktop-analytics" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <rect x="3" y="4" width="18" height="12" rx="1"></rect>
            <path d="M7 20h10"></path>
            <path d="M9 16v4"></path>
            <path d="M15 16v4"></path>
            <path d="M9 12v-4"></path>
            <path d="M12 12v-1"></path>
            <path d="M15 12v-2"></path>
            <path d="M12 12v-1"></path>
        </svg>
        {{ $level }}
    </p>
    <!--- Status -->
    <p class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M9 12l2 2l4 -4"></path>
        </svg>
        {{ $status }}
    </p>
    <!-- Episode -->
    <p class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-movie" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
            <line x1="8" y1="4" x2="8" y2="20"></line>
            <line x1="16" y1="4" x2="16" y2="20"></line>
            <line x1="4" y1="8" x2="8" y2="8"></line>
            <line x1="4" y1="16" x2="8" y2="16"></line>
            <line x1="4" y1="12" x2="20" y2="12"></line>
            <line x1="16" y1="8" x2="20" y2="8"></line>
            <line x1="16" y1="16" x2="20" y2="16"></line>
        </svg>
        {{ $episode }}
    </p>
    <!--- Members -->
    <p class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
        </svg>
        {{ $members }}
    </p>
</div>
