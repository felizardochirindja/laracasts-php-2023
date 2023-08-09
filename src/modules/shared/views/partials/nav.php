<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="flex items-baseline space-x-4">
                        <a href="/" class="<?= requestUrlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/") ? "HOME" : "Home" ?></a>
                        <a href="/about" class="<?= requestUrlIs('/about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/about") ? "ABOUT" : "About" ?></a>
                        
                        <?php if ($_SESSION['user'] ?? false): ?>
                            <a href="/notes" class="<?= requestUrlIs('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/notes") ? "NOTES" : "Notes" ?></a>
                        <?php endif; ?>
                        
                        <a href="/contact" class="<?= requestUrlIs('/contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> px-3 py-2 rounded-md text-sm font-medium"><?= requestUrlIs("/contact") ? "CONTACT" : "Contact" ?></a>
                        
                        <!-- auth buttons -->
                        <?php if (!($_SESSION['user'] ?? false) && !requestUrlIs('/sign-up') && !requestUrlIs('/sign-in')): ?>
                            <a href="/sign-in" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <?php endif; ?>
                        
                        <?php if ($_SESSION['user'] ?? false): ?>
                            <form action="/sign-out" method="post">
                                <input type="submit" value="sign out" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>