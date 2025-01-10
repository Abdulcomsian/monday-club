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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

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

        @if(auth()->check())
        const userName = @json(auth()->user()->name);
        @else
        const userName = null;
        @endif

        let greetingMessage = '';

        if (userName) {
            if (currentHour < 12) {
                greetingMessage = 'Good Morning, ' + userName + '!';
            } else if (currentHour < 18) {
                greetingMessage = 'Good Afternoon, ' + userName + '!';
            } else {
                greetingMessage = 'Good Afternoon, ' + userName + '!';
            }
        } else {
            greetingMessage = 'Hello, Guest!';
        }

        greetingElement.textContent = greetingMessage;
    });

    const hoverButton = document.getElementById('vertical-hover');
    const logoLarge = document.querySelector('.logo-large');
    const logoSmall = document.querySelector('.logo-small');

    hoverButton.addEventListener('mouseover', () => {
        logoLarge.style.display = 'none';
        logoSmall.style.display = 'block';
    });

    hoverButton.addEventListener('mouseout', () => {
        logoLarge.style.display = 'block';
        logoSmall.style.display = 'none';
    });
</script>

@yield('script')
@yield('script-bottom')
