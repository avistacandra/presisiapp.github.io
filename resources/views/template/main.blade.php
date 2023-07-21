<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body>

    <div class="container-scroller">

        @include('template.navbar')

        <div class="container-fluid page-body-wrapper">

                    @include('template.menu')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="me-md-3 me-xl-50 pt-0">
                                        <h4 class="text-success mdi mdi-school">
                                            @yield('judul')
                                        </h4>
                                    </div>
                                    <div class="d-flex left">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <h5 class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;{{Route::current()->getName()}}&nbsp;/&nbsp;</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('isi')
                </div>

                @include('template.footer')

            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    @include('template.script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

</body>

</html>
