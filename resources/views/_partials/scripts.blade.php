@php use App\Support\Enums\NotificationTypeEnum; @endphp
    <!-- BEGIN: Vendor JS-->
<script src="{{ asset(('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(('assets/vendor/js/menu.js')) }}"></script>
<script src="{{asset('assets/vendor/libs/toastr/toastr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script>
    const toggler = document.querySelectorAll('.form-password-toggle i')
    if (typeof toggler !== 'undefined' && toggler !== null) {
        toggler.forEach(el => {
            el.addEventListener('click', e => {
                e.preventDefault()
                const formPasswordToggle = el.closest('.form-password-toggle')
                const formPasswordToggleIcon = formPasswordToggle.querySelector('i')
                const formPasswordToggleInput = formPasswordToggle.querySelector('input')

                if (formPasswordToggleInput.getAttribute('type') === 'text') {
                    formPasswordToggleInput.setAttribute('type', 'password')
                    formPasswordToggleIcon.classList.replace('ti-eye', 'ti-eye-off')
                } else if (formPasswordToggleInput.getAttribute('type') === 'password') {
                    formPasswordToggleInput.setAttribute('type', 'text')
                    formPasswordToggleIcon.classList.replace('ti-eye-off', 'ti-eye')
                }
            })
        })
    }

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    prefixMask = document.querySelector('.prefix-phone-mask');
    // Prefix
    if (prefixMask) {
        new Cleave(prefixMask, {
            prefix: '+998',
            blocks: [4, 2, 3, 2, 2],
        });
    }
</script>

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/js/main.js') }}"></script>
@livewireScripts

<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<script>
    window.addEventListener('alert-notification', (event) => {
        toastr[event.detail.type](event.detail.message, event.detail.title)
    });

    @if(session()->has(NotificationTypeEnum::ERROR))
    toastr.error('{{ session()->get(NotificationTypeEnum::ERROR) }}', '{{ __('notification.error.index') }}')
    @endif

    @if(session()->has(NotificationTypeEnum::SUCCESS))
    toastr.success('{{ session()->get(NotificationTypeEnum::SUCCESS) }}', '{{ __('notification.success.index') }}')
    @endif

    @if(session()->has(NotificationTypeEnum::WARNING))
    toastr.warning('{{ session()->get(NotificationTypeEnum::WARNING) }}', '{{ __('notification.warning.index') }}')
    @endif

    $(document).ready(function () {
        // Enable Bootstrap tooltips on page load
        $('[data-bs-toggle="tooltip"]').tooltip();
        // Ensure Livewire updates re-instantiate tooltips
        if (typeof window.Livewire !== 'undefined') {
            window.Livewire.hook('message.processed', (message, component) => {
                $('[data-bs-toggle="tooltip"]').tooltip('dispose').tooltip();
            });
        }
    });

</script>
@stack('javascript-stack')
<!-- END: Page JS-->

