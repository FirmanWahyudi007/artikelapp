    <!-- General JS Scripts -->
    <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('backend/assets/modules/prism/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('backend/assets/js/page/bootstrap-modal.js') }}"></script> --}}
    <script src="{{ asset('backend/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>


    <!-- Template JS File -->
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    @yield('script-extra')

    </html>
