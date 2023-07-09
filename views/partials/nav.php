<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="flex items-baseline space-x-4">
                        <a href="/" class="<?= requestUrlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/") ? "HOME" : "Home" ?></a>
                        <a href="/about" class="<?= requestUrlIs('/about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/about") ? "ABOUT" : "About" ?></a>
                        <a href="/notes" class="<?= requestUrlIs('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/notes") ? "NOTES" : "Notes" ?></a>
                        <a href="/contact" class="<?= requestUrlIs('/contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/contact") ? "CONTACT" : "Contact" ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>