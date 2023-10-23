<!DOCTYPE html>
<html lang="en">

    <x-backend.layout.partial.header />

    <body>
        <x-backend.layout.partial.navbar />
        <x-backend.layout.partial.sidebar />
        <main id="main" class="main">
            <x-backend.layout.partial.page_title />
            <section class="section dashboard">
                <div class="row">
                    {{ $slot }}
                </div>
            </section>
        </main>
        <x-backend.layout.partial.footer />
        <x-backend.layout.partial.back_to_top />
        <x-backend.layout.partial.script />
    </body>

</html>
