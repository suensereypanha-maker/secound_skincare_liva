<!-- ============================================================== -->
<!-- FLOATING SOCIAL & DIRECT CHAT DOCK (TELEGRAM & FACEBOOK)       -->
<!-- Fixed on Viewport, Persistent Across All Pages                -->
<!-- ============================================================== -->
<aside aria-label="Customer Support & Social Channels" class="fixed right-4 bottom-6 sm:right-6 sm:bottom-8 z-40 flex flex-col items-end gap-3 select-none pointer-events-auto">

    <!-- Telegram Floating Chat Button -->
    <a href="https://t.me/livaskincare" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="Chat on Telegram"
       class="group relative w-12 h-12 sm:w-13 sm:h-13 rounded-full bg-[#229ED9] hover:bg-[#1C8CC6] text-white flex items-center justify-center shadow-lg hover:shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 ring-2 ring-white/90 cursor-pointer">
        
        <!-- Telegram Official Paper Airplane SVG -->
        <svg class="w-6 h-6 text-white -translate-x-0.5 translate-y-0.5 transition-transform group-hover:scale-105" viewBox="0 0 24 24" fill="currentColor">
            <path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l-.313 4.693c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"/>
        </svg>

        <!-- Active Online Support Ping Badge -->
        <span class="absolute -top-0.5 -right-0.5 flex h-3.5 w-3.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-500 border-2 border-white"></span>
        </span>

        <!-- Left Tooltip (Desktop Hover) -->
        <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 px-3 py-1.5 rounded-xl bg-liva-dark/95 backdrop-blur-md text-white text-xs font-semibold whitespace-nowrap opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-200 shadow-xl border border-white/10 hidden sm:flex items-center gap-1.5">
            <span>Telegram</span>
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
        </span>
    </a>

    <!-- Facebook Floating Page Button -->
    <a href="https://facebook.com/livaskincare" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="Visit us on Facebook"
       class="group relative w-12 h-12 sm:w-13 sm:h-13 rounded-full bg-[#1877F2] hover:bg-[#166FE5] text-white flex items-center justify-center shadow-lg hover:shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 ring-2 ring-white/90 cursor-pointer">
        
        <!-- Facebook Official "f" SVG -->
        <svg class="w-6 h-6 text-white transition-transform group-hover:scale-105" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
        </svg>

        <!-- Left Tooltip (Desktop Hover) -->
        <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 px-3 py-1.5 rounded-xl bg-liva-dark/95 backdrop-blur-md text-white text-xs font-semibold whitespace-nowrap opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-200 shadow-xl border border-white/10 hidden sm:flex items-center gap-1.5">
            <span>Facebook</span>
        </span>
    </a>

</aside>

