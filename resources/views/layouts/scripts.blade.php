<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="{{ URL::asset('build/js/layout.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.classList.remove('show');
                successAlert.style.display = 'none';
            }, 5000);
        }

        const errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            setTimeout(() => {
                errorAlert.classList.remove('show');
                errorAlert.style.display = 'none';
            }, 5000);
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const greetingElement = document.getElementById('greeting');
        const currentHour = new Date().getHours();

        @if (auth()->check())
            const isAdmin = @json(auth()->user()->is_admin);
        @else
            const isAdmin = false;
        @endif

        let greetingMessage;

        if (currentHour < 12) {
            greetingMessage = isAdmin ? 'Good Morning, Admin!' : 'Good Morning, User!';
        } else if (currentHour < 18) {
            greetingMessage = isAdmin ? 'Good Afternoon, Admin!' : 'Good Afternoon, User!';
        } else {
            greetingMessage = isAdmin ? 'Good Evening, Admin!' : 'Good Evening, User!';
        }

        greetingElement.textContent = greetingMessage;
    });
</script>

@yield('script')
@yield('script-bottom')
